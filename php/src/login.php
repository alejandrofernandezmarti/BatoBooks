<?php

use BatBook\Exempcions\InvalidEmailException;
use BatBook\Exempcions\PasswordDoNotMatchException;
use BatBook\Exempcions\RequiredFieldException;
use BatBook\User;

include_once "load.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
    $email = $_POST['inputUsuario'] ?? '';
    if (empty($email)) {
        throw new RequiredFieldException("El camp Email és obligatori.");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new InvalidEmailException("L'email proporcionat no és vàlid.");
    }

    // Validar contrasenyes
    $password = $_POST['inputPassword'] ?? '';
    if (empty($password)) {
        throw new RequiredFieldException("La contrasenya és obligatòria.");
    }

    $user = User::login($email,$password);

    // Intentar crear una nova instància de User
    if (!$user){
        throw new PasswordDoNotMatchException("Usuari o contrasenya Incorrectes");
    }


    $_SESSION['userId'] = $user->getId();
        include_once "views/header.view.php";
        include "views/index.view.php";
        return;
    } catch (RequiredFieldException | InvalidEmailException | PasswordDoNotMatchException  $e) {
        // Capturar les excepcions i mostrar missatges d'error
        echo $e->getMessage();
        exit;
    }

}else{
    $error = "";
    include_once "views/login.view.php";
}