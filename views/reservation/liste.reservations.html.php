<?php  require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>
jjjjjjjjjjjjjjj
<div class="container jjj">
<div class="row mt-5 ">
            <div class="col-md-offset-3">
                <form action="" class="form-inline" method="post">
                    <input type="hidden" name="controlleurs" value="reservation">
                    <input type="hidden" name="action" value="reservations">
                    <div class="form-group">
                      <label for="" class="text-white">Date</label>
                      <input type="date" name="date" id="" class="form-control ml-3  bg-secondary" placeholder="" aria-describedby="helpId">
                      <small id="helpId" class="text-muted"></small>
                    </div>
                    <div class="form-group ml-5">
                    <div class="form-group">
                      <label for="" class="text-white ">Etat</label>
                      <select class="form-control ml-3 bg-secondary" name="etat_reservation" id="">
                        <option value="valider">Valider</option>
                        <option value="annuler">Annuler</option>
                        <option selected value="en_cours">En cours</option>
                      </select>
                    </div>
                    </div>
                    <button type="submit" name="valider" class="btn btn-warning ml-5">Chercher</button>
                    
                </form>
            </div>
        </div>
 <div class="row mt-5">
 
<table class="table  shadow mb-3 border ">
  <thead class="thead bg-warning">
    <tr>
      <th  scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" class="text-warning">1</th>
      <td class="text-white">Mark</td>
      <td class="text-white">Otto</td>
      <td class="text-white">@mdo</td>
    </tr>
    <tr>
      <th scope="row" class="text-warning">2</th>
      <td class="text-white">Jacob</td>
      <td class="text-white">Thornton</td>
      <td class="text-white">@fat</td>
    </tr>
    <tr>
      <th scope="row" class="text-warning">3</th>
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
        margin-top: 17%;
    }
</style>
<?php  require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>


