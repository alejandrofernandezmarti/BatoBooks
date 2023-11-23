<?php
include_once "load.php";

if(isset($_SESSION['userId'])){
    $user = \BatBook\QueryBuilder::find(\BatBook\User::class,$_SESSION['userId']);
    include_once "views/header.view.php";
    include_once "views/index.view.php";
}else{
    include_once "views/toRegister.view.php";
}