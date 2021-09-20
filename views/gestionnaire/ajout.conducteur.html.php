<?php    
 if (isset($_SESSION['arrayError'])) {
    $arrayError=$_SESSION['arrayError'];
    unset($_SESSION['arrayError']);
  }
require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>
<div class="container">
          <form action="" method="post">
              <input type="hidden" name="controlleurs" value="vehicule">
              <input type="hidden" name="action" value="add.conducteur">
            <div class="card text-left group shadow mb-4">
                <img class="card-img-top" src="holder.js/100px180/" alt="">
                <div class="card-body">
                    <div class="row jjjj">
                        <div class="col-md-12">
                            <h3 class="section-title font-weight-light text-white mb-4">
                                <span class="headline">Ajouter Conducteur</span>
                            </h3 >
                        </div>
                    </div>
                    <?php if(isset($arrayError['loginExist'])): ?>
                       <!--  <div class="alert alert-danger" role="alert">
                            <?=$arrayError['loginExist']?>
                        </div> -->
                    <?php endif ?>
                    <div class="row">                     
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label for="" class="text-warning">Prenom</label>
                                    <input type="text"
                                        class="form-control" name="prenom" id="" aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-danger">
                                        <?= isset($arrayError['prenom']) ? $arrayError['prenom'] :"" ?>
                                    </small>
                             </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label for="" class="text-warning">Nom</label>
                                    <input type="text"
                                        class="form-control" name="nom" id="" aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-danger">
                                    <?= isset($arrayError['nom']) ? $arrayError['nom'] :"" ?>
                                    </small>
                             </div>
                        </div>
                     </div>
                     <div class="row">                        
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label for="" class="text-warning">Telephone</label>
                                    <input type="text"
                                        class="form-control" name="telephone" id="" aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-danger">
                                    <?= isset($arrayError['numero']) ? $arrayError['numero'] :"" ?>
                                    </small>
                             </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                             <label for="" class="text-warning">Type de Permis</label>
                             <select class="form-control bg" name="permis" id="">
                                <?php foreach($permis as $permi): ?>
                               <option value="<?=$permi['id_permis']?>"><?=$permi['type_permis']?></option>
                              <?php endforeach ?>
                             </select>
                           </div>
                        </div>
                        
                     </div>
                  
                     <div class="row">
                     <div class="col-md-3">
                             <div class="form-group">
                               <label for="" class="text-warning">Pays</label>
                               <input type="text"
                                 class="form-control" name="pays" id="" aria-describedby="helpId" placeholder="">
                               <small id="helpId" class="form-text text-danger">
                               <?= isset($arrayError['pays']) ? $arrayError['pays'] :"" ?>
                               </small>
                             </div>
                         </div>
                         <div class="col-md-3">
                             <div class="form-group">
                               <label for="" class="text-warning">Ville</label>
                               <input type="text"
                                 class="form-control" name="ville" id="" aria-describedby="helpId" placeholder="">
                               <small id="helpId" class="form-text text-danger">
                               <?= isset($arrayError['ville']) ? $arrayError['ville'] :"" ?>
                               </small>
                             </div>
                         </div>
                         <div class="col-md-3">
                             <div class="form-group">
                               <label for="" class="text-warning">Rue</label>
                               <input type="text"
                                 class="form-control" name="rue" id="" aria-describedby="helpId" placeholder="">
                               <small id="helpId" class="form-text text-danger">
                               <?= isset($arrayError['rue']) ? $arrayError['rue'] :"" ?>
                               </small>
                             </div>
                         </div>
                         
                         <div class="col-md-3">
                             <div class="form-group">
                               <label for="" class="text-warning">Code Postal</label>
                               <input type="text"
                                 class="form-control" name="code_postal" id="" aria-describedby="helpId" placeholder="">
                               <small id="helpId" class="form-text text-danger">
                               <?= isset($arrayError['code_postal']) ? $arrayError['code_postal'] :"" ?>
                               </small>
                             </div>
                         </div>
                     </div>
                       <div class="row">
                         <div class="col-md-6">
                            <button type="submit" name="add.conducteur" class="btn btn-warning"> S'inscrire</button>
                         </div>
                         <div class="col-md-6">
                           <a name="" id="" class=" text-primary " href="#" >Se connecter en tant que client !!</a>
                         </div>
                     </div>
                </div>
                
            </div>
          </form>
</div>
<style>
    .group{
        margin-top: 21%;
        background-color: #000;
        box-shadow: #ddd;
    }
    input[type=text]{
        background: grey;
    }
    input[type=date]{
        background: grey;
    }
    .bg{
        background: grey;
    }
    .jjj{
        margin-top: -6%;
    }
    .section-title::after {
    content: ' ';
    position: absolute;
    display: block;
    width: 70px;
    border: 1px solid #d2b100;
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
    -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
    
}
.section-title{
    font-size: 20px;
}
</style>
<?php  require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
