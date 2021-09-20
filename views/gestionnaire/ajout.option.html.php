<?php  require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>
<div class="container">
    <div class="row jjj">
         <div class="col-md-12">
            <h3 class="section-title font-weight-light text-white mb-4">
                <span class="headline">Parametrage Options Vehicule</span>
            </h3 >
         </div>
    </div>
    <div class="row">
         <button type="button" class="btn btn-warning ml-auto mr-auto" data-toggle="modal" data-target="#exampleModalLong">
         <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
            </svg> Ajouter Option
        </button>

        <!-- Modal -->
        <div class="modal fade " id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
            <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Saisir le modele</label>
                                <input type="text" name="" id="" class="form-control" placeholder="enter le modele" aria-describedby="helpId">
                                <small id="helpId" class="text-muted"></small>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning">Save changes</button>
            </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    <div class="row mt-5">
         <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col" class="text-white">Options</th>
                <th scope="col" class="text-white">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($options as $option): ?>
                <tr>
                <td class="text-white"><?=$option['nom_option_vehicule']?></td>
                <td class="text-white">
                    <a href="#" class=" btn text-secondary border-secondary active" role="button">Archiver</a>
                    <a href="#" class="btn text-warning border-warning active" role="button">Modifier</a>
                </td>
                </tr>
              <?php endforeach ?>
            </tbody>
            </table>
    </div>
    <nav aria-label="Page navigation example ">
        <ul class="pagination justify-content-center ">
            <li class="page-item  <?=empty($_GET['page']) || ($_GET['page']==1) ? 'disabled' : ""?>">
                 <a class="page-link next"  href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=ajout.option&page='.$precedent; ?>" tabindex="-1">
                 <span aria-hidden="true" class="tt">&laquo;</span>
                 <span class="sr-only">Previous</span>
                </a>
            </li>
            <?php for($i=1;$i<=$nbrPage;$i++): ?>
                 <li class="page-item"><a class="page-link" href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=ajout.option&page='.$i; ?>"><?=$i?></a></li>
            <?php endfor ?>
            <li class="page-item  <?=$_GET['page'] > $nbrPage-1 ? 'disabled' : ""?>">
                 <a class="page-link next"  href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=ajout.option&page='.$suivant; ?>">
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
</style>
<?php  require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
