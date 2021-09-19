<?php 


if ($_SERVER['REQUEST_METHOD']=='GET') {
    if (isset($_GET['views'])) {
      if ($_GET['views']=='liste.vehicule') {

          catalogue();
      }elseif ($_GET['views']=='ajout.vehicule') {
       show_ajout_vehicule();
      }elseif ($_GET['views']=='ajout.marque') {
        require_once(ROUTE_DIR.'views/gestionnaire/ajout.marque.html.php');  
      }elseif ($_GET['views']=='ajout.modele') {
        require_once(ROUTE_DIR.'views/gestionnaire/ajout.modele.html.php');  
      }elseif ($_GET['views']=='ajout.categorie') {
         show_liste_categorie();
      }elseif ($_GET['views']=='ajout.option') {
        require_once(ROUTE_DIR.'views/gestionnaire/ajout.option.html.php');  
      }elseif ($_GET['views']=='ajout.conducteur') {
        require_once(ROUTE_DIR.'views/gestionnaire/ajout.conducteur.html.php');  
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
function show_liste_categorie(){
  $categories=find_all_categorie();
  require_once(ROUTE_DIR.'views/gestionnaire/ajout.categorie.html.php'); 
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
?>