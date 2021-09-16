<?php  require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>

<div class="container jjjj">
<div class="row mt-5 ">
        <?php 
         for($i=0;$i<3;$i++): ?>
        <div class="col-sm-4  mb-4">
          <div class="card " style="width: 22rem">
            <a href="">
                <img
                class="card-img-top cloudzoom" 
                src="<?=WEB_ROUTE.'img/720.png'?>"
                alt="Annonce 1" data-cloudzoom = "zoomImage: 'big720.png'" 
                />
            <!--     <figure class="zoom" onmousemove="zoom(event)" style="background-image: url(<?=WEB_ROUTE.'img/720.png'?>);">
  <img src="<?=WEB_ROUTE.'img/720.png'?>" />
</figure> -->
            </a>
            <style>
               .jjjj{
        margin-top: 18%;
   
    
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
    .card {
        background: #000;
    }
              figure.zoom {
  background-position: 50% 50%;
  position: relative;
  width: 450px;
  overflow: hidden;
  cursor: zoom-in;
  background-repeat: no-repeat;
  background-size: auto;
}
figure.zoom img:hover {
  opacity: 0;
}
figure.zoom img {
  transition: opacity 0.5s;
  display: block;
  width: 85%;
}
            </style>
            <script>
              function zoom(e) {
  var zoomer = e.currentTarget;
  e.offsetX ? (offsetX = e.offsetX) : (offsetX = e.touches[0].pageX);
  e.offsetY ? (offsetY = e.offsetY) : (offsetX = e.touches[0].pageX);
  x = (offsetX / zoomer.offsetWidth) * 100;
  y = (offsetY / zoomer.offsetHeight) * 100;
  zoomer.style.backgroundPosition = x + "% " + y + "%";
}

            </script>
            <div class="card-body ">
              <h5 class="card-title">
                  <p class=" text-white"> Luxury
                    Mercedes Classe S 350	
                 </p>
               <!--  <span class="badge badge-warning"><?=$bien['type_bien']?>
                 </span> -->
                <span class="badge badge-warning"><?=$bien['prix_bien']." CFA"?>67890</span>
              </h5>
              <hr />
              <span class="float-left btn btn-sm text-center disabled"
                ></span
              >
           
          
              <a href="<?= WEB_ROUTE?>" class="btn btn-sm btn-outline-danger float-right"
                >Annuler</a
              >
            </div>
          </div>
        </div>
        <?php endfor ?>
        </div> 
      <div class="row text-center">
        <div class="col-sm-4 offset-sm-4 ">
          <ul class="pagination pl-4 ">
              <li class="page-item disabled">
                <a class="page-link" href="#">&laquo;</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">4</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">5</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">&raquo;</a>
              </li>
            </ul>
        </div>
      </div> 
  

</div>

<?php  require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
