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


$users[] = new User("arthurdteixeira2004@gmail.com","asdfghjK1","coowboii");
$books[] = new Book(1,"0011","Anaya",1.00,5,"new","noPhoto","libro de usuario1");

foreach ($users as $key => $value){
    echo $value;
}
foreach ($books as $key => $value){
    echo $value;
}
