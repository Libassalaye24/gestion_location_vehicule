<?php 

if ($_SERVER['REQUEST_METHOD']=='GET') {
    if (isset($_GET['views'])) {
       if ($_GET['views']=='mes.reservations') {
        require(ROUTE_DIR.'views/reservation/mes.reservations.html.php');
       }elseif ($_GET['views']=='liste.reservations') {
        require(ROUTE_DIR.'views/reservation/liste.reservations.html.php');
       }

    }else{
           /*  require(ROUTE_DIR.'views/security/connexion.html.php'); */
        }
}
?>