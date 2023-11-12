<?php
include_once "load.php";

if ($_SESSION['userId']){
    $values['idUser'] = $_SESSION['userId'];
    $books = \BatBook\QueryBuilder::sql(\BatBook\Book::class,$values);
    include_once 'views/header.view.php';
    include_once 'views/myBooks.view.php';
}else{
    echo 'Tienes que iniciar sesión';
}

