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
                <span class="headline">Parametrage Modele</span>
            </h3 >
         </div>
    </div>
    <div class="row">
         <a href="" class="btn btn-warning ml-auto mr-auto" >
         <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
            </svg> Liste Modele
        </a>

    </div>
    <div class="container">
         <form action="" method="post">
             <input type="hidden" name="controlleurs" value="vehicule">
             <input type="hidden" name="action" value="add.modele">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="" class="text-warning">Saisir le modele</label>
                                <input type="text" name="modele" id="" class="form-control" placeholder="Entrer le modele" aria-describedby="helpId">
                                <small id="helpId" class="text-danger">
                                    <?=isset($arrayError['modele']) ? $arrayError['modele'] : "" ?>
                                </small>
                            </div>
                        </div>
                        <div class="col-md-4 mt">
                            <button type="submit" name="ajout.modele" class="btn btn-warning">Ajouter</button>
                        </div>
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

.pagination a
{
    color: #000;
}
.tt{
    color: #000;
}
.tt:hover{
    color: #d2b100;
    transition: all 0,3s;
}
.pagination a:hover:not(.next)
{
    background-color: #000 !Important;
    color: #d2b100;
     border: solid 1px #000; 
}
.next{
    background-color: #d2b100;
    color: #000;
    border: solid 1px #d2b100; 
}
.next:hover{
    background-color: #d2b100;
    color: #000;
    border: solid 1px #d2b100; 
}
</style>
<?php  require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
