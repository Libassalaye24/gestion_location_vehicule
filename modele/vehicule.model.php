<?php

    function find_bien_disponible():array{
        $pdo=ouvrir_connection_db();
        $sql="select * from vehicule v,etat e,categorie c,modele mo,marque ma
                 where v.id_etat=e.id_etat
                    and v.id_categorie=c.id_categorie
                    and v.id_modele=mo.id_modele
                    and v.id_marque=ma.id_marque
                    and e.nom_etat=?";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array('disponible'));
        $vehicule_disponible = $sth->fetchAll(PDO::FETCH_ASSOC);
         // var_dump($biendispo);die();
        fermer_connection_db($pdo);
        return $vehicule_disponible;
    }
    function find_all_categorie():array{
        $pdo= ouvrir_connection_db();//ouvertur
        $sql="select * from categorie";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute();
        $datas = $sth->fetchAll();
        fermer_connection_db($pdo);//fermeture
        return $datas;
    }
    function find_all_modele():array{
        $pdo= ouvrir_connection_db();//ouvertur
        $sql="select * from modele";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute();
        $datas = $sth->fetchAll();
        fermer_connection_db($pdo);//fermeture
        return $datas;
    }
    function find_all_marque():array{
        $pdo= ouvrir_connection_db();//ouvertur
        $sql="select * from marque";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute();
        $datas = $sth->fetchAll();
        fermer_connection_db($pdo);//fermeture
        return $datas;
    }
    function find_all_option():array{
        $pdo= ouvrir_connection_db();//ouvertur
        $sql="select * from option_vehicule";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute();
        $datas = $sth->fetchAll();
        fermer_connection_db($pdo);//fermeture
        return $datas;
    }
    function find_all_type_vehicule():array{
        $pdo= ouvrir_connection_db();//ouvertur
        $sql="select * from type_vehicule";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute();
        $datas = $sth->fetchAll();
        fermer_connection_db($pdo);//fermeture
        return $datas;
    }
    function insert_categorie(array $categories):int{
        $pdo= ouvrir_connection_db();
        extract($categories);
        $sql="INSERT INTO `categorie` (`nom_categorie`, `prix_location_jour`,`prix_location_km`,`caution`)
                     VALUES (?,?,?,?)";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array($categorie,$caution,$prix_jour,$prix_kilometre));
       /*  var_dump($categories);
        die; */
        $dernier_id = $pdo->lastInsertId();
         fermer_connection_db($pdo);//fermeture
         return $dernier_id ;
    }

?>