<?php

    function find_bien_disponible($start=null,$num_page=null):array{
        $pdo=ouvrir_connection_db();
        $sql="select * from vehicule v,etat e,categorie c,modele mo,marque ma,type_vehicule tv
                 where v.id_etat=e.id_etat
                    and v.id_categorie=c.id_categorie
                    and v.id_modele=mo.id_modele
                    and v.id_marque=ma.id_marque
                    and v.id_type_vehicule=tv.id_type_vehicule
                    and e.nom_etat=? ";
        if (!is_null($start) && !is_null($num_page)) {
            $sql.=" limit $start,$num_page";
        }
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array('disponible'));
        $vehicule_disponible = $sth->fetchAll(PDO::FETCH_ASSOC);
         // var_dump($biendispo);die();
        fermer_connection_db($pdo);
        return $vehicule_disponible;
    }
    function find_all_image_vehicule_by_id_($id_vehicule):array{
        $pdo=ouvrir_connection_db();
        $sql="SELECT nom_image from image  where id_vehicule=? ";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array($id_vehicule));
        $vehicule_disponible = $sth->fetchAll(PDO::FETCH_ASSOC);
         // var_dump($biendispo);die();
        fermer_connection_db($pdo);
        return $vehicule_disponible;
    }
    function find_image_vehicule_by_id($id_vehicule):array{
        $pdo=ouvrir_connection_db();
        $sql="SELECT nom_image from image  where id_vehicule=? LIMIT 1,1";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array($id_vehicule));
        $vehicule_disponible = $sth->fetchAll(PDO::FETCH_ASSOC);
         // var_dump($biendispo);die();
        fermer_connection_db($pdo);
        return $vehicule_disponible;
    }
    function find_bien_disponible_pa($start=null,$num_page=null):array{
        $pdo=ouvrir_connection_db();
        $sql="SELECT  distinct c.*,mo.*,ma.*,v.*,i.id_vehicule  from vehicule v,etat e,categorie c,modele mo,marque ma,type_vehicule tv,image i
                 where v.id_etat=e.id_etat
                    and v.id_categorie=c.id_categorie
                    and v.id_vehicule=i.id_vehicule
                    and v.id_modele=mo.id_modele
                    and v.id_marque=ma.id_marque
                    and v.id_type_vehicule=tv.id_type_vehicule
                    and e.nom_etat=? ";
         if (!is_null($start) && !is_null($num_page)) {
            $sql.="limit $start,$num_page ";
        }
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
    function find_all_categorie($start=null,$parPage=null):array{
        $pdo= ouvrir_connection_db();//ouvertur
        $sql="select * from categorie ";
        if (!is_null($start) && !is_null($parPage)) {
            $sql.= "limit $start,$parPage";
        }
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array($start,$parPage));
        $datas = $sth->fetchAll();
        fermer_connection_db($pdo);//fermeture
        return $datas;
    }
    function find_all_modele($start=null,$parPage=null):array{
        $pdo= ouvrir_connection_db();//ouvertur
        $sql="select * from modele ";
        if (!is_null($start) && !is_null($parPage)) {
            $sql.= "limit $start,$parPage";
        }
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array($start,$parPage));
        $datas = $sth->fetchAll();
        fermer_connection_db($pdo);//fermeture
        return $datas;
    }
    function find_all_modele_by_id($id_modele):array{
        $pdo= ouvrir_connection_db();//ouvertur
        $sql="select * from modele where id_modele= ?";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array($id_modele));
        $datas = $sth->fetchAll();
        fermer_connection_db($pdo);//fermeture
        return $datas;
    }
    function find_all_marque_by_id($id_marque):array{
        $pdo= ouvrir_connection_db();//ouvertur
        $sql="select * from marque where id_marque= ?";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array($id_marque));
        $datas = $sth->fetchAll();
        fermer_connection_db($pdo);//fermeture
        return $datas;
    }
    function find_all_categorie_by_id($id_categorie):array{
        $pdo= ouvrir_connection_db();//ouvertur
        $sql="select * from categorie where id_categorie= ?";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array($id_categorie));
        $datas = $sth->fetchAll();
        fermer_connection_db($pdo);//fermeture
        return $datas;
    }
    function find_all_marque($start=null,$parPage=null):array{
        $pdo= ouvrir_connection_db();//ouvertur
        $sql="select * from marque ";
        if (!is_null($start) && !is_null($parPage)) {
            $sql.= "limit $start,$parPage";
        }
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute();
        $datas = $sth->fetchAll();
        fermer_connection_db($pdo);//fermeture
        return $datas;
    }
    function find_all_option($start=null,$parPage=null):array{
        $pdo= ouvrir_connection_db();//ouvertur
        $sql="select * from option_vehicule";
        if (!is_null($start) && !is_null($parPage)) {
            $sql.= " limit $start,$parPage";
        }
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array($start,$parPage));
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

    function insert_voiture_vehicule(array $vehicules):int{
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
    function insert_image(array $image):int{
        $pdo= ouvrir_connection_db();
        $sql="INSERT INTO `image` (`nom_image`, `id_vehicule`) VALUES (?,?);";
         $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute($image);
      $dernier_id = $pdo->lastInsertId();
      fermer_connection_db($pdo);//fermeture
      return $dernier_id ;
    }
    function insert_vehicule_option(array $option_vehicule):int{
        $pdo= ouvrir_connection_db();
        $sql="INSERT INTO `vehicule_option_vehicule` (`id_option_vehicule`, `id_vehicule`) VALUES (?,?);";
         $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute($option_vehicule);
      $dernier_id = $pdo->lastInsertId();
      fermer_connection_db($pdo);//fermeture
      return $dernier_id ;
    }
    function insert_camion_vehicule(array $vehicules):int{
        $pdo= ouvrir_connection_db();
        $sql="INSERT INTO `vehicule` (`numero_vehicule`, `immatriculation_vehicule`, `kilometrage_vehicule`,
                `volume_m3`,`charge_maximale_kg`,`longueur`,`largeur`,`hauteur`,
                 `id_categorie`, `id_modele`, `id_marque`, `id_type_vehicule`, `id_etat`)
                      VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
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
    function find_marque_by_id( $id_marque):array{
        $pdo= ouvrir_connection_db();
        $sql="SELECT * from marque where id_marque=?";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array($id_marque));
        $marque = $sth->fetchAll(PDO::FETCH_ASSOC);
        fermer_connection_db($pdo);
        return $marque;
    }
    function find_option_by_id( $id_option):array{
        $pdo= ouvrir_connection_db();
        $sql="SELECT * from option_vehicule where id_option_vehicule=?";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array($id_option));
        $option = $sth->fetchAll(PDO::FETCH_ASSOC);
        fermer_connection_db($pdo);
        return $option;
    }

    function find_vehicule_by_id( $id_vehicule):array{
        $pdo= ouvrir_connection_db();
        $sql="SELECT * from vehicule v,categorie c,marque ma,modele mo,type_vehicule tv
                where v.id_categorie=c.id_categorie
                    and v.id_marque=ma.id_marque
                    and v.id_type_vehicule=tv.id_type_vehicule
                    and v.id_modele=mo.id_modele
                    and v.id_vehicule=?";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array($id_vehicule));
        $vehicule = $sth->fetchAll(PDO::FETCH_ASSOC);
        fermer_connection_db($pdo);
        return $vehicule;
    }
    function find_all_vehicule_option_vehicule($id_vehicule){
        $pdo= ouvrir_connection_db();
        $sql="SELECT ve.*,op.* FROM `vehicule_option_vehicule` ve,option_vehicule op,vehicule v
                 WHERE v.id_vehicule=ve.id_vehicule 
                    and ve.id_option_vehicule=op.id_option_vehicule
                         and v.id_vehicule=? ";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array($id_vehicule));
        $vehicule = $sth->fetchAll(PDO::FETCH_ASSOC);
        fermer_connection_db($pdo);
        return $vehicule;
    }
   

    function find_all_vehicule_by_marque_modele_categorie($categorie,$marque,$modele):array{
        $pdo=ouvrir_connection_db();
        $sql=" SELECT * FROM vehicule re,categorie ca,marque ma,modele mo,type_vehicule tv
               WHERE re.id_categorie=ca.id_categorie
                and re.id_marque=ma.id_marque
                and re.id_modele=mo.id_modele
                and re.id_type_vehicule=tv.id_type_vehicule
                and ca.nom_categorie like ? 
                and ma.nom_marque like ?
                and mo.nom_modele like ? ";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array($categorie,$marque,$modele));
        $filtreVehicule = $sth->fetchAll(PDO::FETCH_ASSOC);
        fermer_connection_db($pdo);
        return $filtreVehicule;
    }
    function find_all_vehicule_by_marque_modele_categorie_paginate($categorie,$marque,$modele,$start,$nbrPage):array{
        $pdo=ouvrir_connection_db();
        $sql=" SELECT * FROM vehicule re,categorie ca,marque ma,modele mo,type_vehicule tv
               WHERE re.id_categorie=ca.id_categorie
                and re.id_marque=ma.id_marque
                and re.id_modele=mo.id_modele
                and re.id_type_vehicule=tv.id_type_vehicule
                and ca.nom_categorie like ? 
                and ma.nom_marque like ?
                and mo.nom_modele like ? limit $start,$nbrPage";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array($categorie,$marque,$modele));
        $filtreVehicule = $sth->fetchAll(PDO::FETCH_ASSOC);
        fermer_connection_db($pdo);
        return $filtreVehicule;
    }
    function update_categorie(array $categories):int{
        $pdo=ouvrir_connection_db();
        $sql="UPDATE `categorie` 
                SET `nom_categorie` = ?,
                 `prix_location_jour` = ?,
                  `prix_location_km` = ?, 
                  `caution` = ? 
                  WHERE `id_categorie` = ?";
         $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
         $sth->execute($categories);
         $dernier_id = $pdo->lastInsertId();
         fermer_connection_db($pdo);//fermeture
         return $dernier_id ;     
      }

      function update_marque(array $marques):int{
        $pdo=ouvrir_connection_db();
        $sql="UPDATE `marque` 
                SET `nom_marque` = ?
                  WHERE `id_marque` = ?";
         $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
         $sth->execute($marques);
         $dernier_id = $pdo->lastInsertId();
         fermer_connection_db($pdo);//fermeture
         return $dernier_id ;     
      }
      function update_modele(array $modeles):int{
        $pdo=ouvrir_connection_db();
        $sql="UPDATE `modele` 
                SET `nom_modele` = ?
                  WHERE `id_modele` = ?";
         $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
         $sth->execute($modeles);
         $dernier_id = $pdo->lastInsertId();
         fermer_connection_db($pdo);//fermeture
         return $dernier_id ;     
      }
      function update_option(array $options):int{
        $pdo=ouvrir_connection_db();
        $sql="UPDATE `option_vehicule` 
                SET `nom_option_vehicule` = ?
                  WHERE `id_option_vehicule` = ?";
         $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
         $sth->execute($options);
         $dernier_id = $pdo->lastInsertId();
         fermer_connection_db($pdo);//fermeture
         return $dernier_id ;     
      }

      function find_all_vehicule_by_marque_modele_categorie_options(array $vehicule):array{
        $pdo=ouvrir_connection_db();
        $sql=" SELECT * FROM vehicule re,categorie ca,marque ma,
        modele mo,type_vehicule tv
               WHERE re.id_categorie=ca.id_categorie
                and re.id_marque=ma.id_marque
                and re.id_modele=mo.id_modele
                and re.id_type_vehicule=tv.id_type_vehicule
                and ca.nom_categorie like ? 
                and ma.nom_marque like ?
                and mo.nom_modele like ? ";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute($vehicule);
        $filtreVehicule = $sth->fetchAll(PDO::FETCH_ASSOC);
        fermer_connection_db($pdo);
        return $filtreVehicule;
    }

    function archive_vehicule( $id_etat,int $id_vehicule):int{
        $pdo=ouvrir_connection_db();
        $sql="UPDATE `vehicule` 
                SET `id_etat` = ?
                  WHERE `id_vehicule` = ?";
         $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
         $sth->execute(array($id_etat,$id_vehicule));
       /*   var_dump($id_conducteur);
         die; */
         $dernier_id = $pdo->lastInsertId();
         fermer_connection_db($pdo);//fermeture
         return $dernier_id ;     
      }
      function archive_categorie(int $id_categorie):int{
        $pdo=ouvrir_connection_db();
        $sql="UPDATE `categorie` 
                SET `etat` = ?
                  WHERE `id_categorie` = ?";
         $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
         $sth->execute(array('archiver',$id_categorie));
       /*   var_dump($id_conducteur);
         die; */
         $dernier_id = $pdo->lastInsertId();
         fermer_connection_db($pdo);//fermeture
         return $dernier_id ;     
      }
      function archive_marque(string $etat,int $id_marque):int{
        $pdo=ouvrir_connection_db();
        $sql="UPDATE `marque` 
                SET `etat` = ?
                  WHERE `id_marque` = ?";
         $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
         $sth->execute(array($etat,$id_marque));
         $dernier_id = $pdo->lastInsertId();
         fermer_connection_db($pdo);//fermeture
         return $dernier_id ;     
      }
?>