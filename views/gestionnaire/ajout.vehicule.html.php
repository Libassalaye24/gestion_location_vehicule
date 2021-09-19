<?php  require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>
<div class="container">
          <form action="" method="post">
              <input type="hidden" name="controlleurs" value="vehicule">
              <input type="hidden" name="action" value="add.bien">
            <div class="card text-left group shadow mb-4">
                <img class="card-img-top" src="holder.js/100px180/" alt="">
                <div class="card-body">
                     <div class="row jjjj">
                        <div class="col-md-12">
                            <h3 class="section-title font-weight-light text-white mb-4">
                                <span class="headline">Ajout Vehicule</span>
                            </h3 >
                        </div>
                    </div>
                    <div class="row">                        
                       
                        <div class="col-md-12">
                            <div class="form-group">
                                    <label for="" class="text-warning">kilometrage</label>
                                    <input type="text"
                                        class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-muted"></small>
                             </div>
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
                       <!--  <?php //$nbr=genere_reference(); ?>
                        <input type="hidden" name="numero_vehicule" value="<?=$nbr?>"> -->
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
                         <div class="col-md-3">
                           <div class="form-check form-check-inline">
                               <label class="form-check-label text-warning">
                                  Vehicule
                               </label>
                           </div>
                        </div>   
                        <?php foreach($type_vehicule as $type): ?>             
                        <div class="col-md-3">
                           <div class="form-check form-check-inline">
                               <label class="form-check-label text-warning">
                                   <input class="form-check-input " type="radio" name="type_vehicule" id="" value="<?=$type['id_type_vehicule']?>"> <?=$type['nom_type_vehicule']?>
                               </label>
                           </div>
                        </div>
                        <?php endforeach?>
                       
                        <div class="col-md-3 mt">
                          <button type="submit" name="type_vehicule" class="btn btn-warning">OK</button>
                        </div>
                     </div>
                     <div class="row mt-2">
                        <div class="col-md-5">
                             <div class="form-group">
                                    <label for="" class="text-warning">Saisir le nbre image</label>
                                    <input type="text" class="form-control" name="nbre_image" id="" placeholder="" aria-describedby="fileHelpId">
                                    <small id="helpId" class="form-text text-muted"></small>
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
                                <small id="fileHelpId" class="form-text text-muted"></small>
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
                                    <small id="helpId" class="form-text text-muted"></small>
                             </div>
                        </div> -->
<?php require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
