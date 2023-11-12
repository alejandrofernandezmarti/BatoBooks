<?php
include 'app/QueryBuilder.php';
include 'app/Book.php';
include_once "load.php";

$idBook = $_GET['id'];
\BatBook\QueryBuilder::delete(\BatBook\Book::class,$idBook);
header('Location: myBooks.php');
exit;


