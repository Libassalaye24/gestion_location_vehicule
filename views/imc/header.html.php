<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  </head>
  <body>
      
  
<nav class="navbar navbar-expand-lg navbar-dark ">
      <!-- <a class="navbar-brand" href="#">E-221</a> -->
      <a href=""><img src="https://mapauto.sn/img/logo-avec-slogan2.webp" alt="" class="ml-5"></a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarColor01"
        aria-controls="navbarColor01"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse ml-5" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?= WEB_ROUTE.'?controlleurs=vehicule&views=liste.vehicule'?>"
              >Accueil
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <?php if(est_client()): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?=WEB_ROUTE.'?controlleurs=reservation&views=mes.reservations'?>">Mes Réservations</a>
            </li>
          <?php endif ?>
          <?php if(est_gestionnaire()): ?>
          <ul class="navbar-nav mr-o ml-2">
           <li class="nav-item">
              <a class="nav-link" href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=ajout.vehicule'?>">Vehicule</a>
            </li>
          </ul>
        <ul class="navbar-nav mr-o mr-4">
            <li class="nav-item dropdown mr-md-5">
              <a
                class="nav-link dropdown-toggle"
                data-toggle="dropdown"
                href="#"
                role="button"
                aria-haspopup="true"
                aria-expanded="false"
                >Parametrage</a
              >
                <div class="dropdown-menu ">
                  <a class="dropdown-item" href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=liste.conducteur'?>">Conducteur</a>
                <a class="dropdown-item"   href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=liste.categorie'?>">Categorie</a>
                  <a class="dropdown-item" href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=liste.marque'?>">Marque</a>
                  <a class="dropdown-item" href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=liste.modele'?>">Modele</a>
                  <a class="dropdown-item" href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=liste.option'?>">Option</a>
                </div>
            
            </li>
          </ul>
          <?php endif ?>
          <?php if(est_responsable()): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?=WEB_ROUTE.'?controlleurs=reservation&views=liste.reservation'?>">Liste Reservations</a>
            </li>
          <?php endif ?>
          <!--   <li class="nav-item">
              <a class="nav-link" href="<?=WEB_ROUTE.'?controlleurs=bien&views=liste.bien'?>">Biens</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=WEB_ROUTE.'?controlleurs=bien&views=creer.bien'?>">Crer un bien</a>
            </li> -->
        </ul>
       
        <ul class="navbar-nav mr-o mr-4">
            
            <li class="nav-item dropdown mr-md-5">
              <a
                class="nav-link dropdown-toggle"
                data-toggle="dropdown"
                href="#"
                role="button"
                aria-haspopup="true"
                aria-expanded="false"
                ><i class="fas fa-user">Utilisateur</i></a
              >
              <?php if(!est_connect()): ?>
                <div class="dropdown-menu ">
                <a class="dropdown-item" href="<?=WEB_ROUTE.'?controlleurs=security&views=connexion'?>"> Se Connecter</a>
                </div>
                <?php elseif(est_connect()): ?>
                <div class="dropdown-menu ">
                  <a class="dropdown-item" href="<?=WEB_ROUTE.'?controlleurs=security&views=deconnexion'?>"> Se Deconnecter</a>
                </div>
                <?php endif ?>
            </li>
          </ul>
      </div>
    </nav>
    <style>
        .navbar{
            background-image: url("https://mapauto.sn/img/desktop_navbar_bg.jpg");
            position: fixed;
            top: 0;
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1039;
        }
  

        .navbar a{
            color: #d2b100 !important;
        }
        body{
            background: #000;
        }
    </style>

    
  