<?php 


if ($_SERVER['REQUEST_METHOD']=='GET') {
    if (isset($_GET['views'])) {
      if ($_GET['views']=='liste.vehicule') {
          catalogue();
      }elseif ($_GET['views']=='details.vehicule') {
        show_details_vehicule($_GET['id_vehicule']);
      }elseif ($_GET['views']=='ajout.voiture') {
       show_ajout_voiture();
      }elseif ($_GET['views']=='ajout.camion') {
        show_ajout_camion();
       }elseif ($_GET['views']=='liste.vehicules') {
        liste_vehicule($_GET['page']);
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
        show_ajout_marque();
      }elseif ($_GET['views']=='ajout.modele') {
        show_ajout_modele();
      }elseif ($_GET['views']=='ajout.option') {
        show_ajout_option();
      }elseif ($_GET['views']=='ajout.categorie') {
        show_ajout_categorie();
      }elseif ($_GET['views']=='edit.categorie') {
        show_ajout_categorie($_GET['id_categorie']);
      }elseif ($_GET['views']=='edit.conducteur') {
        show_ajout_conducteur($_GET['id_conducteur']);
      }elseif ($_GET['views']=='archive.conducteur') {
          $id_conducteur=$_GET['id_conducteur'];
          require_once(ROUTE_DIR.'views/gestionnaire/confirm.archive.html.php');
      }elseif ($_GET['views']=='archiver.categorie') {
        $id_categorie=$_GET['id_categorie'];
        require_once(ROUTE_DIR.'views/gestionnaire/archive.categorie.html.php');
    }elseif ($_GET['views']=='liste.archives') {
        show_liste_conducteur_archiver();
      }elseif ($_GET['views']=='edit.marque') {
        show_ajout_marque($_GET['id_marque']);
      }elseif ($_GET['views']=='edit.modele') {
        show_ajout_modele($_GET['id_modele']);
      }elseif ($_GET['views']=='edit.option') {
        show_ajout_option($_GET['id_option_vehicule']);
      }elseif ($_GET['views']=='archive.vehicules') {
        $id_vehicule=$_GET['id_vehicule'];
        require_once(ROUTE_DIR.'views/gestionnaire/archive.vehicule.html.php');
      }

    }else {
        catalogue();
    }
    
}elseif ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['action'])) {
      if ($_POST['action']=='add.voiture') {
          if (isset($_POST['nbre'])) {
            $_SESSION['post']=$_POST;
            show_ajout_voiture($_POST['nbre_image']);
          }else {
          
           add_voiture($_POST,$_FILES);
              
          }
      }elseif ($_POST['action']=='add.camion') {
           if (isset($_POST['nbre'])) {
            $_SESSION['post1']=$_POST;
            show_ajout_camion($_POST['nbre_image']);  
           }else {
             add_camion($_POST,$_FILES);
           }
                
      }elseif ($_POST['action']=='add.categorie') {
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
      }elseif ($_POST['action']=='filtre_vehicule') {
          liste_vehicule();
      }elseif ($_POST['action']=='archive.driver') {
        show_liste_conducteur_ar($_GET['id_conducteur']);
      }elseif ($_POST['action']=='edit.categorie') {
        add_categorie($_POST);     
      }elseif ($_POST['action']=='edit.marque') {
        add_marque($_POST);     
      }elseif ($_POST['action']=='edit.modele') {
        add_modele($_POST);     
      }elseif ($_POST['action']=='edit.option') {
        add_option($_POST);     
      }elseif ($_POST['action']=='archive.vehicule') {
        liste_vehicule();
      }elseif ($_POST['action']=='archive.categorie') {
        show_liste_categorie();
      }
    }
}

function show_details_vehicule($id_vehicule){
  $images=find_all_image_vehicule_by_id_($id_vehicule);
  $vehicule=find_vehicule_by_id($id_vehicule);
  require_once(ROUTE_DIR.'views/client/details.vehicule.html.php');  
}

function catalogue(){
    $categorie=find_all_categorie();
    $marques=find_all_marque();
    $modeles=find_all_modele();
    $vehicule_disponible= find_bien_disponible_pa();
    $nbrPage=3;
    $total_records=count($vehicule_disponible);
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
    $vehicule_disponible= find_bien_disponible_pa($start_from,$nbrPage);
  require_once(ROUTE_DIR.'views/client/liste.vehicule.html.php');  
}
function show_ajout_categorie($id_categorie=null){
  $categorie=find_categorie_by_id($id_categorie);
  require_once(ROUTE_DIR.'views/gestionnaire/ajout.categorie.html.php');
}
function show_ajout_marque($id_marque=null){
  $marque=find_marque_by_id($id_marque);
  require_once(ROUTE_DIR.'views/gestionnaire/ajout.marque.html.php');
}
function show_ajout_modele($id_modele=null){
  $modele=find_modele_by_id($id_modele);
  require_once(ROUTE_DIR.'views/gestionnaire/ajout.modele.html.php');
}
function show_ajout_option($id_option=null){
  $option=find_option_by_id($id_option);
  require_once(ROUTE_DIR.'views/gestionnaire/ajout.option.html.php');
}
function show_liste_conducteur_archiver(){
  $conductArchive=find_all_conducteur_archiver();
  require_once(ROUTE_DIR.'views/gestionnaire/liste.archives.html.php'); 
}

