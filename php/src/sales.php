<?php
include_once 'load.php';
include_once "views/accesos.view.php";


use BatBook\Sales;
const ID_USER = 1;
const ID_BOOK1 = 12;
const ID_BOOK2 = 13;
const ID_BOOK3 = 14;

$sale = new Sales(ID_BOOK1,ID_USER);
$sale->save();
$sale = new Sales(ID_BOOK2,ID_USER);
$sale->save();
$sale = new Sales(ID_BOOK3,ID_USER);
$sale->save();
$sales = Sales::getSales(ID_USER);
echo count($sales);
echo "<br>";
$sale->delete();
$sales = Sales::getSales(ID_USER);
echo count($sales);
