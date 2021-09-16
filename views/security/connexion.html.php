
<?php 
 if (isset($_SESSION['arrayError'])) {
  $arrayError=$_SESSION['arrayError'];
  unset($_SESSION['arrayError']);
}
 require_once(ROUTE_DIR.'views/imc/header.html.php'); 
 ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown ">
  <div id="formContent">
    <!-- Tabs Titles -->
<div class="card mt-5  mb-3 ml-auto mr-auto text-left" style="width: 32rem;background:#000;">
  <div class="card-body shadow-lg p-3 mb-5    ">
  <!--  <div class="row bg-warning">
      <h3 class="ml-auto mr-auto">Login Form</h3>
   </div> -->
 
    <form action="<?=WEB_ROUTE?>" method="post">
    <input type="hidden" name="controlleurs" value="security">
    <input type="hidden" name="action" value="connexion">
    <?php if(isset($arrayError['invalide'])): ?>
    <div class="alert alert-danger" role="alert">
      <strong>
        <?=$arrayError['invalide']?>
      </strong>
    </div>
    <?php endif ?>
        <div class="form-group  ">
          <label for="" class="text-warning">Saisir le login</label>
          <input type="text" name="login" id="" class="form-control bg-secondary" placeholder="" aria-describedby="helpId">
          <small id="helpId" class="text-danger">
               <?= isset($arrayError['login']) ? $arrayError['login'] : ""; ?>
          </small>
        </div>
        <div class="form-group ">
          <label for=""  class="text-warning">Saisir le mot de passe</label>
          <input type="password" name="password" id="" class="form-control bg-secondary" placeholder="" aria-describedby="helpId">
          <small id="helpId" class="text-danger">
              <?= isset($arrayError['password']) ? $arrayError['password'] : ""; ?>
          </small>
        </div>
        <div class="row">
          <div class="col-md-4 ">
          <button type="submit" class="btn btn-warning " name="connexion">Se connecter</button>
          </div>
          <div class="col-md-6 mr-5 mt-2">
            <a href="<?=WEB_ROUTE.'?controlleurs=security&views=inscription'?>">S'incrire ??</a>
          </div>
        </div>
    </form>
  </div>
</div>
  

    <!-- Remind Passowrd -->
   

  </div>
</div>
<style>

/* BASIC */
/* 
html {
  background-color: #d2b100;
} */

body {
  font-family: "Poppins", sans-serif;
  height: 80vh;
  background-color: #000;
}


</style>
        <?php  require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
