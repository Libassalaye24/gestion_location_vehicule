<?php
        if (isset($_REQUEST['controlleurs'])) {
            if ($_REQUEST['controlleurs'] == 'security') {
                require_once(ROUTE_DIR.'controlleurs/security.controlleur.php');
            }elseif ($_REQUEST['controlleurs'] == 'vehicule') {
                require_once(ROUTE_DIR.'controlleurs/vehicule.controlleur.php');
            }elseif ($_REQUEST['controlleurs'] == 'reservation') {
                require_once(ROUTE_DIR.'controlleurs/reservation.controlleur.php');
            }else{
                require_once(ROUTE_DIR.'views/security/connexion.html.php');
            
            }
        }else {
            require_once(ROUTE_DIR.'controlleurs/vehicule.controlleur.php');
        }
    ?>