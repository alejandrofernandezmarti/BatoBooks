<?php
include 'app/QueryBuilder.php';
include 'app/Book.php';
include_once "load.php";

$idCourse = $_GET['id'];
\BatBook\QueryBuilder::delete(\BatBook\Course::class,$idCourse);
header('Location: cicles.php');
exit;



