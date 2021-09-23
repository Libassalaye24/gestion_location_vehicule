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
                <img class="card-img-top" src="holder.js/100px180/" alt="">
                <div class="card-body">
                     <div class="row jjjj">
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
                                <?php foreach($categories as $categorie): ?>
                                 <option value="<?=$categorie['id_categorie']?>"><?=$categorie['nom_categorie']?></option>
                                <?php endforeach ?>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group  ">
                              <label for="" class="text-warning ">Marque</label>
                              <select class="form-control  bg-secondary" name="marque" id="">
                              <?php foreach($marques as $marque): ?>
                                 <option value="<?=$marque['id_marque']?>"><?=$marque['nom_marque']?></option>
                                <?php endforeach ?>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group  ">
                              <label for="" class="text-warning">Modele</label>
                              <select class="form-control  bg-secondary" name="modele" id="">
                              <?php foreach($modeles as $modele): ?>
                                 <option value="<?=$modele['id_modele']?>"><?=$modele['nom_modele']?></option>
                                <?php endforeach ?>
                              </select>
                            </div>
                        </div>
                    
                     </div>
                     <div class="row ">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-warning">Options</label>
                            </div>
                        </div>
                        <?php foreach($options as $option): ?>
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label text-warning" >
                                    <input class="form-check-input" type="checkbox" name="options[]" id="" value="<?=$option['id_option_vehicule']?>"> <?=$option['nom_option_vehicule']?>
                                </label>
                            </div>
                        </div>
                        <?php endforeach?>
                        
                        
                     </div>
                     <div class="row">
                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="" class="text-warning">Kilometrage</label>
                               <input type="text" name="kmt" id="" class="form-control" placeholder="" aria-describedby="helpId">
                               <small id="helpId" class="text-muted">
                               <?=$arrayError['kmt'] ? $arrayError['kmt'] : "" ?>
                               </small>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="" class="text-warning">Charger Max</label>
                               <input type="text" name="charge" id="" class="form-control" placeholder="" aria-describedby="helpId">
                               <small id="helpId" class="text-muted"></small>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="" class="text-warning">Volume M3</label>
                               <input type="text" name="volume" id="" class="form-control" placeholder="" aria-describedby="helpId">
                               <small id="helpId" class="text-muted"></small>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="" class="text-warning">Longueur</label>
                               <input type="text" name="longueur" id="" class="form-control" placeholder="" aria-describedby="helpId">
                               <small id="helpId" class="text-muted"></small>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="" class="text-warning">Largeur</label>
                               <input type="text" name="largeur" id="" class="form-control" placeholder="" aria-describedby="helpId">
                               <small id="helpId" class="text-muted"></small>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="" class="text-warning">Hauteur</label>
                               <input type="text" name="hauteur" id="" class="form-control" placeholder="" aria-describedby="helpId">
                               <small id="helpId" class="text-muted"></small>
                             </div>
                         </div> 
                     </div>
                               <!--  <script>
                                        function myFunction() {
                                          if (  document.querySelector('#myradio2').checked ) {
                                              document.getElementById("myText").disabled = true;
                                              document.getElementById("myText1").disabled = true;
                                              document.getElementById("myText2").disabled = true;
                                              document.getElementById("myText3").disabled = true;
                                              document.getElementById("myText4").disabled = true;
                            
                                          }else{
                                            document.getElementById("myText").disabled = false;
                                            document.getElementById("myText1").disabled = false;
                                            document.getElementById("myText2").disabled = false;
                                            document.getElementById("myText3").disabled = false;
                                            document.getElementById("myText4").disabled = false;
                                          }
                                             
                                        }
                                    </script> -->
                     <div class="row">
                        <div class="col-md-5">
                             <div class="form-group">
                                    <label for="" class="text-warning">Saisir le nbre image</label>
                                    <input type="number" class="form-control bg-secondary" name="nbre_image" id="" placeholder="" aria-describedby="fileHelpId">
                                    <small id="helpId" class="form-text text-danger">
                                   
                                    </small>
                             </div>
                           
                        </div>
                        <div class="col-md-2 mt-md-2 " id="">
                            <button type="submit" name="nbre" class="btn btn-warning mt-4 ">
                                OK
                            </button>
                        </div>
                        
                     </div>
                     <?php for($i=0;$i<$_SESSION['nbre_image'];$i++): ?>
                        <div class="row">
                            <div class="form-group">
                                <label for=""></label>
                                <input type="file" class="form-control-file ml-3" name="avatar[]" id="" placeholder="" aria-describedby="fileHelpId">
                                <small id="fileHelpId" class="form-text text-danger">
                                    
                                </small>
                            </div>
                        </div>
                     <?php endfor ?>
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
<SCRIPT LANGUAGE="JavaScript">
 
function addField(){
    var field = "<input type='file' name='file' value='' class='form-control-file image' aria-describedby='fileHelpId'/><br/>";
    document.getElementById('fields').innerHTML += field;
}
    function check(ele) {
    
        if (ele.checked == true ) {
            return true;
        }else{
            return false;
        }
        if (check(ele)==true) {
                var field = "<input type='file' name='file' value='' class='form-control-file image' aria-describedby='fileHelpId'/><br/>";
                document.getElementById('check').innerHTML += field;
         }
    
    }
   
 
</SCRIPT>
<script type="text/javascript">
function checkCheckBox(ele) {
 
    if (ele.checked == false ) {
        var div = document.getElementById("ajout");
        div.removeChild(div.firstChild);
    return false;
    }
    else {
        var input = document.createElement("input");
        input.type = "text";
        input.name = "name_de_l_input";
        document.getElementById("ajout").appendChild(input);
    }
    return true;
     
}
</script>
<!-- <input type="checkbox" value="0" name="oui" onclick="checkCheckBox(this)" > Coché ce que vous voulez
<div id="ajout"></div> -->
<!-- <div class="col-md-6">
                            <div class="form-group">
                                    <label for="" class="text-warning">Immatriculation</label>
                                    <input type="text"
                                        class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-danger"></small>
                             </div>
                        </div> -->
<?php
/* if (isset($_SESSION['post'])) {
    unset($_SESSION['post']);
} */
 require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
