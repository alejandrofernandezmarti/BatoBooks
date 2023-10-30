<?php
include_once "load.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['inputUsuario'];
    $password = $_POST['inputPassword'];

    // validamos que recibimos ambos parámetros
    if (empty($usuario) || empty($password)) {
        $error = "Debes introducir un usuario y contraseña";
        include "views/login.view.php";
    } else {
        $users = unserialize($_SESSION['users']);
        foreach ($users as $user){
            if ($usuario == $user->getNick() && $password == $user->getPassword()){
                $nick = $user->getNick();
                $email = $user->getEmail();

                // almacenamos el usuario en la sesión

                $_SESSION['userLoged'] = $usuario;
                // cargamos la página principal

                include_once "views/header.view.php";
                include "views/index.view.php";
                return;
            }
        }
        // Si las credenciales no son válidas, se vuelven a pedir
        $error = "Usuario o contraseña no válidos!";
        include "views/login.view.php";

    }
}else{
    $error = "";
    include_once "views/login.view.php";
}