<?php 
    if (isset($_SESSION['arrayError'])) {
        $arrayError=$_SESSION['arrayError'];
        unset($_SESSION['arrayError']);
    }
  require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>
<div class="container">
          <form action="" method="post" enctype="multipart/form-data">
              <input type="hidden" name="controlleurs" value="vehicule">
              <input type="hidden" name="action" value="add.camion">
            <div class="card text-left group shadow mb-4">
                <div class="card-body">
                     <div class="row jjj">
                        <div class="col-md-12">
                            <h3 class="section-title font-weight-light text-white mb-4">
                                <span class="headline">Ajout Camion</span>
                            </h3 >
                        </div>
                    </div>
                   
                    
                     <div class="row mt-2">                        
                        <div class="col-md-4">
                            <div class="form-group ">
                              <label for="" class="text-warning">Categorie</label>
                              <select class="form-control  bg-secondary" name="categorie" id="">
                              <option value="<?=isset($_SESSION['post1']['categorie']) ? $_SESSION['post1']['categorie'] : "0"?>"><?=$categorie[0]['nom_categorie']?></option>
                              <?php foreach($categories as $categorie): ?>
                                 <option value="<?=$categorie['id_categorie']?>"><?=$categorie['nom_categorie']?></option>
                                <?php endforeach ?>
                              </select>
                              <small class="text-danger">
                                  <?=$arrayError['o'] ? $arrayError['o'] : "" ?>
                              </small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group  ">
                              <label for="" class="text-warning ">Marque</label>
                              <select class="form-control  bg-secondary" name="marque" id="">
                                  <option value="<?=isset($_SESSION['post1']['marque']) ? $_SESSION['post1']['marque'] : "0"?>"><?=$marque[0]['nom_marque']?></option>
                               <?php foreach($marques as $marque): ?>
                                    <option value="<?=$marque['id_marque']?>"><?=$marque['nom_marque']?></option>
                                  <?php endforeach ?>
                              </select>
                              <small class="text-danger">
                                  <?=$arrayError['a'] ? $arrayError['a'] : "" ?>
                              </small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group  ">
                              <label for="" class="text-warning">Modele</label>
                              <select class="form-control  bg-secondary" name="modele" id="">
                                <option value="<?=isset($_SESSION['post1']['modele']) ? $_SESSION['post1']['modele'] : "0"?>"><?=$model[0]['nom_modele']?></option>
                              <?php foreach($modeles as $modele): ?>
                                 <option value="<?=$modele['id_modele']?>"><?=$modele['nom_modele']?></option>
                                <?php endforeach ?>
                              </select>
                              <small class="text-danger">
                                  <?=$arrayError['m'] ? $arrayError['m'] : "" ?>
                              </small>
                            </div>
                        </div>
                    
                     </div>
                     
                     <div class="row">
                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="" class="text-warning">Kilometrage</label>
                               <input type="text" name="kmt" id="" value="<?=isset($_SESSION['post1']['kmt']) ? $_SESSION['post1']['kmt'] : ""?>" class="bg-secondary form-control" placeholder="" aria-describedby="helpId">
                               <small id="helpId" class="text-danger">
                               <?=$arrayError['kmt'] ? $arrayError['kmt'] : "" ?>
                               </small>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="" class="text-warning">Charger Max</label>
                               <input type="text" name="charge" id=""  value="<?=isset($_SESSION['post1']['charge']) ? $_SESSION['post1']['charge'] : ""?>" class="bg-secondary form-control" placeholder="" aria-describedby="helpId">
                               <small id="helpId" class="text-danger">
                               <?=$arrayError['charge'] ? $arrayError['charge'] : "" ?>
                               </small>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="" class="text-warning">Volume M3</label>
                               <input type="text" name="volume" id="" value=" <?=isset($_SESSION['post1']['volume']) ? $_SESSION['post1']['volume'] : ""?> " class="bg-secondary form-control" placeholder="" aria-describedby="helpId">
                               <small id="helpId" class="text-danger">
                               <?=$arrayError['volume'] ? $arrayError['volume'] : "" ?>
                               </small>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="" class="text-warning">Longueur</label>
                               <input type="text" name="longueur" id=""  value="<?=isset($_SESSION['post1']['longueur']) ? $_SESSION['post1']['longueur'] : ""?>" class="bg-secondary form-control" placeholder="" aria-describedby="helpId">
                               <small id="helpId" class="text-danger">
                               <?=$arrayError['longueur'] ? $arrayError['longueur'] : "" ?>
                               </small>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="" class="text-warning">Largeur</label>
                               <input type="text" name="largeur" id="" value=" <?=isset($_SESSION['post1']['largeur']) ? $_SESSION['post1']['largeur'] : ""?>" class="bg-secondary form-control" placeholder="" aria-describedby="helpId">
                               <small id="helpId" class="text-danger">
                               <?=$arrayError['largeur'] ? $arrayError['largeur'] : "" ?>
                               </small>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group ">
                               <label for="" class="text-warning">Hauteur</label>
                               <input type="text" name="hauteur" id="" value=" <?=isset($_SESSION['post1']['hauteur']) ? $_SESSION['post1']['hauteur'] : ""?>" class="bg-secondary form-control" placeholder="" aria-describedby="helpId">
                               <small id="helpId" class="text-danger">
                                    <?=$arrayError['hauteur'] ? $arrayError['hauteur'] : "" ?>
                               </small>
                             </div>
                         </div> 
                     </div>
                             
                     <div class="row">
                        <div class="col-md-5">
                           <div class="form-group">
                             <label for="" class="text-warning">Cliquer pour ajouter des images</label>
                                <input type="file" value="" class="form-control-file" name="avatar[]" id="" placeholder="" aria-describedby="fileHelpId">
                             <small id="fileHelpId" class="form-text text-danger">
                                 <?=$arrayError['avatar'] ? $arrayError['avatar'] : "" ?>
                             </small>
                           </div>
                           
                        </div>
                        <div class="col-md-2 m " id="">
                            <button type="button"  value="+" id="button" onclick="addField()" class="btn btn-warning ">+</button> <br>                       
                        </div>
                     </div>
                        <div class="row">
                            <div id="fields">
                            </div>
                        </div>
                       <div class="row mt-3">
                         <div class="col-md-6">
                            <button type="submit" name="inscription" class="btn btn-warning"> Ajouter</button>
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
   /*  input[type=text]{
        background: grey;
    }
    input[type=date]{
        background: grey;
    } */
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
.mt{
    margin-top: -1%;
}
.section-title{
    font-size: 20px;
}
.image{
    margin-top: 1%;
    margin-left: -106%;
}
</style>
<?php
if (isset($_SESSION['post1'])) {
    unset($_SESSION['post1']);
}
 require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
