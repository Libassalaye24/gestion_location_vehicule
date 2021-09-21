<?php  require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>
<div class="container">
          <form action="" method="post">
              <input type="hidden" name="controlleurs" value="reservation">
              <input type="hidden" name="action" value="ajout.reservation">
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
                         <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="text-warning">Date debut</label>
                                <input type="date" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-muted"></small>
                            </div>
                         </div>
                         <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="text-warning">Date fin</label>
                                <input type="date" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-muted"></small>
                            </div>
                         </div>
                         <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="text-warning">Duree</label>
                                <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-muted"></small>
                            </div>
                         </div>
                         
                     </div>
                     <div class="row">
                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="" class="text-warning">Marque</label>
                               <input type="text" name="" value="<?=$vehicule[0]['nom_marque']?>" id="" class="form-control bg" disabled  placeholder="" aria-describedby="helpId">
                               <small id="helpId" class="text-muted"></small>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="" class="text-warning">Modele</label>
                               <input type="text" name="" id="" class="form-control bg" value="<?=$vehicule[0]['nom_modele']?>" disabled placeholder="" aria-describedby="helpId">
                               <small id="helpId" class="text-muted"></small>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="" class="text-warning">Categorie</label>
                               <input type="text" name="" id="" class="form-control" value="<?=$vehicule[0]['nom_categorie']?>" disabled placeholder="" aria-describedby="helpId">
                               <small id="helpId" class="text-muted"></small>
                             </div>
                         </div>
                     </div>
                     <div class="row ">
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    Options
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> Display value
                                </label>
                            </div>
                        </div>
                        
                     </div>
                                       
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
                                        class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-muted"></small>
                             </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label for="" class="text-warning">Nom</label>
                                    <input type="text"
                                        class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-muted"></small>
                             </div>
                        </div>
                     </div>
                     <div class="row">                        
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label for="" class="text-warning">Telephone</label>
                                    <input type="text"
                                        class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-muted"></small>
                             </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label for="" class="text-warning">Email</label>
                                    <input type="text"
                                        class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-muted"></small>
                             </div>
                        </div>
                     </div>
                     <div class="row">                        
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label for="" class="text-warning">Password</label>
                                    <input type="text"
                                        class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-muted"></small>
                             </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label for="" class="text-warning">Confirm Password</label>
                                    <input type="text"
                                        class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-muted"></small>
                             </div>
                        </div>
                       
                     </div>
                     <div class="row">
                         <div class="col-md-3">
                             <div class="form-group">
                               <label for="" class="text-warning">Ville</label>
                               <input type="text"
                                 class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                               <small id="helpId" class="form-text text-muted"></small>
                             </div>
                         </div>
                         <div class="col-md-3">
                             <div class="form-group">
                               <label for="" class="text-warning">Rue</label>
                               <input type="text"
                                 class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                               <small id="helpId" class="form-text text-muted"></small>
                             </div>
                         </div>
                         <div class="col-md-3">
                             <div class="form-group">
                               <label for="" class="text-warning">Pays</label>
                               <input type="text"
                                 class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                               <small id="helpId" class="form-text text-muted"></small>
                             </div>
                         </div>
                         <div class="col-md-3">
                             <div class="form-group">
                               <label for="" class="text-warning">Code Postal</label>
                               <input type="text"
                                 class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                               <small id="helpId" class="form-text text-muted"></small>
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
