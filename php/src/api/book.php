<?php

include ("../autoload.php");

use BatBook\Book;
use BatBook\Exempcions\NotFoundException;


$books = [
    1 => new Book(1, 'MOD101', 'Publisher', 29.99, 200, 'Available', 'image.jpg', 'Great book!')
];

try {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])){
        throw new NotFoundException("No es numerico o no ha introduit res");
    }

    $id = intval($_GET["id"]);
    if (!isset($books[$id])){
        throw new NotFoundException("No se ha encontrado el libro");
    }

    header('Content-Type: application/json');
    echo $books[$id]->toJSON();

}catch (NotFoundException){
    header('HTTP/1.1 404 Not Found');
}