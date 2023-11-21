<?php

use BatBook\Book;
use BatBook\Exempcions\InvalidFormatException;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

include_once "load.php";
include_once "myHelpers/utils.php";
$errors = [];

try {
    $modules = \BatBook\Module::loadModulesFromFile("files/modulesbook.csv");
} catch (InvalidFormatException $e) {
    echo $e->getMessage();
}
$estados = ["new","good","used","bad"];
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    if (empty($_POST['module'])){
        $errors['module'] = 'Error el camp module es un camp requerit';
    }else{$module = $_POST['module'];}

    if (empty($_POST['publisher'])){
        $errors['publisher'] = 'Error el camp editorial es un camp requerit';
    }else{ $publisher = $_POST['publisher'];}

    if (empty($_POST['price'])){
        $errors['price'] = 'Error el camp preu es un camp requerit';
    }else{ $price = $_POST['price'];}

    if (empty($_POST['pages'])){
        $errors['pages'] = 'Error el camp pages es un camp requerit';
    }else{$pages = $_POST['pages'];}

    if (empty($_POST['status'])){
        $errors['status'] = 'Error el camp estat es un camp requerit';
    }else{ $status = $_POST['status'];}

    if (!empty($_POST['comments'])){
         $comments = $_POST['comments'];
    }else{
        $comments = "";
    }

    if ($_FILES['photo']['type']!= 'image/png'){
        $errors['photo'] = 'Error el camp foto a de ser format png';
    }
    if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
        // subido con éxito
        $nombre = $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], "./views/books/uploads/{$nombre}");
        $photo = "<img src=uploads/$nombre>";
    }
    try {
        if (count($errors)) {
            throw new Exception('Hi ha errors');
        }
    } catch (Exception $e) {
        echo $e->getMessage();
        include_once 'views/newBook.view.php';
        exit();
    }
    $idUser = $_SESSION['userId'];
    $newBook = new Book($idUser,$module,$publisher,$price,$pages,$status,$photo,$comments);
    $newBook->save();


    include_once 'myBooks.php';

}else{
    include_once 'views/newBook.view.php';
}






