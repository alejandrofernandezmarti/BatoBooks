<?php

use BatBook\Exempcions\NotFoundException;
use BatBook\User;

include "../load.php";

try {
    $user = User::login($_POST['email'],$_POST['password']);

    if (!$user){
        throw new NotFoundException("Credenciales no validas");
    }

    header('Content-Type: application/json');
    echo $user->toJson();

}catch (NotFoundException){
    header('HTTP/1.1 404 Not Found');
}
