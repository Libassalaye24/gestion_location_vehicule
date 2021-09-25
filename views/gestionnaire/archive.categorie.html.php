<?php   require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>

    <div class="container">
            <div class="card mt">
                <div class="card-body">
                    <h4 class="card-title">Confirmation D'archivage</h4>
                    <p class="card-text">Voulez vous archiver ?</p>
                    <div class="row">
                        <div class="col-md-6">
                            <a name="" id="" class="btn btn-danger" href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=liste.categorie'?>" role="button">non</a>
                        </div>
                        <div class="col-md-6">
                           <form action="" method="post">
                               <input type="hidden" name="controlleurs" value="vehicule">
                               <input type="hidden" name="action" value="archive.categorie">
                               <input type="hidden" name="id_categorie" value="<?=(int)$id_categorie?>">
                               <button type="submit" name="archiver" class="btn btn-success">Oui</button>
                           </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<style>
    .mt{
        margin-top: 22%;
    }
</style>
<?php   require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>

