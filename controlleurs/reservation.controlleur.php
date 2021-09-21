<?php 

if ($_SERVER['REQUEST_METHOD']=='GET') {
   
    if (isset($_GET['views'])) {
        if ($_GET['views']=='mes.reservations') {
            show_mes_reservations();
        }elseif ($_GET['views']=='liste.reservations') {
         require(ROUTE_DIR.'views/reservation/liste.reservations.html.php');
        }elseif ($_GET['views']=='ajout.reservation') {
           show_ajout_reservation($_GET['id_vehicule']);
        }
 
     }else{
          require(ROUTE_DIR.'views/client/liste.vehicule.html.php');
     }
   
}

    function show_mes_reservations(){
         require(ROUTE_DIR.'views/reservation/mes.reservations.html.php');
    }
    function show_ajout_reservation($id_vehicule){
        $vehicule=find_vehicule_by_id($id_vehicule);
        require(ROUTE_DIR.'views/reservation/ajout.reservation.html.php');
   }
?>