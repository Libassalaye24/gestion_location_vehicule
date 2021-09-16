<?php 


if ($_SERVER['REQUEST_METHOD']=='GET') {
    if (isset($_GET['views'])) {
       if ($_GET['views']=='connexion') {
        require(ROUTE_DIR.'views/security/connexion.html.php');
       }elseif ($_GET['views']=='inscription') {
        require(ROUTE_DIR.'views/security/inscription.html.php');
       }elseif ($_GET['views']=='deconnexion') {
             deconnexion();
       }

    }else{
            require(ROUTE_DIR.'views/security/connexion.html.php');
        }
}elseif ($_SERVER['REQUEST_METHOD']=='POST'){
    if (isset($_POST['action'])) {
        if ($_POST['action']=='connexion') {
           connexion($_POST['login'],$_POST['password']);
        }
    }
}


function connexion(string $login,string $password):void{
    $arrayError=array();
   valide_field_mail($login,'login',$arrayError);
    validation_password($password,$arrayError,'password');
  if (form_valid($arrayError)) {
   
    $user =  find_user_by_login_password($login,$password);
   
    if (count($user)==0) {
        $arrayError['invalide']='login ou password incorrecte';
        $_SESSION['arrayError']=$arrayError;
        header('location:'.WEB_ROUTE.'?controlleurs=security&views=connexion');
        exit();
    }else {
      $_SESSION['userConnect'] = $user;
     
        if ($user['nom_role']=='CLIENT') {
          header('location:'.WEB_ROUTE.'?controlleurs=vehicule&views=liste.vehicule');
          exit();
        }elseif ($user['nom_role']=='GESTIONNAIRE') {
            header('location:'.WEB_ROUTE);
            exit();
        }else {
            header('location:'.WEB_ROUTE.'?controlleurs=reservation&views=liste.reservations');
            exit();
        }
     
    }
  }else {
    $_SESSION['arrayError']=$arrayError;
    header('location:'.WEB_ROUTE.'?controlleurs=security&views=connexion');
    exit();
  }
  
 }

function inscription(array $data ,array $files):void{
    $arrayError=array();
  /*   $target_dir = UPLOAD_DIR;
    $target_file = $target_dir . basename($files["image"]["name"]);    */    
    extract($data);
    valide_field_number($numero,VALIDE_NUMBER,'numero',$arrayError);
   validation_password($password,$arrayError,'password'); 
   valide_field_mail($login,'login',$arrayError);
   valide_user_name($nom,'nom',$arrayError);
   valide_user_name($prenom,'prenom',$arrayError);
  // valide_user_name($adresse,'adresse',$arrayError);
  /*  valide_image($files,'image',$arrayError,$target_file); */
   if (login_exist($login)) {
      $arrayError['loginExist'] = 'ce login exist deja';
      $_SESSION['arrayError']=$arrayError;
      header('location:'.WEB_ROUTE.'?controlleurs=security&views=inscription');
      exit;
   }
   if (form_valid($arrayError)) {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      insncrire_utilisateur($data);
      header('location:'.WEB_ROUTE.'?controlleurs=security&views=connexion');
    exit;
    }
        
   }else {
    $_SESSION['arrayError']=$arrayError;
    header('location:'.WEB_ROUTE.'?controlleurs=security&views=inscription');
   }
  
} 
     
       
       


function deconnexion():void{
    unset($_SESSION['userConnect']);
    header('location:'.WEB_ROUTE);
    exit();

}
?>