<?php
include("autoload.php");
use BatBook\Book;
use BatBook\Course;
use BatBook\Exempcions\InvalidFormatException;
use BatBook\Module;
use BatBook\User;

$courses = array();
$books = array();
$modules = array();
$users = array();

try {
    $courses= Course::loadCoursesFromFile('./files/coursesbook.csv');
    $modules = Module::loadModulesFromFile('./files/modulesbook.csv');
} catch (InvalidFormatException $e) {
    throw new InvalidArgumentException($e);
}


$users[] = new User("alex@gmail.com","asdfghjK1","ThisNick");
$books[] = new Book(1,"0011","Barco de vapor",15.00,330,"new","noPhoto","libro");

foreach ($users as $key => $value){
    echo $value;
}
foreach ($books as $key => $value){
    echo $value;
}
