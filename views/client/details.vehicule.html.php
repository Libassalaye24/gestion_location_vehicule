<?php
         require(ROUTE_DIR.'views/imc/header.html.php');
       ?>

   
    <div class="container">
        <div class="row mt ">
            <a href="<?=WEB_ROUTE?>" class="ml-3"><i class="fa fa-arrow-circle-left" style="color: yellow;" aria-hidden="true"></i></a>
            <h5 class="display-6 text-white ml-3 ml-auto mr-auto text-warning">Détails Vehicule</h5>
        </div>
      <div class="row"> 
        <div class="col-sm-8 mb-4">
        <div id="carouselId" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php $i=0; foreach($images as $image): ?>
                    <li data-target="#carouselId" data-slide-to="<?=$i?>" class="active"></li>
                <?php $i++;
                endforeach ?>
            </ol>
            <style>
                .carousel{
                    width: 100%;
                }
            </style>
            <div class="carousel-inner" role="listbox">
            <?php 
                   foreach($images as $image): ?>
                    <div class="carousel-item active">
                         <img class=" w-100" src="<?=WEB_ROUTE.'img/uploads/vehicule/'.$image['nom_image']?>" >
                     </div>
                    <?php endforeach ?>
               
               
            </div>
            <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        </div>
   
        <!-- -------------------------------------------- -->
        <div class="col">
          <div class="card text" style="width: 18rem">
            <div class="card-body">
              <h5 class="card-title">Type vehicule : <?=$vehicule[0]['nom_type_vehicule']?></h5>
              <p class="card-text">
                  Categorie : <?=$vehicule[0]['nom_categorie']?>
              </p>
              <p class="card-text">
                   Marque : <?=$vehicule[0]['nom_marque']?>
              </p>
              <p class="card-text">
                  Modele : <?=$vehicule[0]['nom_modele']?>
              </p>
              <p class="card-text">
                  Prix location Jour : <?=$vehicule[0]['prix_location_jour'].' '.'FCFA'?>
              </p>
              <p class="card-text">
                  Prix location Kilometre : <?=$vehicule[0]['prix_location_km'].' '.'FCFA'?>
              </p>
              <p class="card-text">
                  Caution : <?=$vehicule[0]['caution'].' '.'FCFA'?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <style>
        .mt{
            margin-top: 22%;
        }
    </style>
    <?php
         require(ROUTE_DIR.'views/imc/footer.html.php');
       ?>