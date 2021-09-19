<?php 
   if (isset($_SESSION['arrayError'])) {
    $arrayError=$_SESSION['arrayError'];
    unset($_SESSION['arrayError']);
  }
 require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>
<div class="container">
    <div class="row jjj">
         <div class="col-md-12">
            <h3 class="section-title font-weight-light text-white mb-4">
                <span class="headline">Parametrage Categorie </span>
            </h3 >
         </div>
    </div>
    <div class="row">
         <button type="button" class="btn btn-warning ml-auto mr-auto" data-toggle="modal" data-target="#exampleModalLong">
         <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
            </svg> Ajouter categorie
        </button>

        <!-- Modal -->
        <div class="modal fade " id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Formulaire d'ajout modele</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <input type="hidden" name="controlleurs" value="vehicule">
                <input type="hidden" name="action" value="add.categorie">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nom categorie</label>
                                <input type="text" name="categorie" id="" class="form-control" placeholder="enter le modele" aria-describedby="helpId">
                                <small id="helpId" class="text-muted">
                                    <?=isset($arrayError['categorie']) ? $arrayError['categorie'] : '';?>
                                </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Caution categorie</label>
                                <input type="text" name="caution" id="" class="form-control" placeholder="enter le modele" aria-describedby="helpId">
                                <small id="helpId" class="text-muted">
                                <?=isset($arrayError['caution']) ? $arrayError['caution'] : '';?>
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">prix_location_jour</label>
                                <input type="text" name="prix_jour" id="" class="form-control" placeholder="enter le modele" aria-describedby="helpId">
                                <small id="helpId" class="text-muted">
                                <?=isset($arrayError['prix_jour']) ? $arrayError['prix_jour'] : '';?>
                                </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">prix_location_kilometre</label>
                                <input type="text" name="prix_kilometre" id="" class="form-control" placeholder="enter le modele" aria-describedby="helpId">
                                <small id="helpId" class="text-muted">
                                <?=isset($arrayError['prix_km']) ? $arrayError['prix_km'] : '';?>
                                </small>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning" name="ajout.categorie">Ajouter</button>
            </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    <div class="row mt-5">
         <table class="table border bordered w-75 ml-auto mr-auto ">
            <thead>
                <tr>
                <th scope="col" class="text-warning">Nom Categorie</th>
                <th scope="col" class="text-warning">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($categories as $categorie): ?>
                <tr>
                <td class="text-white"><?=$categorie['nom_categorie']?></td>
                <td class="text-white">
                    <a name="" id="" class="btn border-secondary text-secondary " href="#" role="button">Archiver</a>
                    <a name="" id="" class="btn border-warning text-warning" href="#" role="button">Modifier</a>
                </td>
                </tr>
                <?php endforeach ?>
               
            </tbody>
            </table>
    </div>
    
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                 <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                 <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
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
</style>
<script>
    
</script>
<?php  require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
