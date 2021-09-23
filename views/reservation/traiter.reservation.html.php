<?php  require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>
<div class="container  reserv">
    <form action="" method="post">
    <div class="row ">
        <div class="col-md-6">
            <h4 class="text-warning">Informations Reservation</h4>
             
        </div>
        <div class="col-md-6 border ">
            <div class="container ">
            <div class="row">
                <h4 class="text-warning">
                    Liste des conducteurs
                </h4>
            </div>

            <?php foreach($conducteurs as $conducteur): ?>

                <div class="form-check">
                    <label class="form-check-label text-white">
                    <input type="radio" <?=$reservation['id_type_vehicule']==2 ? 'disabled' : ""?> class="form-check-input" name="radio" id="" value="" >
                   <?=$conducteur['nom_conducteur'].' '.$conducteur['prenom_conducteur']?>
                  </label>
                </div>
            <?php endforeach ?>
            </div>
        </div>
        
]    </div>
                <div class="row">
                    <button type="submit" name="valider" class="btn btn-warning ml-auto mr-auto w-50">Valider</button>
                </div>
    </form>
</div>
<?php  require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
