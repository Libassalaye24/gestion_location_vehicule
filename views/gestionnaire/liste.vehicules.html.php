<?php  require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>


<div class="container">
   <div class="row jjjj">
     <div class="col-md-12">
       <h3 class="section-title font-weight-light text-white mb-4">
         <span class="headline">Location de Vehicules</span>
       </h3 >
     </div>
   </div>
  
   
<div class="row  ">
<div class="col-md-offset-3">
                <form action="" class="form-inline" method="post">
                         <input type="hidden" name="controlleurs" value="vehicule">
                        <input type="hidden" name="action" value="filtre_vehicule">
                    <div class="form-group ml-3">
                    <div class="form-group">
                      <label for="" class="p-3 text-white">Categorie</label>
                      <select class="form-control bg-dark" name="categorie" id="">
                        <?php foreach($categories as $categorie): ?>
                        <option value="<?=$categorie['nom_categorie']?>"><?=$categorie['nom_categorie']?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    </div>
                    <div class="form-group ml-3">
                    <div class="form-group">
                      <label for="" class="p-3 text-white">Marque</label>
                      <select class="form-control bg-dark" name="marque" id="">
                      <?php foreach($marques as $marque): ?>
                        <option value="<?=$marque['nom_marque']?>"><?=$marque['nom_marque']?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    </div>
                    <div class="form-group ml-3">
                    <div class="form-group">
                      <label for="" class="p-3 text-white">Modele</label>
                      <select class="form-control bg-dark" name="modele" id="">
                      <?php foreach($modeles as $modele): ?>
                        <option value="<?=$modele['nom_modele']?>"><?=$modele['nom_modele']?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    </div>
                  
                    <button type="submit" name="ok" class="btn btn-warning ml-5">Ok</button>
                    
                </form>
            </div>
  </div>
      <div class="row mt-4">
      <table class="table table-bordered table-sm">
            <thead>
              <tr>
                <th scope="col" class="text-warning">Type </th>
                <th scope="col" class="text-warning">Marque</th>
                <th scope="col" class="text-warning">Modele</th>
                <th scope="col" class="text-warning">Categorie</th>
                <th scope="col" class="text-warning">Immatriculation</th>
                <th scope="col" class="text-warning">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($vehicule_disponible as $vehicule): ?>
              <tr>
                <th scope="row" class="text-white"><?=$vehicule['nom_type_vehicule']?></th>
                <td class="text-white"><?=$vehicule['nom_marque']?></td>
                <td class="text-white"><?=$vehicule['nom_modele']?></td>
                <td class="text-white"><?=$vehicule['nom_categorie']?></td>
                <td class="text-white"><?=$vehicule['immatriculation_vehicule']?></td>
                <td>
                  <a href=""><i class="fas fa-edit edit"></i></a>
                  <a href=""><i class="fas fa-file-archive archive "></i></a>
                </td>
              </tr>
              <?php endforeach ?>
            </tbody>
      </table>
      </div>
 </div> 
      
 <nav aria-label="Page navigation example ">
        <ul class="pagination justify-content-center ">
            <li class="page-item ">
                 <a class="page-link next"  href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=ajout.option'?>" tabindex="-1">
                 <span aria-hidden="true" class="tt">&laquo;</span>
                 <span class="sr-only">Previous</span>
                </a>
            </li>
            <?php //for($i=1;$i<=$nbrPage;$i++): ?>
                 <li class="page-item"><a class="page-link" href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=ajout.option' ?>">1</a></li>
            <?php //endfor ?>
            <li class="page-item  ">
                 <a class="page-link next"  href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=ajout.option' ?>">
                      <span aria-hidden="true" class="tt">&raquo;</span>
                      <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
     
<style>
 .edit{
    color: yellow;
  }
  .archive{
    color: red;
  }
    .jjjj{
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
body{
  overflow-x: hidden
  ;
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

    .card {
        background: #000;
    }
</style>
<style>
              figure.zoom {
  background-position: 50% 50%;
  position: relative;
  width: 450px;
  overflow: hidden;
  cursor: zoom-in;
  background-repeat: no-repeat;
  background-size: auto;
}
figure.zoom img:hover {
  opacity: 0;
}
figure.zoom img {
  transition: opacity 0.5s;
  display: block;
  width: 85%;
}
            </style>
            <script>
              function zoom(e) {
  var zoomer = e.currentTarget;
  e.offsetX ? (offsetX = e.offsetX) : (offsetX = e.touches[0].pageX);
  e.offsetY ? (offsetY = e.offsetY) : (offsetX = e.touches[0].pageX);
  x = (offsetX / zoomer.offsetWidth) * 100;
  y = (offsetY / zoomer.offsetHeight) * 100;
  zoomer.style.backgroundPosition = x + "% " + y + "%";
}

            </script>
         
<?php  require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>