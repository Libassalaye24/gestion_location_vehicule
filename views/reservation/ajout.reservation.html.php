<?php  
if (isset($_SESSION['arrayError'])) {
    $arrayError=$_SESSION['arrayError'];
    unset($_SESSION['arrayError']);
}

require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>
<div class="container">
          <form action="" method="post">
              <input type="hidden" name="controlleurs" value="reservation">
              <input type="hidden" name="id_vehicule" value="<?=isset($vehicule[0]['id_vehicule'])?$vehicule[0]['id_vehicule']:""?>">
              <input type="hidden" name="action" value="add.reservation">
            <div class="card text-left group shadow mb-4">
                <img class="card-img-top" src="holder.js/100px180/" alt="">
                <div class="card-body">
                
                    <div class="row jjj">
                        <div class="col-md-12">
                            <h3 class="section-title font-weight-light text-white mb-4">
                                <span class="headline">Saisir les donnees de la reservation</span>
                            </h3 >
                        </div>
                    </div>
                     <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="text-warning">Date debut</label>
                                <input type="date" name="date_debut" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-danger">
                                <?= isset($arrayError['date_debut']) ? $arrayError['date_debut'] :"" ?>
                                </small>
                            </div>
                         </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="text-warning">Date fin</label>
                                <input type="date" name="date_fin" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-danger">
                                <?= isset($arrayError['date_fin']) ? $arrayError['date_fin'] :"" ?>
                                </small>
                            </div>
                         </div>
                         <!-- <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="text-warning">Duree</label>
                                <input type="text" name="duree" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-danger"></small>
                            </div>
                         </div> -->
                         
                     </div>
                     <div class="row">
                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="" class="text-warning">Marque</label>
                               <input type="text" name="marque" value="<?=$vehicule[0]['nom_marque']?>" id="" class="form-control bg" disabled  placeholder="" aria-describedby="helpId">
                               <small id="helpId" class="text-danger"></small>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="" class="text-warning">Modele</label>
                               <input type="text" name="modele" id="" class="form-control bg" value="<?=$vehicule[0]['nom_modele']?>" disabled placeholder="" aria-describedby="helpId">
                               <small id="helpId" class="text-danger">
                                    
                               </small>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="" class="text-warning">Categorie</label>
                               <input type="text" name="categorie" id="" class="form-control" value="<?=$vehicule[0]['nom_categorie']?>" disabled placeholder="" aria-describedby="helpId">
                               <small id="helpId" class="text-danger"></small>
                             </div>
                         </div>
                     </div>
                     <div class="row ">
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label text-warning">
                                    Options
                                </label>
                            </div>
                        </div>
                    <?php foreach($options as $option): ?>
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label text-warning">
                                        <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" checked> <?=$option['nom_option_vehicule']?>
                                </label>
                            </div>
                        </div>
                     <?php endforeach ?>   
                     </div>
                     <?php if($vehicule[0]['id_type_vehicule']==1): ?>
                     <div class="row">
                            <div class="form-check form-check-inline ml-3">
                                <label class="form-check-label text-white">
                                    <input class="form-check-input" type="checkbox" class="" name="chauffeur" id="" value="checkedValue">  Si un chauffeur est necessaire cochez!
                                </label>
                            </div>                  
                     </div>
                     <?php endif ?>
                                       
                     <?php if(!est_connect() ): ?>
                    <div class="row jjjj">
                        <div class="col-md-12">
                            <h3 class="section-title font-weight-light text-white mb-4">
                                <span class="headline">Saisir vos coordonees</span>
                            </h3 >
                        </div>
                    </div>
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
                                    <label for="" class="text-warning">Email</label>
                                    <input type="text"
                                        class="form-control" name="login" id="" aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-danger">
                                    <?= isset($arrayError['login']) ? $arrayError['login'] :"" ?>
                                    <?= isset($arrayError['loginExist']) ? $arrayError['loginExist'] :"" ?>
                                    </small>
                             </div>
                        </div>
                     </div>
                     <div class="row">                        
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label for="" class="text-warning">Password</label>
                                    <input type="text"
                                        class="form-control" name="password" id="" aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-danger">
                                    <?= isset($arrayError['password']) ? $arrayError['password'] :"" ?>
                                    </small>
                             </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label for="" class="text-warning">Confirm Password</label>
                                    <input type="text"
                                        class="form-control" name="confirm_password" id="" aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-danger">
                                    <?= isset($arrayError['confirm']) ? $arrayError['confirm'] :"" ?>
                                    </small>
                             </div>
                        </div>
                       
                     </div>
                     <div class="row">
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
                               <?= isset($arrayError['ville']) ? $arrayError['ville'] :"" ?>
                               </small>
                             </div>
                         </div>
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
                            <button type="submit" name="inscription" class="btn btn-warning"> S'inscrire</button>
                         </div>
                         <div class="col-md-6">
                           <a name="" id="" class=" text-primary " href="#" >Se connecter en tant que client !!</a>
                         </div>
                     </div>
                     <?php else:?>
                     <div class="row mt-2">
                         <div class="col-md-6">
                            <button type="submit" name="reserver" class="btn btn-warning">Reserver</button>
                         </div>
                       
                     </div>
                     <?php endif ?>
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
