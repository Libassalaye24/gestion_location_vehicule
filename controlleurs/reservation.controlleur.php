<?php 

if ($_SERVER['REQUEST_METHOD']=='GET') {
   
    if (isset($_GET['views'])) {
        if ($_GET['views']=='mes.reservations') {
            show_mes_reservations();
        }elseif ($_GET['views']=='liste.reservations') {
            show_liste_reservations();
        }elseif ($_GET['views']=='retour.location') {
            require(ROUTE_DIR.'views/reservation/retour.location.html.php');
        }elseif ($_GET['views']=='ajout.reservation') {
            show_ajout_reservation($_GET['id_vehicule']);
        }elseif ($_GET['views']=='reservation.client') {
           show_reservation_client($_GET['id_client']);
        }elseif ($_GET['views']=='traiter.reservation') {
           if (est_responsable()) {
            show_traiter_reservation((int)$_GET['id_reservation']);
           }else {
            header("location:".WEB_ROUTE.'?controlleurs=vehicule&views=liste.vehicule');
           }
        }
        
     }else{
          require(ROUTE_DIR.'views/client/liste.vehicule.html.php');
     }
   
}elseif ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action']=='add.reservation') {
            add_user_reserve($_POST);
        }elseif ($_POST['action']=='filtre_reservation') {
              show_liste_reservations($_POST);
        }elseif ($_POST['action']=='traiter.reservation') {
           
            show_liste_reservations();
        }
    }
}


function show_traiter_reservation($id_reservation){
    $reservation=find_reservation_by_id_reservation($id_reservation);
    $conducteurs=find_all_conducteur_by_permis();
    $vehicule=find_all_vehicule_by_marque_modele_categorie($reservation[0]['nom_categorie'],$reservation[0]['nom_marque'],$reservation[0]['nom_modele']);
    require(ROUTE_DIR.'views/reservation/traiter.reservation.html.php');
}
function show_reservation_client($id_client){
    $reserve_client=lister_reservation_by_client($id_client);
    require(ROUTE_DIR.'views/reservation/reservation.client.html.php');
}
function show_ajout_reservation($id_vehicule){
    $vehicule=find_vehicule_by_id($id_vehicule);
    $_SESSION['id_marque']=$vehicule[0]['id_marque'];
    $_SESSION['id_modele']=$vehicule[0]['id_modele'];
    $_SESSION['id_categorie']=$vehicule[0]['id_categorie'];
    $_SESSION['id_type_vehicule']=$vehicule[0]['id_type_vehicule'];
    $options=find_all_vehicule_option_vehicule($id_vehicule);
    require(ROUTE_DIR.'views/reservation/ajout.reservation.html.php');
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
    //$date_debut=date_create($date_debut);
   // $date_fin=date_create($date_fin);
   // compare_date($date_fin,$date_debut,'date_debut',$arrayError);
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
        if (isset($post['chauffeur'])) {
            $_SESSION['chauffeur'] = $post['chauffeur'];
        }
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
                1,
                $_SESSION['id_type_vehicule']
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
   
   function show_liste_reservations($post=null){
       if (isset($_POST['traiter'])) {
           if (isset($_POST['conducteur'])) {
               update_reservation_id_vehicule_id_conducteur_and_etat((int)$_POST['vehicule'],(int)$_POST['conducteur'],2,(int)$_GET['id_reservation']);

           }else {
            update_reservation_id_vehicule_and_etat((int)$_POST['vehicule'],2,(int)$_GET['id_reservation']);
 
           }
          // die('test');
       }
       $etats=find_all_etat();
        if (is_null($post)) {
             $encours_reservation=find_all_reservation_by_date_or_etat_paginate();
             $nbrPage=2;
             $total_records=count($encours_reservation);
             $total_page=total_page($total_records,$nbrPage);
             $get=$_GET['page'];
             if (isset($get)) {
               $page=$get;
             }else {
               $page=1;
             }
             $suivant=$precedent=0;
             $suivant=$page+1;
             $precedent=$page-1;
             $start_from=start_from($page,$nbrPage);
             $encours_reservation=find_all_reservation_by_date_or_etat_paginate('en cours',null,$start_from,$nbrPage);
        }else {
            extract($post);
          /*  $_SESSION['date']=$date;
           var_dump( $_SESSION['date']);
           die; */
           if ($date==null) {
            $encours_reservation=find_all_reservation_by_date_or_etat_paginate($etat_reservation);
            $nbrPage=3;
            $total_records=count($encours_reservation);
            $total_page=total_page($total_records,$nbrPage);
            $get=$_GET['page'];
            if (isset($get)) {
              $page=$get;
            }else {
              $page=1;
            }
            $suivant=$precedent=0;
            $suivant=$page+1;
            $precedent=$page-1;
            $start_from=start_from($page,$nbrPage);
             $encours_reservation=find_all_reservation_by_date_or_etat_paginate($etat_reservation,null,$start_from,$nbrPage);
           }else {
            $date=date_format(date_create($date),'Y-m-d H:i:s');
            $encours_reservation=find_all_reservation_by_date_or_etat($etat_reservation,$date);
           }
        
        }
        require(ROUTE_DIR.'views/reservation/liste.reservations.html.php');

   }

   
?>