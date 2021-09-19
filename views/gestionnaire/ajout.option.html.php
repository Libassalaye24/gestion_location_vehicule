<?php  require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>
<div class="container">
    <div class="row jjj">
         <div class="col-md-12">
            <h3 class="section-title font-weight-light text-white mb-4">
                <span class="headline">Parametrage Categorie</span>
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
         <table class="table border border-warning">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col" class="text-white">First</th>
                <th scope="col" class="text-white">Last</th>
                <th scope="col" class="text-white">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td class="text-white">Mark</td>
                <td class="text-white">Otto</td>
                <td class="text-white">@mdo</td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td class="text-white">Jacob</td>
                <td class="text-white">Thornton</td>
                <td class="text-white">@fat</td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td class="text-white">Larry</td>
                <td class="text-white">the Bird</td>
                <td class="text-white">@twitter</td>
                </tr>
            </tbody>
            </table>
    </div>
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