function liste_vehicule($get=null){
  if (isset($_POST['oui'])) {
   // die('hwhd');
    archive_vehicule(8,(int)$_POST['id_vehicule']);
  }
  
  $categories=find_all_categorie();
  $marques=find_all_marque();
  $modeles=find_all_modele();
  if (!isset($_POST['ok'])) {
   // die('geed');
    $nbrPage=2;
    $vehicule_disponible=find_bien_disponible();
    $total_records=count($vehicule_disponible);
    $total_page=total_page($total_records,$nbrPage);
    if (isset($get)) {
      $page=$get;
    }else {
      $page=1;
    }
    $suivant=$precedent=0;
    $suivant=$page+1;
    $precedent=$page-1;
    $start_from=start_from($page,$nbrPage);
    $vehicule_disponible= find_bien_disponible($start_from,$nbrPage);
  }else {
    if (isset($_POST['ok'])) {
     
      extract($_POST);
      $vehicule_disponible= find_all_vehicule_by_marque_modele_categorie($categorie,$marque,$modele);
      $nbrPage=2;
      $total_records=count($vehicule_disponible);
      $total_page=total_page($total_records,$nbrPage);
      if (isset($get)) {
        $page=$get;
      }else {
        $page=1;
      }
      $suivant=$precedent=0;
      $suivant=$page+1;
      $precedent=$page-1;
      $start_from=($page-1)*($nbrPage);
      $vehicule_disponible= find_all_vehicule_by_marque_modele_categorie_paginate($categorie,$marque,$modele,$start_from,$nbrPage);

    }
  }
  require_once(ROUTE_DIR.'views/gestionnaire/liste.vehicules.html.php');
 }

function show_ajout_voiture($nbre=1){
  $marques=find_all_marque();
  $modeles=find_all_modele();
  $options=find_all_option();
  $categories=find_all_categorie();
  $type_vehicule=find_all_type_vehicule();
  $model=find_all_modele_by_id((int)$_SESSION['post']['modele']);
  $marque=find_marque_by_id((int)$_SESSION['post']['marque']);
  $categorie=find_categorie_by_id((int)$_SESSION['post']['categorie']);
  $_SESSION['nbre_image']=$nbre;
  require_once(ROUTE_DIR.'views/gestionnaire/ajout.voiture.html.php');  
}
function show_ajout_camion($nbre=1){
  $marques=find_all_marque();
  $modeles=find_all_modele();
  $options=find_all_option();
  $categories=find_all_categorie();
  $type_vehicule=find_all_type_vehicule();
  $model=find_all_modele_by_id((int)$_SESSION['post1']['modele']);
  $marque=find_marque_by_id((int)$_SESSION['post1']['marque']);
  $categorie=find_categorie_by_id((int)$_SESSION['post1']['categorie']);
  $_SESSION['nbr_image']=$nbre;
  require_once(ROUTE_DIR.'views/gestionnaire/ajout.camion.html.php');  
}
function show_ajout_conducteur($get=null){
  $driver=find_conducteur_by_id($get);
  $_SESSION['drive']=$driver;
  $permis=find_all_type_permis();
  require_once(ROUTE_DIR.'views/gestionnaire/ajout.conducteur.html.php');  
}
function show_liste_categorie(){
  if (isset($_POST['archiver'])) {
    archive_categorie($_POST['id_categorie']);
  }
  $categories=find_all_categorie();
  $nbrPage=2;
  $total_records=count($categories);
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
  $categories=find_all_categorie($start_from,$nbrPage);
  require_once(ROUTE_DIR.'views/gestionnaire/liste.categorie.html.php'); 
}

