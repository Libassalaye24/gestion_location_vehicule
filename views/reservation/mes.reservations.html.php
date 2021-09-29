<?php  require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>

<div class="container jjjj">
    <div class="row ">
        <div class="col-md-8">
          <h3 class="section-title font-weight-light text-white mb-4">
            <span class="headline" style="font-size: 1.5rem;">Filtrer par:</span>
          </h3 >
        </div>
        <div class="col-md-4">
              <a href="<?=WEB_ROUTE.'?controlleurs=reservation&views=mesreservations.encours'?>" style="color: #fff;text-decoration:none;" >Reservation en cours <i class="fa fa-arrow-right ml-2" style="color: #d2b100;" aria-hidden="true"></i></a>
        </div>
   </div>
    <div class="row  ">
         <div class="col-md-offset-3">
                  <form action="" class="form-inline" method="post">
                       <input type="hidden" name="controlleurs" value="vehicule">
                       <input type="hidden" name="action" value="filtrer">
                      <div class="form-group ml-3">
                        <div class="form-group">
                             <label for="" class="p-3 text-white">Date</label>
                             <input type="date" name="" class="form-control bg-secondary" id="">
                        </div>
                      </div>
                      <div class="form-group ml-3">
                        <div class="form-group">
                            <label for="" class="p-3 text-white">Etat</label>
                            <select class="form-control bg-secondary" name="categorie" id="">
                              <option  value="valider">valider</option>
                              <option  value="annuler">annuler</option>
                            </select>
                        </div>
                      </div>
                      
                      <div class="row">
                          <div class="col xs">
                            <button type="submit" name="ok" class="btn btn-warning ml-4">Filtrer</button>
                          </div>
                      </div>                    
                  </form>
            </div>
    </div>
        <div class="row mt-3 ">
          <?php foreach($reservations as $reserve): ?>
          
                <?php  $image=find_image_vehicule_by_id($reserve['id_vehicule']); 
                    $date1=date_create($reserve['date_fin_location']);
                    $date2=date_create($reserve['date_debut_location']);
                    $jr= difference_date($date1,$date2);
                  $prix = intval($jr)*intval($reserve['prix_location_jour']) + intval($reserve['caution']);?>
              <div class="col-sm-4  mb-4">
                <div class="card " style="width: 22rem">
                  <a href="">
                      <img
                      class="card-img-top cloudzoom" height="200" width="100"
                      src="<?=WEB_ROUTE.'img/uploads/vehicule/'.$image[0]['nom_image']?>"
                      alt="Annonce 1" 
                      />
                  
                  </a>
                

                  <div class="card-body ">
                    <h5 class="card-title">
                        <p class=" text-white"> 
                            <?= ($reserve['nom_categorie']).' '.($reserve['nom_marque']).' '.($reserve['nom_modele']) ?>
                        </p>
                      <?php if($reserve['nom_etat']=='valider') : ?>
                      <span class="badge badge-success">
                            <?= ($reserve['nom_etat']);  ?>
                        </span>
                      <?php elseif($reserve['nom_etat']=='annuler'): ?>
                        <span class="badge badge-danger">
                            <?= ($reserve['nom_etat']);  ?>
                          </span>
                        <?php else: ?>
                        <span class="badge badge-warning">
                            <?= ($reserve['nom_etat']);  ?>
                          </span>
                      <?php endif ?> 
                      <span class="badge badge-warning">
                          <?= ($prix).' '.'FCFA';  ?>
                      </span>
                    </h5>
                    <hr /><?php $reserve['date_debut_location']=date_format(date_create($reserve['date_debut_location']),'d-m-Y') ?>
                    <span class="float-left btn btn-sm text-center badge badge-warning">
                        <?='Reserver le: '.$reserve['date_debut_location'];  ?>
                    </span>
                    <?php if($reserve['nom_etat']!='annuler'): ?>
                    <a href="<?= WEB_ROUTE.'?controlleurs=reservation&views=annuler.reservation&id_reservation='.$reserve['id_reservation']?>" class="btn btn-sm btn-outline-danger float-right">
                        Annuler
                    </a>
                    <?php endif ?>
              
                  </div>
                </div>
              </div>
              <?php endforeach ?>
              </div> 
                <nav aria-label="Page navigation example ">
                <ul class="pagination justify-content-center ">
                      <li class="page-item <?= empty($_GET['page']) || ($_GET['page']==1) ? 'disabled' : ""?>">
                            <a class="page-link next"  href="<?=WEB_ROUTE.'?controlleurs=reservation&views=mes.reservations&page='.$precedent ?>" tabindex="-1">
                              <span aria-hidden="true" class="tt">&laquo;</span>
                              <span class="sr-only">Previous</span>
                          </a>
                      </li>
                      <?php for($i=1;$i<=$total_page;$i++): ?>
                            <li class="page-item"><a class="page-link" href="<?=WEB_ROUTE.'?controlleurs=reservation&views=mes.reservations&page='.$i ?>"><?=$i?></a></li>
                      <?php endfor ?>
                      <li class="page-item   <?= $_GET['page'] > $total_page-1 ? 'disabled' : ""?>  " >
                            <a class="page-link next "  href="<?=WEB_ROUTE.'?controlleurs=reservation&views=mes.reservations&page='.$suivant ?>">
                                <span aria-hidden="true" class="tt">&raquo;</span>
                                <span class="sr-only">Next</span>
                          </a>
                      </li>
                </ul>
            </nav>
  

</div>
<style>
               .jjjj{
        margin-top: 13%;
   
    
    }
              
    .card {
        background: #000;
    }
    
 </style>
<?php  require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
