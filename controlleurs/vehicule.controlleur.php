<?php 


if ($_SERVER['REQUEST_METHOD']=='GET') {
    if (isset($_GET['views'])) {
      if ($_GET['views']=='liste.vehicule') {
        require(ROUTE_DIR.'views/client/liste.vehicule.html.php');
        // catalogue();
      }

    }else {
        require(ROUTE_DIR.'views/client/liste.vehicule.html.php');
        //catalogue();
    }
    
}
?>