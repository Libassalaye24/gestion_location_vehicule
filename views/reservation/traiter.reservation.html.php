<?php /*  var_dump($vehicule);
die; */
 require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>
<div class="container  reserv">
        <div class="card bg">
            <div class="card-body ">
                <div class="row">
                    <div class="col">
                    <h5 class="text-warning">Les donnees de reservation</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card ">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                        <p>Type Vehicule : <?=$reservation[0]['nom_type_vehicule']?></p>
                                        </div>
                                        <div class="col-md-4">
                                        <p>Vehicule : <?=$reservation[0]['nom_marque'].' '.$reservation[0]['nom_modele']?></p>
                                        </div>
                                        <div class="col-md-4">
                                        <p>Prix location jour : <?=$reservation[0]['prix_location_jour'].' '.'FCFA'?></p>
                                        </div>
                                        <?php
                                         $date1=date_create($reservation[0]['date_fin_location']);
                                         $date2=date_create($reservation[0]['date_debut_location']);
                                         $jr= difference_date($date1,$date2);
                                         $prix = intval($jr)*intval($reservation[0]['prix_location_jour']);
                                         ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>Caution : <?=$reservation[0]['caution'].' '.'FCFA'?></p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Nbrs jours : <?= $jr ?></p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Prix total : <?= $prix.' '.'FCFA' ?></p>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
<form action="" method="post">
    <input type="hidden" name="controlleurs" value="reservation">
    <input type="hidden" name="action" value="traiter.reservation">
    <input type="hidden" name="id_vehicule" value="<?=$vehicule[0]['id_vehicule']?>">
    <input type="hidden" name="caution" value="<?=$reservation[0]['caution']?>">
    <div class="row mt-2">
        <div class="col-md-6">
            <h5 class="text-warning">Vehicule Disponible</h5>
            <div class="row">
            </div>
                <?php foreach($vehicule as $vhl): ?> 
                   <div class="card w-75 ">
                       <div class="card-body">
                       <div class="form-check">
                    <label class="form-check-label mt">
                    <input type="radio" class="form-check-input" name="vehicule" id="" value="<?=$vhl['id_vehicule']?>" >
                   <?=$vhl['nom_categorie'].' '.$vhl['nom_marque'].' '.$vhl['nom_modele'].' '.$vhl['immatriculation_vehicule']?>
                  </label>
                </div>
                       </div>
                   </div><br>
                <?php  endforeach ?> 
            
        </div>
        <div class="col-md-6  ">
            <div class="container ">
            <div class="row">
                <h5 class="text-warning ml-3">
                    Liste des conducteurs
                </h5>
            </div>

            <?php foreach($conducteurs as $conducteur): ?>

               <div class="card w-75 ">
                   <div class="card-body">
                        <div class="form-check">
                            <label class="form-check-label t">
                             <input type="radio" <?=($reservation[0]['id_type_vehicule']==2 && !isset($_SESSION['chauffeur'])) ? 'disabled' : ""?> class="form-check-input" name="conducteur" id="" value="<?=$conducteur['id_conducteur']?>" >
                             <i class="fa fa-user" aria-hidden="true"></i> <?=$conducteur['nom_conducteur'].' '.$conducteur['prenom_conducteur']?>
                            </label>
                        </div>
                   </div>
               </div><br>
            <?php 
            endforeach ?>
            </div>
        </div>
        
          </div>
                <div class="row">
                  <!--   <div class="col-md-6"> -->
                    <button type="submit" name="annuler" class="btn h-25  btn-warning mr-auto ml-3  ">Annuler</button>                 <!--    </div> -->
                    <button type="submit" name="traiter" class="btn h-25  btn-warning ml-auto  ">Valider</button>
                </div>
    </form>
            </div>
        </div>
</div>
<style>
   .bg{
       background-color: #000;
   }
   
</style>
<?php  require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
