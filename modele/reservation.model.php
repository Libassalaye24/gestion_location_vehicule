<?php 

            function find_all_reservation_cours($etat_reservation='en cours',$start=null,$parPage=null):array{
                $pdo=ouvrir_connection_db();
                $sql=" SELECT * FROM reservation re,user u,etat e,modele mo,marque ma,categorie ca,type_vehicule tv
                       WHERE re.id_user=u.id_user
                       and re.id_marque=ma.id_marque
                       and re.id_modele=mo.id_modele
                       and re.id_categorie=ca.id_categorie
                       and re.id_etat=e.id_etat
                       and re.id_type_vehicule=tv.id_type_vehicule
                        and e.nom_etat like ? ";
                if (!is_null($start) && !is_null($parPage)) {
                    $sql.=" limit $start,$parPage";
                }
                $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
             
                $sth->execute(array($etat_reservation));
                $reservation_bien = $sth->fetchAll();
                fermer_connection_db($pdo);
                return $reservation_bien;
            }

            function find_all_etat():array{
                $pdo=ouvrir_connection_db();
                $sql=" SELECT * FROM etat ";
                $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute();
                $etat_reservation = $sth->fetchAll();
                fermer_connection_db($pdo);
                return $etat_reservation;
            }
            function find_all_reservation_by_date_or_etat($etat_reservation='en cours',$date=NULL):array{
                $pdo=ouvrir_connection_db();
                $params = array($etat_reservation);
                $sql=" SELECT * FROM reservation re,user u,etat e
                       WHERE re.id_user=u.id_user
                        and re.id_etat=e.id_etat
                        and e.nom_etat like ? ";
                        if(!is_null($date)) {
                            $sql.= 'and re.date_debut_location like ?';
                            $params[]=$date;
                             //
                        }
                $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute($params);
                $reservation_bien = $sth->fetchAll(PDO::FETCH_ASSOC);
                fermer_connection_db($pdo);
                return $reservation_bien;
            }
            function find_all_reservation_by_date_or_etat_paginate($etat_reservation='en cours',$date=NULL,$start=null,$parPage=null):array{
                $pdo=ouvrir_connection_db();
                $params = array($etat_reservation);
                $sql=" SELECT * FROM reservation re,user u,etat e
                       WHERE re.id_user=u.id_user
                        and re.id_etat=e.id_etat
                        and e.nom_etat like ? ";
                        if(!is_null($date)) {
                            $sql.= 'and re.date_debut_location like ?';
                            $params[]=$date;
                             //
                        }
                        if (!is_null($start) && !is_null($parPage)) {
                            $sql.= " limit $start,$parPage";
                          /*   $params=[
                                $start,
                                $parPage
                            ]; */
                        }
                $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute($params);
                $reservation_bien = $sth->fetchAll(PDO::FETCH_ASSOC);
                fermer_connection_db($pdo);
                return $reservation_bien;
            }
            function ajout_reservation_vehicule(array $reservations):int{
                $pdo=ouvrir_connection_db();
                $sql="INSERT INTO reservation (date_debut_location,date_fin_location,id_user,id_modele,id_marque,id_categorie,id_etat,id_type_vehicule)
                 VALUES (?,?,?,?,?,?,?,?)";
                $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute($reservations);
                $dernier_id = $pdo->lastInsertId();
                fermer_connection_db($pdo);
                return$dernier_id;
            }
            function lister_reservation_by_client(int $id_client,$start=null,$parPage=null):array{
                $pdo=ouvrir_connection_db();
                $sql=" SELECT distinct re.*,mo.*,ma.*,ca.*,u.*,tv.*,i.id_vehicule,e.* FROM reservation re,modele mo,marque ma,categorie ca,user u,type_vehicule tv,image i,etat e
                       WHERE re.id_modele=mo.id_modele
                       and re.id_type_vehicule=tv.id_type_vehicule
                       and re.id_marque=ma.id_marque
                       and re.id_user=u.id_user
                       and re.id_etat=e.id_etat
                       and re.id_categorie=ca.id_categorie
                       and re.id_vehicule=i.id_vehicule
                       and re.id_vehicule!= 0
                       and re.id_user=?
                       order by re.date_debut_location desc";
                if (!is_null($start) && !is_null($parPage)) {
                    $sql.=" limit $start,$parPage";
                }
                $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array($id_client));
                $reservation_bien = $sth->fetchAll();
                fermer_connection_db($pdo);
                return  $reservation_bien;
            }
            function lister_reservation_client(int $id_client,$start=null,$parPage=null):array{
                $pdo=ouvrir_connection_db();
                $sql="  SELECT * FROM reservation re,user u,type_vehicule tv
                            WHERE re.id_type_vehicule=tv.id_type_vehicule
                                 and re.id_user=u.id_user
                                 and re.id_user=?
                                 order by re.date_debut_location desc";
                if (!is_null($start) && !is_null($parPage)) {
                    $sql.=" limit $start,$parPage";
                }
                $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array($id_client));
                $reservation_bien = $sth->fetchAll();
                fermer_connection_db($pdo);
                return  $reservation_bien;
            }
            function find_reservation_by_id_reservation($id_reservation):array{
                $pdo=ouvrir_connection_db();
                $sql="SELECT * from reservation re,categorie ca,marque ma,modele mo,type_vehicule tv
                        where re.id_categorie=ca.id_categorie
                            and re.id_marque=ma.id_marque
                            and re.id_type_vehicule=tv.id_type_vehicule
                            and re.id_modele=mo.id_modele
                            and re.id_reservation=?";
                  $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                  $sth->execute(array($id_reservation));
                  $reservation = $sth->fetchAll();
                  fermer_connection_db($pdo);
                  return  $reservation;   
            }
            function find_paiement($id_reservation):array{
                $pdo=ouvrir_connection_db();
                $sql="SELECT * from paiement pe,reservation re,mode_paiement mp,user u
                            where re.id_reservation=pe.id_reservation
                                and pe.id_mode_paiement=mp.id_mode_paiement
                                and re.id_user=u.id_user
                                and pe.id_reservation=?";
                  $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                  $sth->execute(array($id_reservation));
                  $reservation = $sth->fetchAll();
                  fermer_connection_db($pdo);
                  return  $reservation;   
            }
            
            function update_reservation_id_vehicule_id_conducteur_and_etat($id_vehicule,$id_conducteur=null,$etat,$id_reservation):int{
                $pdo=ouvrir_connection_db();
                $sql="UPDATE `reservation` 
                        SET `id_vehicule` = ?, `id_conducteur` = ?, `id_etat` = ?
                             WHERE `reservation`.`id_reservation` = ? ";
                 $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                 $sth->execute(array($id_vehicule,$id_conducteur,$etat,$id_reservation));
                /*  var_dump($sth->execute(array($id_vehicule,$id_conducteur,$etat,$id_reservation)));
                 die; */
                 $dernier_id = $pdo->lastInsertId();
                 fermer_connection_db($pdo);//fermeture
                 return $dernier_id ;   
            }
            function update_reservation_id_vehicule_and_etat($id_vehicule,$etat,$id_reservation):int{
                $pdo=ouvrir_connection_db();
                $sql="UPDATE `reservation` 
                        SET `id_vehicule` = ?, `id_etat` = ?
                             WHERE `reservation`.`id_reservation` = ? ";
                 $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                 $sth->execute(array($id_vehicule,$etat,$id_reservation));
                /*  var_dump($sth->execute(array($id_vehicule,$id_conducteur,$etat,$id_reservation)));
                 die; */
                 $dernier_id = $pdo->lastInsertId();
                 fermer_connection_db($pdo);//fermeture
                 return $dernier_id ;   
            }
            function update_reservation__annuler_by_id(int $etat,int $id_reservation):int{
                $pdo=ouvrir_connection_db();
                $sql="UPDATE `reservation` 
                        SET `id_etat` = ?
                             WHERE `reservation`.`id_reservation` = ? ";
                 $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                 $sth->execute(array($etat,$id_reservation));
                 $dernier_id = $pdo->lastInsertId();
                 fermer_connection_db($pdo);//fermeture
                 return $dernier_id ;   
            }
            function update_reservation_date_retour_reel_kilometre($kmt,$date_retour,$id_reservation){
                $pdo=ouvrir_connection_db();
                $sql="UPDATE `reservation` 
                        SET `kilometre_parcourus` = ?,`date_retour_reel` = ?
                             WHERE `reservation`.`id_reservation` = ? ";
                 $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                var_dump( $sth->execute(array($kmt,$date_retour,$id_reservation)));
                 $dernier_id = $pdo->lastInsertId();
                 fermer_connection_db($pdo);//fermeture
                 return $dernier_id ;   
            }

            function insert_into_paiement_caution($montant,int $id_reservation,int $id_mode_paiement){
                $pdo=ouvrir_connection_db();
                $sql="INSERT INTO paiement (montant_paiement,id_reservation,id_mode_paiement)
                           VALUES (?,?,?)";
                $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array($montant,$id_reservation,$id_mode_paiement));
                $dernier_id = $pdo->lastInsertId();
                fermer_connection_db($pdo);
                return$dernier_id;
            }
          
            
?>