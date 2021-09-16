<?php 
   

   function insncrire_utilisateur(array $user):int{
        $pdo=ouvrir_connection_db();
        extract($user);
        $sql="  INSERT INTO user (id_user,nom_user,prenom_user,email_user,telephone_user,
                                fax_user,password_user,id_adresse,id_role) 
                VALUES (?,?,?,?,?,?,?,?,?); ";
                if (!est_connect()) {
                    $id_role=1;
                }
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array(NULL,$nom_user,$prenom_user,$email_user,$telephone_user,$fax_user,$password_user,$id_adresse,$id_role));
        $user = $sth->fetch(PDO::FETCH_ASSOC);
        fermer_connection_db($pdo);
        return $user = $sth->rowCount();
    }

    function login_exist(string $login):array{
        $pdo=ouvrir_connection_db();
        $sql='select * from user u ,role ro where 
                u.loguin=?';
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array($login));
        $user = $sth->fetchAll();
        fermer_connection_db($pdo);
        return $user;
    }
    function find_user_by_login_password($login,$password){
        $pdo=ouvrir_connection_db();
        $sql='select * from user u ,role ro where 
        u.id_role=ro.id_role and
        u.email_user=? and u.password_user=?';
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array($login,$password));
        $user = $sth->fetch(PDO::FETCH_ASSOC);
       // $user = $sth->fetchAll();
        
        fermer_connection_db($pdo);
        return $user;
    }
?>