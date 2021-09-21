<?php

function insert_conducteur(array $conducteurs):int{
    $pdo= ouvrir_connection_db();
    $sql="INSERT INTO `conducteur` (`nom_conducteur`, `prenom_conducteur`, `numero_conducteur`, `telephone_conducteur`, `id_adresse`, `id_permis`)
    VALUES (?, ?, ?, ?, ?, ?)";
     $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $sth->execute($conducteurs);
  $dernier_id = $pdo->lastInsertId();
  fermer_connection_db($pdo);//fermeture
  return $dernier_id ;
}

function find_all_conducteur():array{
  $pdo= ouvrir_connection_db();//ouvertur
  $sql="select * from conducteur";
  $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $sth->execute();
  $conducteurs = $sth->fetchAll();
  fermer_connection_db($pdo);//fermeture
  return $conducteurs;
}
function find_conducteur_by_id( $id_conducteur):array{
  $pdo= ouvrir_connection_db();
  $sql="SELECT * from conducteur c,permis p,adresse ad
          where c.id_permis=p.id_permis
            and c.id_adresse=ad.id_adresse
            and c.id_conducteur=? ";
  $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $sth->execute(array($id_conducteur));
  $conducteur = $sth->fetchAll(PDO::FETCH_ASSOC);
  fermer_connection_db($pdo);
  return $conducteur;
}
  function update_conducteur(array $conducteurs):int{
    $pdo=ouvrir_connection_db();
    $sql="UPDATE `conducteur` 
            SET `nom_conducteur` = ?,
             `prenom_conducteur` = ?,
              `telephone_conducteur` = ?, 
              `id_permis` = ? 
              WHERE `conducteur`.`id_conducteur` = ?";
     $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
     $sth->execute($conducteurs);
     $dernier_id = $pdo->lastInsertId();
     fermer_connection_db($pdo);//fermeture
     return $dernier_id ;     
  }
?>