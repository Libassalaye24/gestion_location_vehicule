<?php  require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>

<div class="container">
<div class="row jjj">
                        <div class="col-md-12">
                            <h3 class="section-title font-weight-light text-white mb-4 mr-1">
                                <span class="headline">Reservations par client</span>
                            </h3 >
                        </div>
                    </div>
    <div class="row mt-2">
        <table class="table table border ">
            <thead>
                <tr>
                    <th scope="col" class="text-warning">Nom & Prenom</th>
                    <th scope="col" class="text-warning">Type vehicule</th>
                    <th scope="col" class="text-warning">Vehicule</th>
                    <th scope="col" class="text-warning">Date</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($reserve_client as $client) ?>
                <tr>
                    <th class="text-white"><?=$client['nom_user'].' '.$client['prenom_user']?></th>
                    <td class="text-white"><?=$client['nom_type_vehicule']?></td>
                    <td class="text-white"><?=$client['nom_marque'].' '.$client['nom_modele']?></td>
                    <td class="text-white"><?=$client['date_debut_location']?></td>
                </tr>
            <?php ?>
            </tbody>
        </table>
</div>
</div>
<style>
    .jjj{
        margin-top: 32%;
    }
    .section-title{
    font-size: 20px;
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

</style>
<?php  require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
