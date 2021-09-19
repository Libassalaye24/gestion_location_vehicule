<?php 

if ($_SERVER['REQUEST_METHOD']=='GET') {
   if (est_connect()) {
    if (isset($_GET['views'])) {
        if ($_GET['views']=='mes.reservations') {
         require(ROUTE_DIR.'views/reservation/mes.reservations.html.php');
        }elseif ($_GET['views']=='liste.reservations') {
         require(ROUTE_DIR.'views/reservation/liste.reservations.html.php');
        }elseif ($_GET['views']=='ajout.reservation') {
            require(ROUTE_DIR.'views/reservation/ajout.reservation.html.php');
        }
 
     }else{
          require(ROUTE_DIR.'views/client/liste.vehicule.html.php');
     }
   }else {
       header("location:".WEB_ROUTE);
   }
}
?>