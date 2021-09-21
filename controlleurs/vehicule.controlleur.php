<?php 


if ($_SERVER['REQUEST_METHOD']=='GET') {
    if (isset($_GET['views'])) {
      if ($_GET['views']=='liste.vehicule') {

          catalogue();
      }elseif ($_GET['views']=='ajout.vehicule') {
       show_ajout_vehicule();
      }elseif ($_GET['views']=='liste.vehicule') {
        require_once(ROUTE_DIR.'views/gestionnaire/liste.vehicule.html.php');
       }elseif ($_GET['views']=='liste.marque') {
         show_liste_marque();
      }elseif ($_GET['views']=='liste.modele') {
         show_liste_modele();
      }elseif ($_GET['views']=='liste.categorie') {
         show_liste_categorie();
      }elseif ($_GET['views']=='liste.option') {
        show_liste_option(); 
      }elseif ($_GET['views']=='liste.conducteur') {
        show_liste_conducteur();
      }elseif ($_GET['views']=='ajout.conducteur') {
        show_ajout_conducteur();
      }elseif ($_GET['views']=='ajout.marque') {
        require_once(ROUTE_DIR.'views/gestionnaire/ajout.marque.html.php');
      }elseif ($_GET['views']=='ajout.modele') {
        require_once(ROUTE_DIR.'views/gestionnaire/ajout.modele.html.php');
      }elseif ($_GET['views']=='ajout.option') {
        require_once(ROUTE_DIR.'views/gestionnaire/ajout.option.html.php');
      }elseif ($_GET['views']=='ajout.categorie') {
        require_once(ROUTE_DIR.'views/gestionnaire/ajout.categorie.html.php');
      }elseif ($_GET['views']=='edit.conducteur') {
        show_ajout_conducteur($_GET['id_conducteur']);
      }

    }else {
        catalogue();
    }
    
}elseif ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['action'])) {
      if ($_POST['action']=='add.vehicule') {
          if (isset($_POST['nbre'])) {
            show_ajout_vehicule($_POST['nbre_image']);
          }elseif(isset($_POST['type_vehicule'])) {
            if ($_POST['typeVehicule']==1) {
              $_SESSION['post']=$_POST;
              show_ajout_vehicule($_POST['nbre_image']);
            }
           
          }else {
              //fonction ajouter vehicule
          }
      }elseif ($_POST['action']=='add.categorie') {
         /* var_dump($_POST);
        die; */
            add_categorie($_POST);          
      }elseif ($_POST['action']=='add.conducteur') {
            add_conducteur($_POST);
      }elseif ($_POST['action']=='add.marque') {
          add_marque($_POST);
      }elseif ($_POST['action']=='add.modele') {
        add_modele($_POST);
      }elseif ($_POST['action']=='add.option') {
        add_option($_POST);
      }elseif ($_POST['action']=='edit.conducteur') {
        add_conducteur($_POST);  
      }
    }
}

function catalogue(){
  $vehicule_disponible= find_bien_disponible();
  require_once(ROUTE_DIR.'views/client/liste.vehicule.html.php');  
}
function show_ajout_vehicule($nbre=1){
  $marques=find_all_marque();
  $modeles=find_all_modele();
  $options=find_all_option();
  $categories=find_all_categorie();
  $type_vehicule=find_all_type_vehicule();
  $_SESSION['nbre_image']=$nbre;
  require_once(ROUTE_DIR.'views/gestionnaire/ajout.vehicule.html.php');  
}
function show_ajout_conducteur($get=null){
  $driver=find_conducteur_by_id($get);
  $_SESSION['drive']=$driver;
  $permis=find_all_type_permis();
  require_once(ROUTE_DIR.'views/gestionnaire/ajout.conducteur.html.php');  
}
function show_liste_categorie(int $nbrElementPage=4,$page=1){
  $categories=find_all_categorie();
  require_once(ROUTE_DIR.'views/gestionnaire/liste.categorie.html.php'); 
}

