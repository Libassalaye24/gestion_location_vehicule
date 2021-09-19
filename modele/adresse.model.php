<?php 

function insert_adresse(array $adresse):int{
    $pdo=ouvrir_connection_db();
    $sql="INSERT INTO adresse (rue,ville,numero_adresse, pays, code_postal)
                     VALUES (?, ?, ?, ?,?)";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute($adresse);
   
    $dernier_id = $pdo->lastInsertId();
   /*  var_dump($dernier_id);
    die; */
    fermer_connection_db($pdo);
    return $dernier_id;
}
    
?>