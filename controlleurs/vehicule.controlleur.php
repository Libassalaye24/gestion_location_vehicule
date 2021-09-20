<?php 


if ($_SERVER['REQUEST_METHOD']=='GET') {
    if (isset($_GET['views'])) {
      if ($_GET['views']=='liste.vehicule') {

          catalogue();
      }elseif ($_GET['views']=='ajout.vehicule') {
       show_ajout_vehicule();
      }elseif ($_GET['views']=='ajout.marque') {
         show_liste_marque();
      }elseif ($_GET['views']=='ajout.modele') {
         show_liste_modele();
      }elseif ($_GET['views']=='ajout.categorie') {
         show_liste_categorie();
      }elseif ($_GET['views']=='ajout.option') {
        show_liste_option(); 
      }elseif ($_GET['views']=='liste.conducteur') {
        require_once(ROUTE_DIR.'views/gestionnaire/liste.conducteur.html.php');  
      }elseif ($_GET['views']=='ajout.conducteur') {
        show_ajout_conducteur();
      }

    }else {
        catalogue();
    }
    
}elseif ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['action'])) {
      if ($_POST['action']=='add.bien') {
          if (isset($_POST['nbre'])) {
            show_ajout_vehicule($_POST['nbre_image']);
          }else {
            
          }
      }elseif ($_POST['action']=='add.categorie') {
            add_categorie($_POST);          
      }elseif ($_POST['action']=='add.conducteur') {
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
function show_ajout_conducteur(){
  $permis=find_all_type_permis();
  require_once(ROUTE_DIR.'views/gestionnaire/ajout.conducteur.html.php');  
}
function show_liste_categorie(){
  $categories=array();
  $categoriess=find_all_categorie();
  $nbrPage=nombrePageTotal($categoriess,4);
  $categories=pagination((int)$_GET['page'],$categoriess,4);
  $suivant=2;
  $suivant=$_GET['page']+1;
  $precedent=$_GET['page']-1;
  require_once(ROUTE_DIR.'views/gestionnaire/ajout.categorie.html.php'); 
}
function show_liste_marque(){
  $marques=array();
  $marquess=find_all_marque();
  $nbrPage=nombrePageTotal($marquess,4);
  $marques=pagination((int)$_GET['page'],$marquess,4);
  $suivant=2;
  $suivant=$_GET['page']+1;
  $precedent=$_GET['page']-1;
  require_once(ROUTE_DIR.'views/gestionnaire/ajout.marque.html.php'); 
}
function show_liste_modele(){
  $modeles=array();
  $modeless=find_all_modele();
  $nbrPage=nombrePageTotal($modeless,4);
  $modeles=pagination((int)$_GET['page'],$modeless,4);
  $suivant=2;
  $suivant=$_GET['page']+1;
  $precedent=$_GET['page']-1;
  require_once(ROUTE_DIR.'views/gestionnaire/ajout.modele.html.php'); 
}
function show_liste_option(){
  $options=array();
  $optionss=find_all_option();
  $nbrPage=nombrePageTotal($optionss,4);
  $options=pagination((int)$_GET['page'],$optionss,4);
  $suivant=2;
  $suivant=$_GET['page']+1;
  $precedent=$_GET['page']-1;
  require_once(ROUTE_DIR.'views/gestionnaire/ajout.option.html.php'); 
}
function show_liste_conducteur(){
  $conducteurs=array();
  $conducteurss=find_all_categorie();
  $nbrPage=nombrePageTotal($conducteurss,4);
  $conducteurs=pagination((int)$_GET['page'],$conducteurss,4);
  $suivant=2;
  $suivant=$_GET['page']+1;
  $precedent=$_GET['page']-1;
  require_once(ROUTE_DIR.'views/gestionnaire/ajout.conducteur.html.php'); 
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
            header('location:'.WEB_ROUTE.'?controlleurs=vehicule&views=ajout.categorie');
        }else {
          $_SESSION['arrayError']=$arrayError;
          header('location:'.WEB_ROUTE.'?controlleurs=vehicule&views=ajout.categorie');
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
      valide_field_number((string)$telephone,VALIDE_NUMBER,'numero',$arrayError);
      validefield($pays,'pays',$arrayError);
      validefield($ville,'ville',$arrayError);
      validefield1($rue,'rue',$arrayError);
      validefield2($code_postal,'code_postal',$arrayError);
      if (form_valid($arrayError)) {
          $adresse=[
            $rue,
            $ville,
            uniqid(),
            $pays,
            $code_postal
          ];
          $id_adresse=insert_adresse($adresse);
         
          $conducteurs=[
            $nom,
            $prenom,
            uniqid(),
            $telephone,
            $id_adresse,
            $permis
          ];
          insert_conducteur($conducteurs);
          header("location:".'?controlleurs=vehicule&views=liste.conducteur');
      }else {
        $_SESSION['arrayError'] = $arrayError;
        header("location:".'?controlleurs=vehicule&views=ajout.conducteur');
      }
    }
?>