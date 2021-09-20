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

?>