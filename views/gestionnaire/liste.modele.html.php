<?php  require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>
<div class="container">
    <div class="row jjj">
         <div class="col-md-12">
            <h3 class="section-title font-weight-light text-white mb-4">
                <span class="headline">Parametrage Modele</span>
            </h3 >
         </div>
    </div>
    <div class="row">
         <a href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=ajout.modele'?>" class="btn btn-warning ml-auto mr-auto" >
         <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
            </svg> Ajouter Modele
        </a>
       

      
    </div>
    <div class="row mt-5">
         <table class="table table-bordered table-sm">
            <thead>
                <tr>
                <th scope="col" class="text-white">Modeles</th>
                <th scope="col" class="text-white">Etat</th>
                <th scope="col" class="text-white">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($modeles as $modele): ?>
                <form action="" method="post">
                    <input type="hidden" name="contolleurs" value="vehicule">
                    <input type="hidden" name="action" value="archiver.modele">
                    <input type="hidden" name="id_modele" value="<?=$modele['id_modele']?>">
                <tr>
                <td class="text-white"><?=$modele['nom_modele']?></td>
                <td class="text-white"><?=$modele['etat']?></td>
                <td class="text-white ">
                <?php if($modele['etat']=='normal'): ?>
                    <button type="submit" class="btn text-secondary border-secondary active w" name="archiver"> <i class="fa fa-file-archive" aria-hidden="true"></i>Archiver</button>
                <?php else: ?> 
                    <button type="submit" class="btn text-secondary border-secondary active w" name="desarchiver"> <i class="fas fa-file-archive  "></i> Désarchiver</button>
                <?php endif ?>
                    <a href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=edit.modele&id_modele='.$modele['id_modele']?>" class="btn w text-warning border-warning active " role="button"><i class="fas fa-edit edit "></i>Modifier</a>
                </td>
                </tr>
                </form>
             <?php endforeach ?>  
            </tbody>
            </table>
    </div>
  
    <nav aria-label="Page navigation example ">
        <ul class="pagination justify-content-center ">
            <li class="page-item <?= empty($_GET['page']) || ($_GET['page']==1) ? 'disabled' : ""?> ">
                 <a class="page-link next"  href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=liste.modele&page='.$precedent ?>" tabindex="-1">
                 <span aria-hidden="true" class="tt">&laquo;</span>
                 <span class="sr-only">Previous</span>
                </a>
            </li>
            <?php for($i=1;$i<=$total_page;$i++): ?>
                 <li class="page-item"><a class="page-link" href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=liste.modele&page='.$i ?>"><?=$i?></a></li>
            <?php endfor ?>
            <li class="page-item  <?= $_GET['page'] > $total_page-1 ? 'disabled' : ""?>  ">
                 <a class="page-link next"  href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=liste.modele&page='.$suivant ?>">
                      <span aria-hidden="true" class="tt">&raquo;</span>
                      <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
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

</style>
<?php  require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
