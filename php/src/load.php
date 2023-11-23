<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/../vendor/autoload.php';
use BatBook\Course;
use BatBook\Module;

/* spl_autoload_register(function ($nombreClase) {
    $ruta = $nombreClase . '.php';
    $ruta = str_replace("BatBook", "app", $ruta); // Sustituimos las barras
    $ruta = str_replace("\\", "/", $ruta); // Sustituimos las barras
    include_once $ruta;
});   */

session_start();



$users = isset($_SESSION["users"])? unserialize($_SESSION["users"]) : [];
if (isset($_SESSION["userLoged"])){
    $userLoged = $_SESSION["userLoged"];
}




