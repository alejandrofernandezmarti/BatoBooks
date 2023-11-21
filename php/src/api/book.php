<?php

 include ("../load.php");

use BatBook\Book;
use BatBook\Exempcions\NotFoundException;


try {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])){
        throw new NotFoundException("No es numerico o no ha introduit res");
    }

    $id = intval($_GET["id"]);
    $book = Book::find($id);
     if (!isset($book)){
       throw new NotFoundException("No se ha encontrado el libro");}

    header('Content-Type: application/json');
    echo $book->toJSON();

}catch (NotFoundException){
    header('HTTP/1.1 404 Not Found');
}