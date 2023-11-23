<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/load.php';
$_SESSION['userId'] = null;
header("Location: index.php");