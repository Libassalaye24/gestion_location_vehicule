<?php 

if ($_SERVER['REQUEST_METHOD']=='GET') {
   
    if (isset($_GET['views'])) {
        if ($_GET['views']=='mes.reservations') {
            show_mes_reservations();
        }elseif ($_GET['views']=='liste.reservations') {
         require(ROUTE_DIR.'views/reservation/liste.reservations.html.php');
        }elseif ($_GET['views']=='ajout.reservation') {
           show_ajout_reservation($_GET['id_vehicule']);
        }
 
     }else{
          require(ROUTE_DIR.'views/client/liste.vehicule.html.php');
     }
   
}elseif ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action']=='add.reservation') {
            add_user_reserve($_POST);
        }
    }
}



function add_user_reserve(array $post):void{
    $arrayError=[];
    extract($post);
   
    valide_field_number((string)$telephone,VALIDE_NUMBER,'numero',$arrayError);
    validation_password($password,$arrayError,'password'); 
    valide_field_mail($login,'login',$arrayError);
    valide_user_name($nom,'nom',$arrayError);
    valide_user_name($prenom,'prenom',$arrayError);
    validefield($pays,'pays',$arrayError);
    validefield($ville,'ville',$arrayError);
    validefield1($rue,'rue',$arrayError);
    validefield2($code_postal,'code_postal',$arrayError);
    valide_user_name($date_debut,'date_debut',$arrayError);
    valide_user_name($date_fin,'date_fin',$arrayError);
    if ($password!=$confirm_password) {
        $arrayError['confirm'] = 'le mot de passe est different';
        $_SESSION['arrayError']=$arrayError;
        header('location:'.WEB_ROUTE.'?controlleurs=reservation&views=ajout.reservation&id_vehicule='.$post['id_vehicule']);
        exit;
     } 
     $user=login_exist($login);
    /*  var_dump($user);
     die; */
     if ($user!=false) {
        $arrayError['loginExist'] = 'ce login exist deja';
        $_SESSION['arrayError']=$arrayError;
        header('location:'.WEB_ROUTE.'?controlleurs=reservation&views=ajout.reservation&id_vehicule='.$post['id_vehicule']);
        exit;
     }
    if (form_valid($arrayError)) {
        $adresse=[
            (int)$rue,
            $ville,
            genere_reference(),
            $pays,
            (int)$code_postal
        ];
        $last_id = insert_adresse($adresse);
        
         $user=[
            $nom,
            $prenom,
            $login,
            $telephone,
           genere_reference(),
            $password,
            $last_id,
            2,
            $confirm_password
         ];
          $id_user=inscrire_utilisateur($user);
     $date_debut=date_format(date_create($date_debut),'Y-m-d H:i:s');
     $date_fin=date_format(date_create($date_fin),'Y-m-d H:i:s');
        $reservations=[
            $date_debut,
            $date_fin,
            $id_user,
            $_SESSION['id_modele'],
            $_SESSION['id_marque'],
            $_SESSION['id_categorie'],
            1
        ];
        ajout_reservation_vehicule($reservations);
        header('location:'.WEB_ROUTE);
        exit;
    }else {
        $_SESSION['arrayError']=$arrayError;
        header('location:'.WEB_ROUTE.'?controlleurs=reservation&views=ajout.reservation&id_vehicule='.$post['id_vehicule']);
    }
  }
    function show_mes_reservations(){
         require(ROUTE_DIR.'views/reservation/mes.reservations.html.php');
    }
    function show_ajout_reservation($id_vehicule){
        $vehicule=find_vehicule_by_id($id_vehicule);
        $_SESSION['id_marque']=$vehicule[0]['id_marque'];
        $_SESSION['id_modele']=$vehicule[0]['id_modele'];
        $_SESSION['id_categorie']=$vehicule[0]['id_categorie'];
        
        require(ROUTE_DIR.'views/reservation/ajout.reservation.html.php');
   }

   
?>