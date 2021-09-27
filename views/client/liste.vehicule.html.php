<?php  require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>


<div class="container">
   <div class="row jjjj">
     <div class="col-md-12">
       <h3 class="section-title font-weight-light text-white mb-4">
         <span class="headline" style="font-size: 1.5rem;">Filtrer par:</span>
       </h3 >
     </div>
   </div>
  
   
<div class="row  ">
<div class="col-md-offset-3">
                <form action="" class="form-inline" method="post">
                         <input type="hidden" name="controlleurs" value="bien">
                        <input type="hidden" name="action" value="test">
                    <div class="form-group ml-3">
                    <div class="form-group">
                      <label for="" class="p-3 text-white">Categorie</label>
                      <select class="form-control bg-dark" name="categorie" id="">
                        <?php foreach($categorie as $ctgr): ?>
                        <option  value="<?=$ctgr['id_categorie']?>"><?=$ctgr['nom_categorie']?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    </div>
                    <div class="form-group ml-3">
                    <div class="form-group">
                      <label for="" class="p-3 text-white">Marque</label>
                      <select class="form-control bg-dark" name="etat_bien" id="">
                      <?php foreach($marques as $ctgr): ?>
                        <option  value="<?=$ctgr['id_marque']?>"><?=$ctgr['nom_marque']?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    </div>
                    <div class="form-group ml-3">
                    <div class="form-group">
                      <label for="" class="p-3 text-white">Modele</label>
                      <select class="form-control bg-dark" name="etat_bien" id="">
                      <?php foreach($modeles as $ctgr): ?>
                        <option  value="<?=$ctgr['id_modele']?>"><?=$ctgr['nom_modele']?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    </div>
                  
                    <button type="submit" name="ok" class="btn btn-warning ml-5"><i class="fa fa-search" aria-hidden="true"></i>Chercher</button>
                    
                </form>
            </div>
</div>
<div class="row mt-5">
        <?php foreach ($vehicule_disponible as $key => $vehicule): ?>
          <?php  $image=find_image_vehicule_by_id($vehicule['id_vehicule']);  ?>
        <div class="col-sm-4  mb-4">
          <div class="card" >
            <a href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=details.vehicule&id_vehicule='.$vehicule['id_vehicule']?>">
                <img
                class="card-img-top cloudzoom"  height="200"
                src="<?=WEB_ROUTE.'img/uploads/vehicule/'.$image[0]['nom_image']?>"
                alt="Annonce 1" data-cloudzoom = "zoomImage: 'big720.png'" 
                />
 
            </a>
            <div class="card-body ">
              <h5 class="card-title">
                  <p class=" text-white"> 
                  <?=$vehicule['nom_categorie'].' '.$vehicule['nom_marque'].' '.$vehicule['nom_modele']?>
                 </p>
              
                <span class="badge badge-warning"><?=$vehicule['prix_location_jour'].' '.'FCFA'?></span>
              </h5>
              <hr />
               <a href="<?=WEB_ROUTE.'?controlleurs=reservation&views=ajout.reservation&id_vehicule='.$vehicule['id_vehicule']?>" class="btn btn-sm btn-outline-secondary float-right ml-3">Reserver</a>
          
              <a href="<?= WEB_ROUTE.'?controlleurs=vehicule&views=details.vehicule&id_vehicule='.$vehicule['id_vehicule']?>" class="btn btn-sm btn-outline-warning float-right"
                >Details</a
              >
            </div>
          </div>
        </div>
        <?php endforeach ?>
        </div> 
        <nav aria-label="Page navigation example ">
        <ul class="pagination justify-content-center ">
            <li class="page-item <?= empty($_GET['page']) || ($_GET['page']==1) ? 'disabled' : ""?>">
                 <a class="page-link next"  href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=liste.vehicule&page='.$precedent ?>" tabindex="-1">
                 <span aria-hidden="true" class="tt">&laquo;</span>
                 <span class="sr-only">Previous</span>
                </a>
            </li>
            <?php for($i=1;$i<=$total_page;$i++): ?>
                 <li class="page-item"><a class="page-link" href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=liste.vehicule&page='.$i ?>"><?=$i?></a></li>
            <?php endfor ?>
            <li class="page-item   <?= $_GET['page'] > $total_page-1 ? 'disabled' : ""?>  " >
                 <a class="page-link next "  href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=liste.vehicule&page='.$suivant ?>">
                      <span aria-hidden="true" class="tt">&raquo;</span>
                      <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
  
    </div>
     
<style>
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
    .card {
        background: #000;
    }
</style>
<?php  require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
