<?php  require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>
<div class="container">
          <form action="" method="post">
              <input type="hidden" name="controlleurs" value="security">
              <input type="hidden" name="action" value="inscription">
            <div class="card text-left group shadow mb-4">
                <img class="card-img-top" src="holder.js/100px180/" alt="">
                <div class="card-body">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Body</p>
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
                           <a name="" id="" class=" text-white " href="#" >Se connecter</a>
                         </div>
                     </div>
                </div>
                
            </div>
          </form>
</div>
<style>
    .group{
        margin-top: 23%;
        background-color: #000;
        box-shadow: #ddd;
    }
    input[type=text]{
        background: grey;
    }
  
</style>
<?php  require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
