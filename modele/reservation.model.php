<?php 

            function find_all_reservation_cours($etat_reservation='en cours'):array{
                $pdo=ouvrir_connection_db();
                $sql=" SELECT * FROM reservation re,user u,etat e,modele mo,marque ma,categorie ca
                       WHERE re.id_user=u.id_user
                       and re.id_marque=ma.id_marque
                       and re.id_modele=mo.id_modele
                       and re.id_categorie=ca.id_categorie
                       and re.id_etat=e.id_etat
                        and e.nom_etat like ? ";
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
            function ajout_reservation_vehicule(array $reservations){
                $pdo=ouvrir_connection_db();
                $sql="INSERT INTO reservation (date_debut_location,date_fin_location,id_user,id_modele,id_marque,id_categorie,id_etat,id_type_vehicule)
                 VALUES (?,?,?,?,?,?,?,?)";
                  $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                   /* $now=date_create();
                   $now=date_format($now,'Y-m-d H:i:s'); */
                  
                   $sth->execute($reservations);
                   fermer_connection_db($pdo);
            }
            function lister_reservation_by_client(int $id_client):array{
                $pdo=ouvrir_connection_db();
                $sql=" SELECT * FROM reservation re,modele mo,marque ma,categorie ca,user u,type_vehicule tv
                       WHERE re.id_modele=mo.id_modele
                       and re.id_type_vehicule=tv.id_type_vehicule
                       and re.id_marque=ma.id_marque
                       and re.id_user=u.id_user
                       and re.id_categorie=ca.id_categorie
                       and re.id_user=?
                       order by re.date_debut_location desc";
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
            
?>