<?php 
   if (isset($_SESSION['arrayError'])) {
    $arrayError=$_SESSION['arrayError'];
    unset($_SESSION['arrayError']);
  }
 require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>
<div class="container">
    <div class="row jjj">
         <div class="col-md-12">
            <h3 class="section-title font-weight-light text-white mb-4">
                <span class="headline">Parametrage Categorie </span>
            </h3 >
         </div>
    </div>
    <div class="row">
         <button type="button" class="btn btn-warning ml-auto mr-auto" data-toggle="modal" data-target="#exampleModalLong">
         <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
            </svg> Ajouter categorie
        </button>

        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Formulaire d'ajout modele</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <input type="hidden" name="controlleurs" value="vehicule">
                <input type="hidden" name="action" value="add.categorie">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nom categorie</label>
                                <input type="text" name="categorie" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-muted">
                                    <?=isset($arrayError['categorie']) ? $arrayError['categorie'] : '';?>
                                </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Caution categorie</label>
                                <input type="text" name="caution" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-muted">
                                <?=isset($arrayError['caution']) ? $arrayError['caution'] : '';?>
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">prix_location_jour</label>
                                <input type="text" name="prix_jour" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-muted">
                                <?=isset($arrayError['prix_jour']) ? $arrayError['prix_jour'] : '';?>
                                </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">prix_location_kilometre</label>
                                <input type="text" name="prix_kilometre" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-muted">
                                <?=isset($arrayError['prix_km']) ? $arrayError['prix_km'] : '';?>
                                </small>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning" name="ajout.categorie">Ajouter</button>
            </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    <div class="row mt-5">
         <table class="table border bordered w-75 ml-auto mr-auto ">
            <thead>
                <tr>
                <th scope="col" class="text-warning">Nom Categorie</th>
                <th scope="col" class="text-warning">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($categories as $categorie): ?>
                <tr>
                <td class="text-white"><?=$categorie['nom_categorie']?></td>
                <td class="text-white">
                    <a name="" id="" class="btn border-secondary text-secondary " href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=archiver&id_categorie='.$categorie['id_categorie']?>" role="button">Archiver</a>
                    <a name="" data-toggle="modal" data-target="#exampleModalLong" id="" class=" btn border-warning text-warning"  href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=edit&id_categorie='.$categorie['id_categorie']?>"  role="button">Modifier</a>
                </td>
                </tr>
                <?php endforeach ?>
               
            </tbody>
            </table>
    </div>
    
    <nav aria-label="Page navigation example ">
        <ul class="pagination justify-content-center ">
            <li class="page-item  <?=empty($_GET['page']) || ($_GET['page']==1) ? 'disabled' : ""?>">
                 <a class="page-link next"  href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=ajout.categorie&page='.$precedent; ?>" tabindex="-1">
                 <span aria-hidden="true" class="tt">&laquo;</span>
                 <span class="sr-only">Previous</span>
                </a>
            </li>
            <?php for($i=1;$i<=$nbrPage;$i++): ?>
                 <li class="page-item"><a class="page-link" href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=ajout.categorie&page='.$i; ?>"><?=$i?></a></li>
            <?php endfor ?>
            <li class="page-item  <?=$_GET['page'] > $nbrPage-1 ? 'disabled' : ""?>">
                 <a class="page-link next"  href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=ajout.categorie&page='.$suivant; ?>">
                      <span aria-hidden="true" class="tt">&raquo;</span>
                      <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
  
  <!--   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
   -->  <script>
$("#.LienModal").click(function(){
    var Id=$(this).attr("rel");
        $(".modal-body").fadeIn(1000).html('<div style="text-align:center; margin-right:auto; margin-left:auto">Patientez...</div>');
        $.ajax({
            type:"POST",
            data:{Id : Id},
            url:"reponse.php",
            error:function(msg){
                $(".modal-body").addClass("tableau_msg_erreur").fadeOut(800).fadeIn(800).fadeOut(400).fadeIn(400).html('<div style="margin-right:auto; margin-left:auto; text-align:center">Impossible de charger cette page</div>');
            },
            success:function(data){
                $(".modal-body").fadeIn(1000).html(data);
            }
        });
    });
    </script>
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
/* .pagination > li > a
{
    background-color: white;
    color: #5A4181;
} */



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
<script>
    function openModal(){
         $('#exampleModalLong').modal();
    } 
    $('button').click(function(){
        $('#exampleModalLong').modal('show');
    });
   
/*     $(document).ready(function(){
    $("#submitButton").click(function(){
        $("#exampleModalLong").modal();
    });
}); */
/* $(document).ready(function(){
   $("#exampleModalLong").modal();
}); */
</script>
<?php  require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
