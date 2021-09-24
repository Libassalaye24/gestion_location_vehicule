<?php /*  var_dump($vehicule);
die; */
 require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>
<div class="container  reserv">
        <div class="card">
            <div class="card-body bg">
                <div class="row">
                    <div class="col">
                    <h4 class="text-warning">Les donnees de reservation</h4>
                    </div>
                   
                </div>
<form action="" method="post">
    <div class="row ">
        <div class="col-md-6">
            <h4 class="text-warning">Vehicule Disponible</h4>
            <div class="row">
            </div>
                <?php foreach($vehicule as $vhl): ?> 
                   <div class="card w-75 ">
                       <div class="card-body">
                       <div class="form-check">
                    <label class="form-check-label mt">
                    <input type="radio" class="form-check-input" name="jj" id="" value="" >
                   <?=$vhl['nom_categorie'].' '.$vhl['nom_marque'].' '.$vhl['nom_modele']?>
                  </label>
                </div>
                       </div>
                   </div><br>
                <?php  endforeach ?> 
            
        </div>
        <div class="col-md-6  ">
            <div class="container ">
            <div class="row">
                <h4 class="text-warning ml-2">
                    Liste des conducteurs
                </h4>
            </div>

            <?php foreach($conducteurs as $conducteur): ?>

               <div class="card w-75 ">
                   <div class="card-body">
                        <div class="form-check">
                            <label class="form-check-label t">
                             <input type="radio" <?=$reservation[0]['id_type_vehicule']==2 ? 'disabled' : ""?> class="form-check-input" name="radio" id="" value="" >
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
                    <button type="submit" name="valider" class="btn mt-2 btn-warning ml-auto mr-auto w-50">Valider</button>
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
