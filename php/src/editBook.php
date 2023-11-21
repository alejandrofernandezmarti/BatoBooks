<?php use BatBook\Book;
use BatBook\Exempcions\InvalidFormatException;

include 'app/QueryBuilder.php';
include 'app/Book.php';
include_once "load.php";
include_once "myHelpers/utils.php";

$idBook = $_GET['id'];
$book = \BatBook\QueryBuilder::find(\BatBook\Book::class,$idBook);
try {
    $modules = \BatBook\Module::loadModulesFromFile("files/modulesbook.csv");
} catch (InvalidFormatException $e) {
    echo $e->getMessage();
}
$estados = ["new","good","used","bad"];


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors=[];
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

    if (empty($_POST['photo'])){
        $photo = $book->getPhoto();
    }else{ $status = $_POST['status'];}

    if (!empty($_POST['comments'])){
        $comments = $_POST['comments'];
    }else{
        $comments = "";
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
        include_once 'views/editBook.view.php';
        exit();
    }
    $idUser = $_SESSION['userId'];
    $values['idUser'] = $idUser;
    $values['idModule'] = $module;
    $values['publisher'] =$publisher;
    $values['price'] = $price;
    $values['pages'] = $pages;
    $values['status'] = $status;
    $values['photo'] = $photo;
    $values['comments'] = $comments;
    \BatBook\QueryBuilder::update(Book::class,$values,$idBook);
    header('Location: myBooks.php?');
    exit;
}else{
    $errors='';
    include_once 'views/editBook.view.php';
}
?>