<?php 

            function find_all_reservation_cours($etat_reservation='en cours'):array{
                $pdo=ouvrir_connection_db();
                $sql=" SELECT * FROM reservation re,vehicule v,user u
                       WHERE re.id_vehicule=v.id_vehicule 
                       and re.id_user=u.id_user
                        and re.etat_reservation like ? ";
                $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array($etat_reservation));
                $reservation_bien = $sth->fetchAll();
                fermer_connection_db($pdo);
                return $reservation_bien;
            }
        
            function ajout_reservation_vehicule(array $reservations){
                $pdo=ouvrir_connection_db();
                $sql="INSERT INTO reservation (date_debut_location,date_fin_location,id_user,id_modele,id_marque,id_categorie,id_etat)
                 VALUES (?,?,?,?,?,?,?)";
                  $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                   /* $now=date_create();
                   $now=date_format($now,'Y-m-d H:i:s'); */
                   $sth->execute($reservations);
                   fermer_connection_db($pdo);
            }
?>