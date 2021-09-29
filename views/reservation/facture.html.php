<?php  require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>
    <div class="container jjj">
    <a class="ml-3" style="color: #d2b100;text-decoration:none;" href="<?=WEB_ROUTE.'?controlleurs=reservation&views=liste.reservations'?>"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Retourner</a>

        <div class="column mt-3">
            <div class="card border-white">
              <div class="card-body">
                  <div class="row">
                        <div class="col-md-6">
                              <img style="margin-top: -4.2%;margin-left:-4%;" src="<?=WEB_ROUTE.'img/logo1.png'?>" alt="" height="80" class="">
                        </div>
                        <div class="col-md-6">
                            <h4 class="card-title mr-auto"><b>Facture de reservation</b></h4>
                        </div>
                  </div>
                     <div class="row mt-3">

                           <?php
                                $date1=date_create($reservations[0]['date_retour_reel']);                                
                                $date2=date_create($reservations[0]['date_debut_location']);
                                $jr= difference_date($date1,$date2);
                                $prix = intval($jr)*intval($reservations[0]['prix_location_jour']);
                                
                            ?>
                            <div class="col-md-6">
                                <p><strong>Type Vehicule :</strong> <?=$reservations[0]['nom_type_vehicule']?></p>
                                <p><strong>Vehicule :</strong> <?=$reservations[0]['nom_marque'].' '.$reservations[0]['nom_modele']?></p>
                                 <p><strong>Caution :</strong> <?=$reservations[0]['caution'].' '.'FCFA'?></p>
                                <p><strong>Nbrs jours :</strong> <?= $jr ?></p>
                            </div>
                             <div class="col-md-6">
                                <p><strong>Nom Client:</strong> <?=$paiement[0]['nom_user']?></p>
                                <p><strong>Prenom Client : </strong><?=$paiement[0]['prenom_user']?></p>
                                <p><strong>Date Debut location :</strong> <?=date_format(date_create($reservations[0]['date_debut_location']),'d-m-Y')?></p>
                                <p><strong>Date fin reel :</strong> <?=date_format(date_create($reservations[0]['date_retour_reel']),'d-m-Y')?></p>
                            </div>
                           
                            </div>
                     <div class="row">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Mode Paiement</th>
                                    <th>Vehicule</th>
                                    <th>Prix location Jour</th>
                                    <th>Montant Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($reservations as $reservation): ?>
                                    <tr>
                                        <td scope="row"><?=ucfirst($paiement[0]['mode_paiement'])?></td>
                                        <td><?=$reservation['nom_marque'].' '.$reservation['nom_modele'].' '.$reservations[0]['immatriculation_vehicule']?></td>
                                        <td><?=intval($reservations[0]['prix_location_jour']).' FCFA'?></td>
                                        <td><?=$prix.' FCFA'?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                   </div>
              </div>
            </div>
        </div>
        
    </div>
    <style>
        .jjj{
            margin-top: 12%;
        }
    </style>
<?php  require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>