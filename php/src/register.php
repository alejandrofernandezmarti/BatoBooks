<?php
include_once "app/User.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nick = $_POST['nick'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new \BatBook\User($email,$password,$nick);
    $users = $user;
    $_SESSION["userId"] = $user->save();
    $_SESSION['userLoged'] = $user;
    include_once "views/header.view.php";
    include_once "views/index.view.php";
}else{

    include_once "views/register.view.php";
}


