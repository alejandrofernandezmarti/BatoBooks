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
$infoUsers = [];
$infoUsers[0] = new \BatBook\User("alejandroonil@hotmail.es","1234AAaa","Alejandro");
$infoUsers[1] = new \BatBook\User("arturo@hotmail.es","1234BBbb","Arturito");
$infoUsers[2] = new \BatBook\User("ethan@hotmail.es","1234CCcc","Ethan");


$users = isset($_SESSION["users"])? unserialize($_SESSION["users"]) : [];
if (isset($_SESSION["userLoged"])){
    $userLoged = $_SESSION["userLoged"];
}
$books = isset($_SESSION["books"])? unserialize($_SESSION["books"]) : [];
    $modules = isset($_SESSION["modules"])? unserialize($_SESSION["modules"]) : Module:: getModulesInArray();;
    $courses = isset($_SESSION["courses"]) ? unserialize($_SESSION["courses"]) : Course::loadCoursesFromFile('./files/coursesbook.csv');
$statuses = isset($_SESSION["statuses"])? unserialize($_SESSION["statuses"]) : [];


$_SESSION["users"] = serialize($infoUsers);
$_SESSION["books"] = serialize($books);
$_SESSION["modules"] = serialize($modules);
$_SESSION["courses"] = serialize($courses);
$_SESSION["statuses"] = serialize($statuses);



