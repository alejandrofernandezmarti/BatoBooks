<?php
include_once "load.php";
include_once "views/accesos.view.php";
if (!isset($_SESSION['last_visit'])) {
    $_SESSION['last_visit'] =  "Benvingut/uda per primera vegada";
}

// Actualiza la fecha y hora de la última visita
$_SESSION['last_visit'] = "Benvingut/uda, la teua darrera visita va ser el:". date('Y-m-d H:i:s');
?>