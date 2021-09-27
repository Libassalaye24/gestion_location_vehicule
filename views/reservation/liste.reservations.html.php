<?php  require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>
<div class="container jjj">
<div class="row mt-5 ">
            <div class="col-md-offset-3">
                <form action="" class="form-inline" method="post">
                    <input type="hidden" name="controlleurs" value="reservation">
                    <input type="hidden" name="action" value="filtre_reservation">
                    <div class="form-group">
                      <label for="" class="text-white">Date</label>
                      <input type="date" name="date" value="" id="" class="form-control ml-3  bg-secondary" placeholder="" aria-describedby="helpId">
                      <small id="helpId" class="text-muted"></small>
                    </div>
                    <div class="form-group ml-5">
                    <div class="form-group">
                      <label for="" class="text-white ">Etat</label>
                      <select class="form-control ml-3 bg-secondary" name="etat_reservation" id="">
                      <?php foreach($etats as $etat): ?>
                      <option value="<?=$etat['nom_etat']?>"><?=$etat['nom_etat']?></option>
                      <?php endforeach ?>
                      </select>
                    </div>
                    </div>
                    <button type="submit" name="valider" class="btn btn-warning ml-5">Ok</button>
                    
                </form>
            </div>
        </div>
 <div class="row mt-5">
 
<table class="table  shadow mb-3 border ">
  <thead class="thead bg-warning">
    <tr>
      <th  scope="col">Nom & prenom</th>
      <th scope="col">etat</th>
      <th scope="col">Date</th>
      <th scope="col">Traiter Reservation</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($encours_reservation as $reservation):?>
    <tr>
      <th scope="row" class=""><a href="<?=WEB_ROUTE.'?controlleurs=reservation&views=reservation.client&id_client='.$reservation['id_user']?>"><?=$reservation['nom_user'].' '.$reservation['prenom_user']?></a></th>
      <td class="text-white">
        <?=$reservation['nom_etat']?>
      </td><?php $date=date_format(date_create($reservation['date_debut_location']),'d-m-Y') ?>
      <td class="text-white"><?=$date?></td>
      <td class="text-white">
        <?php if($reservation['nom_etat']=='valider'):?>
           <a name="" id="" class="btn btn-success" href="<?=WEB_ROUTE.'?controlleurs=reservation&views=retour.location&id_reservation='.$reservation['id_reservation']?>" role="button"><i class="fa fa-backward" aria-hidden="true"></i>Gerer retour</a>
        <?php elseif($reservation['nom_etat']=='en cours'): ?>
          <a name="" id="" class="btn btn-warning" href="<?=WEB_ROUTE.'?controlleurs=reservation&views=traiter.reservation&id_reservation='.$reservation['id_reservation']?>" role="button"><i class="fa fa-wrench" aria-hidden="true"></i>Traiter</a>
        <?php endif ?>
      </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
</div>
<nav aria-label="Page navigation example ">
        <ul class="pagination justify-content-center ">
            <li class="page-item <?= empty($_GET['page']) || ($_GET['page']==1) ? 'disabled' : ""?>">
                 <a class="page-link next"  href="<?=WEB_ROUTE.'?controlleurs=reservation&views=liste.reservations&page='.$precedent ?>" tabindex="-1">
                 <span aria-hidden="true" class="tt">&laquo;</span>
                 <span class="sr-only">Previous</span>
                </a>
            </li>
            <?php for($i=1;$i<=$total_page;$i++): ?>
                 <li class="page-item"><a class="page-link" href="<?=WEB_ROUTE.'?controlleurs=reservation&views=liste.reservations&page='.$i ?>"><?=$i?></a></li>
            <?php endfor ?>
            <li class="page-item   <?= $_GET['page'] > $total_page-1 ? 'disabled' : ""?>  " >
                 <a class="page-link next "  href="<?=WEB_ROUTE.'?controlleurs=reservation&views=liste.reservations&page='.$suivant ?>">
                      <span aria-hidden="true" class="tt">&raquo;</span>
                      <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
<style>

  a i{
    color: #000;
  }
    .jjj{
        margin-top: 17%;
    }
</style>
<?php  require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>


