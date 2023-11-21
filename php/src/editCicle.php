<?php use BatBook\Book;
use BatBook\Exempcions\InvalidFormatException;

include 'app/QueryBuilder.php';
include 'app/Book.php';
include_once "load.php";
include_once "myHelpers/utils.php";

$idCourse = $_GET['id'];
$cicle = \BatBook\QueryBuilder::find(\BatBook\Course::class,$idCourse);


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors=[];


    if (empty($_POST['publisher'])){
        $errors['publisher'] = 'Error el camp editorial es un camp requerit';
    }else{ $publisher = $_POST['publisher'];}

    if (empty($_POST['price'])){
        $errors['price'] = 'Error el camp preu es un camp requerit';
    }else{ $price = $_POST['price'];}

    if (empty($_POST['pages'])){
        $errors['pages'] = 'Error el camp pages es un camp requerit';
    }else{$pages = $_POST['pages'];}



    try {
        if (count($errors)) {
            throw new Exception('Hi ha errors');
        }
    } catch (Exception $e) {
        echo $e->getMessage();
        include_once 'views/editBook.view.php';
        exit();
    }


    $values['cycle'] =$publisher;
    $values['vliteral'] = $price;
    $values['cliteral'] = $pages;

    \BatBook\QueryBuilder::update(\BatBook\Course::class,$values,$idCourse);
    header('Location: cicles.php?');
    exit;
}else{
    $errors='';
    include_once 'views/editCicle.view.php';
}
?>