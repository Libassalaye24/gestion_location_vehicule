<?php 
   if (isset($_SESSION['arrayError'])) {
    $arrayError=$_SESSION['arrayError'];
    unset($_SESSION['arrayError']);
  }
  /* var_dump($categorie[0]['id_categorie']);
  die; */
 require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>
<div class="container">
    <div class="row jjj">
        <a class="ml-2" style="color: #d2b100;" href="<?=WEB_ROUTE.'?controlleurs=reservation&views=liste.reservations'?>"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
         <div class="col-md-12">
            <h3 class="section-title font-weight-light text-white mb-4">
                <span class="headline"> Gerer retour vehicule </span>
            </h3 >
         </div>
    </div>
    
 <div class="mt-1">
    <form action="" method="post">
                <input type="hidden" name="controlleurs" value="reservation">
                <input type="hidden" name="action" value="gerer.retour">
                   
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="text-warning">Nbrs jours de location</label>
                                <input type="text" name="nbrsJour" id="" class="form-control" placeholder="" value="<?=isset($categorie[0]['prix_location_jour']) ? $categorie[0]['prix_location_jour'] : "" ?>" aria-describedby="helpId">
                                <small id="helpId" class="text-danger">
                                <?=isset($arrayError['nbrsJour']) ? $arrayError['nbrsJour'] : '';?>
                                </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="text-warning">Kilometre Parcourus</label>
                                <input type="text" name="kilometre" id="" value="<?=isset($categorie[0]['prix_location_km']) ? $categorie[0]['prix_location_km'] : "" ?>" class="form-control" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-danger">
                                <?=isset($arrayError['kilometre']) ? $arrayError['kilometre'] : '';?>
                                </small>
                            </div>
                        </div>
                    </div>
            <div class="row  ml-1">
                <button type="submit" class="btn btn-warning" name="add.retour"><?=isset($categorie[0]['id_categorie']) ? 'Modifier' : "Ajouter" ?></button>
            </div>
        </form>
 
    </div>

 
</div>
<style>
     .jjj{
        margin-top: 20%;
    }
    .section-title::after {
    content: ' ';
    position: absolute;
    display: block;
    width: 40px;
    border: 1px solid #d2b100;
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
    -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
    
}
.mt{
    margin-top: 3%;
}
.section-title{
    font-size: 20px;
}
input[type=text]{
    background-color: grey;
}
/* .pagination > li > a
{
    background-color: white;
    color: #5A4181;
} */



</style>

<?php  require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
