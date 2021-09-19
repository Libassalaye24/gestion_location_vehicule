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
            catalogue();
     }
}elseif ($_SERVER['REQUEST_METHOD']=='POST'){
    if (isset($_POST['action'])) {
        if ($_POST['action']=='connexion') {
           connexion($_POST['login'],$_POST['password']);
        }elseif ($_POST['action']=='inscription') {
             add_user($_POST);
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
          header('location:'.WEB_ROUTE.'?controlleurs=reservation&views=mes.reservations');
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

function inscription(array $data):void{
    $arrayError=array();
   /*  $target_dir = UPLOAD_DIR;
    $target_file = $target_dir . basename($files["image"]["name"]); */       
    extract($data);
    valide_field_number((string)$telephone,VALIDE_NUMBER,'numero',$arrayError);
   validation_password($password,$arrayError,'password'); 
   valide_field_mail($login,'login',$arrayError);
   valide_user_name($nom,'nom',$arrayError);
   valide_user_name($prenom,'prenom',$arrayError);
   validefield($pays,'pays',$arrayError);
   validefield($ville,'ville',$arrayError);
   validefield1($rue,'rue',$arrayError);
   validefield1($fax,'fax',$arrayError);
   validefield2($code_postal,'code_postal',$arrayError);
   if ($password!=$confirm_password) {
      $arrayError['confirm'] = 'le mot de passe est different';
      $_SESSION['arrayError']=$arrayError;
      header('location:'.WEB_ROUTE.'?controlleurs=security&views=inscription');
      exit;
   }
  // valide_image($files,'image',$arrayError,$target_file);
   if (login_exist($login)==false) {
      $arrayError['loginExist'] = 'ce login exist deja';
      $_SESSION['arrayError']=$arrayError;
      header('location:'.WEB_ROUTE.'?controlleurs=security&views=inscription');
      exit;
   }
   if (form_valid($arrayError)) {
     //nom_user,prenom_user,email_user,telephone_user,fax_user,password_user,id_adresse,id_role,confirm_password
   //`rue`, `ville`, `numero_adresse`, `pays`, `code_postal`
        //add_user($data);
        header('location:'.WEB_ROUTE.'?controlleurs=security&views=connexion');
        exit;
        
   }else {
    $_SESSION['arrayError']=$arrayError;
    header('location:'.WEB_ROUTE.'?controlleurs=security&views=inscription');
   }
  
} 
     
       
       

function add_user(array $post):void{
  extract($post);
  $adresse=[
    $rue,
    $ville,
    uniqid(),
    $pays,
    $code_postal
];
$last_id = insert_adresse($adresse);

 $user=[
    $nom,
    $prenom,
    $login,
    $telephone,
    $fax,
    $password,
    $last_id,
    2,
    $confirm_password
 ];
    inscrire_utilisateur($user);
/*     var_dump(insert_adresse($adresse));
echo("<br>");
var_dump(inscrire_utilisateur($user));
die; */
    header('location:'.WEB_ROUTE.'?controlleurs=security&views=connexion');
    exit;
}
function deconnexion():void{
    unset($_SESSION['userConnect']);
    header('location:'.WEB_ROUTE);
    exit();

}
?>