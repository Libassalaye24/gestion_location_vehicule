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
   /*  function find_all_categorie_par_page($premier,$parPage):array{
        $pdo= ouvrir_connection_db();//ouvertur
        $sql="  SELECT * from categorie
                 desc limit $premier,$parPage";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute();
        $nbr_cat_page = $sth->fetchAll();
        fermer_connection_db($pdo);//fermeture
        return $nbr_cat_page;
    } */
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
        $datas = $sth->fetchAll(PDO::FETCH_ASSOC);
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
    function find_all_type_permis():array{
        $pdo= ouvrir_connection_db();//ouvertur
        $sql="select * from permis";
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
    function insert_marque(string $marque):int{
        $pdo= ouvrir_connection_db();
        $sql="INSERT INTO `marque` (`nom_marque`)
                     VALUES (?)";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array($marque));
        $dernier_id = $pdo->lastInsertId();
         fermer_connection_db($pdo);//fermeture
         return $dernier_id ;
    }
    function insert_modele(string $modele):int{
        $pdo= ouvrir_connection_db();
        $sql="INSERT INTO `modele` (`nom_modele`)
                     VALUES (?)";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array($modele));
        $dernier_id = $pdo->lastInsertId();
         fermer_connection_db($pdo);//fermeture
         return $dernier_id ;
    }
    function insert_option(string $option):int{
        $pdo= ouvrir_connection_db();
        $sql="INSERT INTO `option_vehicule` (`nom_option_vehicule`)
                     VALUES (?)";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array($option));
        $dernier_id = $pdo->lastInsertId();
         fermer_connection_db($pdo);//fermeture
         return $dernier_id ;
    }

    function insert_into_vehicule(array $vehicules):int{
        $pdo= ouvrir_connection_db();
        $sql="INSERT INTO `vehicule` (`numero_vehicule`, `immatriculation_vehicule`, `kilometrage_vehicule`,
                 `id_categorie`, `id_modele`, `id_marque`, `id_type_vehicule`, `id_etat`)
                      VALUES (?,?,?,?,?,?,?,?)";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute($vehicules);
        $dernier_id = $pdo->lastInsertId();
         fermer_connection_db($pdo);//fermeture
         return $dernier_id ;
    }

    function find_categorie_by_id( $id_categorie):array{
        $pdo= ouvrir_connection_db();
        $sql="SELECT * from categorie where id_categorie=?";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array($id_categorie));
        $categorie = $sth->fetchAll(PDO::FETCH_ASSOC);
        fermer_connection_db($pdo);
        return $categorie;
    }

    function find_modele_by_id( $id_modele):array{
        $pdo= ouvrir_connection_db();
        $sql="SELECT * from modele where id_modele=?";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array($id_modele));
        $modele = $sth->fetchAll(PDO::FETCH_ASSOC);
        fermer_connection_db($pdo);
        return $modele;
    }

    function find_vehicule_by_id( $id_vehicule):array{
        $pdo= ouvrir_connection_db();
        $sql="SELECT * from vehicule v,categorie c,marque ma,modele mo
                where v.id_categorie=c.id_categorie
                    and v.id_marque=ma.id_marque
                    and v.id_modele=mo.id_modele
                    and id_vehicule=?";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array($id_vehicule));
        $vehicule = $sth->fetchAll(PDO::FETCH_ASSOC);
        fermer_connection_db($pdo);
        return $vehicule;
    }

?>