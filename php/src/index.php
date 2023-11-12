<?php
include_once "load.php";

if(isset($_POST['userLoged'])){
    $nick = $userLoged->getNick();
    $email = $userLoged->getEmail();
    include_once "views/header.view.php";
    include_once "views/index.view.php";
}else{
    include_once "views/toRegister.view.php";
}