function show_liste_marque(){
  $marques=find_all_marque();
  require_once(ROUTE_DIR.'views/gestionnaire/liste.marque.html.php'); 
}
function show_liste_modele(){
  $modeles=find_all_modele();
  require_once(ROUTE_DIR.'views/gestionnaire/liste.modele.html.php'); 
}
function show_liste_option(){
  $options=find_all_option();
  require_once(ROUTE_DIR.'views/gestionnaire/liste.option.html.php'); 
}
function show_liste_conducteur(){
  $conducteurs=find_all_conducteur();
  require_once(ROUTE_DIR.'views/gestionnaire/liste.conducteur.html.php'); 
}
    function add_categorie(array $data):void{
        $arrayError=array();
        extract($data);
        valide_nom_categorie($categorie,'categorie',$arrayError);
        valide_prix_categorie($prix_jour,'prix_jour',$arrayError);
        valide_prix_categorie($prix_kilometre,'prix_km',$arrayError);
        valide_prix_categorie($caution,'caution',$arrayError);       
        if (form_valid($arrayError)) {
            insert_categorie($data);
            header('location:'.WEB_ROUTE.'?controlleurs=vehicule&views=liste.categorie');
            exit;
        }else {
          $_SESSION['arrayError']=$arrayError;
          header('location:'.WEB_ROUTE.'?controlleurs=vehicule&views=ajout.categorie');
          exit;
        }
    }
    function add_marque(array $data):void{
      $arrayError=[];
      extract($data);
      valide_nom_marque($marque,'marque',$arrayError);
      if (form_valid($arrayError)) {
          insert_marque($marque);
          header('location:'.WEB_ROUTE.'?controlleurs=vehicule&views=liste.marque');
          exit;
      }else {
        $_SESSION['arrayError']=$arrayError;
        header('location:'.WEB_ROUTE.'?controlleurs=vehicule&views=ajout.marque');
        exit;
      }
    }
    function add_modele(array $data):void{
      $arrayError=[];
      extract($data);
      valide_nom_marque($modele,'modele',$arrayError);
      if (form_valid($arrayError)) {
          insert_modele($modele);
          header('location:'.WEB_ROUTE.'?controlleurs=vehicule&views=liste.modele');
          exit;
      }else {
        $_SESSION['arrayError']=$arrayError;
        header('location:'.WEB_ROUTE.'?controlleurs=vehicule&views=ajout.modele');
        exit;
      }
    }

    function add_option(array $data):void{
      $arrayError=[];
      extract($data);
      valide_nom_marque($option,'option',$arrayError);
      if (form_valid($arrayError)) {
          insert_option($option);
          header('location:'.WEB_ROUTE.'?controlleurs=vehicule&views=liste.option');
          exit;
      }else {
        $_SESSION['arrayError']=$arrayError;
        header('location:'.WEB_ROUTE.'?controlleurs=vehicule&views=ajout.option');
        exit;
      }
    }

    function pagination(int $get,array $array,int $nbrElement):array{
      $page=1;
      $suivant=2;
      $nbrPage=0;
      if (!isset($get)) {
        $page=2;
        $nbrPage=nombrePageTotal($array,$nbrElement);
        $list=get_element_to_display($array,$page,$nbrElement);
      }
      if (isset($get)) {
        $page=$get;
        $suivant=$page+1;
        $precedent=$page-1;
        $nbrPage=nombrePageTotal($array,$nbrElement);
        $list=get_element_to_display($array,$page,$nbrElement);
      }
     
      return $list;
    }

    function add_conducteur(array $data):void{
      $arrayError=[];
      extract($data);
      valide_user_name($nom,'nom',$arrayError);
      valide_user_name($nom,'prenom',$arrayError);
      valide_field_number($telephone,VALIDE_NUMBER,'numero',$arrayError);
      validefield($pays,'pays',$arrayError);
      validefield($ville,'ville',$arrayError);
      validefield1($rue,'rue',$arrayError);
     // validefield2($code_postal,'code_postal',$arrayError);
      if (form_valid($arrayError)) {
       /*  var_dump($data['id']);
        die; */
       
          $adresse=[
            (int)$rue,
             $ville,
             genere_reference(),
             $pays,
            (int)$code_postal
          ];
        
          $id_adresse=insert_adresse($adresse);
         
          $conducteurs=[
            $nom,
            $prenom,
            genere_reference(),
            $telephone,
            $id_adresse,
            $permis
          ];
          insert_conducteur($conducteurs);
          header("location:".'?controlleurs=vehicule&views=liste.conducteur');
          exit;
        /* if (isset($data['id'])) {
          $adresse=[
            (int)$rue,
             $ville,
             $pays,
            (int)$code_postal,
            $driver['id_adresse']
          ];
       
       $id_adresse= update_adresse($adresse);
          $conducteurs=[
            $nom,
            $prenom,
            $telephone,
            $id_adresse,
            $permis
          ];
          update_conducteur($conducteurs);
        } */
        header("location:".'?controlleurs=vehicule&views=liste.conducteur');
        exit;
      }else {
        if (!isset($data['id'])) {
             $_SESSION['arrayError'] = $arrayError;
             header("location:".'?controlleurs=vehicule&views=ajout.conducteur');
            exit;
        }else {
          $_SESSION['arrayError'] = $arrayError;
          header("location:".'?controlleurs=vehicule&views=edit.conducteur');
          exit;
        }

      }
    }

    function add_vehicule(){

    }


?>