function show_liste_marque(){
  $marques=find_all_marque();
  $nbrPage=2;
  $total_records=count($marques);
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
  $marques=find_all_marque($start_from,$nbrPage);
  require_once(ROUTE_DIR.'views/gestionnaire/liste.marque.html.php'); 
}
function show_liste_modele(){
  $modeles=find_all_modele();
  $nbrPage=2;
  $total_records=count($modeles);
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
  $modeles=find_all_modele($start_from,$nbrPage);
  require_once(ROUTE_DIR.'views/gestionnaire/liste.modele.html.php'); 
}
function show_liste_option(){
  $options=find_all_option();
  $nbrPage=2;
  $total_records=count($options);
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
  $options=find_all_option($start_from,$nbrPage);
  require_once(ROUTE_DIR.'views/gestionnaire/liste.option.html.php'); 
}
function show_liste_conducteur(){
  $conducteurs=find_all_conducteur();
  $nbrPage=2;
  $total_records=count($conducteurs);
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
  $conducteurs=find_all_conducteur_pagi($start_from,$nbrPage);
  require_once(ROUTE_DIR.'views/gestionnaire/liste.conducteur.html.php'); 
}
function show_liste_conducteur_ar($id_conducteur){
  
  $etat='archiver';
 archive_conducteur($etat,$id_conducteur);
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
          if (isset($data['id_categorie'])) {
            $categories=[
              $categorie,
              $prix_jour,
              $prix_kilometre,
              $caution,
              $data['id_categorie']
            ];
            update_categorie($categories);
          }else {
            insert_categorie($data);
          }
            header('location:'.WEB_ROUTE.'?controlleurs=vehicule&views=liste.categorie');
            exit;
        }else {
          if (isset($data['id_categorie'])) {
            $_SESSION['arrayError']=$arrayError;
              header('location:'.WEB_ROUTE.'?controlleurs=vehicule&views=ajout.categorie&id_categorie='.$data['id_categorie']);
              exit;
          }else {
              $_SESSION['arrayError']=$arrayError;
              header('location:'.WEB_ROUTE.'?controlleurs=vehicule&views=ajout.categorie');
              exit;
          }
         
        }
    }
    function add_marque(array $data):void{
      $arrayError=[];
      extract($data);
      valide_nom_marque($marque,'marque',$arrayError);
      if (form_valid($arrayError)) {
        if (isset($data['id_marque'])) {
        
            $marquess=[
              $marque,
             (int)$data['id_marque']
            ];
            update_marque($marquess);
        }else {
          insert_marque($marque);
        }
          
          header('location:'.WEB_ROUTE.'?controlleurs=vehicule&views=liste.marque');
          exit;
      }else {
        if (isset($data['id_marque'])) {
          $_SESSION['arrayError']=$arrayError;
          header('location:'.WEB_ROUTE.'?controlleurs=vehicule&views=ajout.marque&id_marque='.$data['id_marque']);
          exit;
        }else {
            $_SESSION['arrayError']=$arrayError;
        header('location:'.WEB_ROUTE.'?controlleurs=vehicule&views=ajout.marque');
        exit;
        }
      
      }
    }
    function add_modele(array $data):void{
      $arrayError=[];
      extract($data);
      valide_nom_marque($modele,'modele',$arrayError);
      if (form_valid($arrayError)) {
        if (isset($data['id_modele'])) {
        
          $modeles=[
            $modele,
           (int)$data['id_modele']
          ];
        
          update_modele($modeles);
      }else {
       insert_modele($modele);
      }
          
          header('location:'.WEB_ROUTE.'?controlleurs=vehicule&views=liste.modele');
          exit;
      }else {
        if (isset($data['id_marque'])) {
          $_SESSION['arrayError']=$arrayError;
          header('location:'.WEB_ROUTE.'?controlleurs=vehicule&views=ajout.modele&id_modele='.$data['id_modele']);
          exit;
        }else {
           $_SESSION['arrayError']=$arrayError;
        header('location:'.WEB_ROUTE.'?controlleurs=vehicule&views=ajout.modele');
        exit;
        }
       
      }
    }

    function add_option(array $data):void{
      $arrayError=[];
      extract($data);
      valide_nom_marque($option,'option',$arrayError);
      if (form_valid($arrayError)) {
        if (isset($data['id_option_vehicule'])) {
            $options=[
              $option,
              (int)$data['id_option_vehicule']
            ];
            update_option($options);
        }else {
          insert_option($option);
        }
          
          header('location:'.WEB_ROUTE.'?controlleurs=vehicule&views=liste.option');
          exit;
      }else {
        if (isset($data['id_option_vehicule'])) {
          $_SESSION['arrayError']=$arrayError;
          header('location:'.WEB_ROUTE.'?controlleurs=vehicule&views=ajout.option&id_option_vehicule='.$data['id_option_vehicule']);
          exit;
        }else {
           $_SESSION['arrayError']=$arrayError;
        header('location:'.WEB_ROUTE.'?controlleurs=vehicule&views=ajout.option');
        exit;
        }
       
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
     
        if (isset($data['id'])) {
        /*   var_dump($data['id']);
          die; */
          $adresse=[
            (int)$rue,
             $ville,
             $pays,
            (int)$code_postal,
            $data['id_adresse']
          ];
       
       $id_adresse= update_adresse($adresse);
          $conducteurs=[
            $nom,
            $prenom,
            $telephone,
            $permis,
            $data['id']
          ];
          update_conducteur($conducteurs);
        }else {
          
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
            $permis,
            'normal'
          ];
          insert_conducteur($conducteurs);
        
        }
        header("location:".'?controlleurs=vehicule&views=liste.conducteur');
        exit;
      }else {
        if (!isset($data['id'])) {
             $_SESSION['arrayError'] = $arrayError;
             header("location:".'?controlleurs=vehicule&views=ajout.conducteur');
            exit;
        }else {
          $_SESSION['arrayError'] = $arrayError;
          header("location:".'?controlleurs=vehicule&views=edit.conducteur&id_conducteur='.$data['id']);
          exit;
        }

      }
    }

    function add_voiture(array $post,array $files):void{
      $arrayError=[];
      extract($post);
      validefield1($kmt,'kmt',$arrayError);
     // valide_prix_categorie($nbre_image,'nbre_image',$arrayError);
      //valide_image($files,'avatar[]',$arrayError,UPLOAD_DIR);
      if (form_valid($arrayError)) {
       
        $vehicules=[
          genere_reference(),
          genere_matriculation(),
          $kmt,
          $categorie,
          $modele,
          $marque,
          2,
          6
        ];
        $id_vehicule= insert_voiture_vehicule($vehicules); 
      
        foreach ($files["avatar"]["tmp_name"] as $key => $value ) {
          $file_name=$files["avatar"]["name"][$key];
          $file_name_tmp=$files["avatar"]["tmp_name"][$key];
         $ext=pathinfo($file_name,PATHINFO_EXTENSION);
          if (file_exists(UPLOAD_DIR .$file_name)) {
            move_uploaded_file($file_name_tmp, UPLOAD_DIR.$file_name);
          }else {
            $file_name=str_replace('.','-',basename($file_name,$ext));
            $newfilename=$file_name.time().".".$ext;
            move_uploaded_file($file_name_tmp, UPLOAD_DIR.$newfilename);
          }
        }
        foreach ($files['avatar']['name'] as $file) {
          $image=[
             $file,
             $id_vehicule
          ];
         
          insert_image($image);
        }
       
    
        foreach ($options as $opv) {
          $option=[
             $opv,
             $id_vehicule
          ];
          insert_vehicule_option($option);
        }
        header("location:".'?controlleurs=vehicule&views=liste.vehicules');
        exit;
      }else {
        $_SESSION['arrayError'] = $arrayError;
        header("location:".'?controlleurs=vehicule&views=ajout.voiture');
        exit;
      }
    }

    function add_camion(array $post,array $files):void{
      $arrayError=[];
      extract($post);
   //   validefield1($kmt,'kmt',$arrayError);
     // valide_prix_categorie($nbre_image,'nbre_image',$arrayError);
      //valide_image($files,'avatar[]',$arrayError,UPLOAD_DIR);
      if (form_valid($arrayError)) {
       
        $vehicules=[
          genere_reference(),
          genere_matriculation(),
          $kmt,
          $volume,
          $charge,
          $longueur,
          $largeur,
          $hauteur,
          $categorie,
          $modele,
          $marque,
          1,
          6
        ];
        $id_vehicule= insert_camion_vehicule($vehicules); 
      
        foreach ($files["avatar"]["tmp_name"] as $key => $value ) {
          $file_name=$files["avatar"]["name"][$key];
          $file_name_tmp=$files["avatar"]["tmp_name"][$key];
         $ext=pathinfo($file_name,PATHINFO_EXTENSION);
          if (!file_exists(UPLOAD_DIR .$file_name)) {
            move_uploaded_file($file_name_tmp, UPLOAD_DIR.$file_name);
          }
        }
        foreach ($files['avatar']['name'] as $file) {
          $image=[
             $file,
             $id_vehicule
          ];
         
          insert_image($image);
        }
       
    
        foreach ($options as $opv) {
          $option=[
             $opv,
             $id_vehicule
          ];
          insert_vehicule_option($option);
        }
        header("location:".'?controlleurs=vehicule&views=liste.vehicules');
        exit;
      }else {
        $_SESSION['arrayError'] = $arrayError;
        header("location:".'?controlleurs=vehicule&views=ajout.voiture');
        exit;
      }
    }


?>