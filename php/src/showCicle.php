<?php
include_once 'load.php';
include_once 'views/accesos.view.php';
include_once 'app/QueryBuilder.php';

?>


<!DOCTYPE html>
<html>
<head>
    <title>Detalles del Objeto</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">

    <?php $idFamily = $_GET['id'];
    $familia = \BatBook\QueryBuilder::find(\BatBook\Familia::class,$idFamily)     ?>
    <h1>Detalles del Objeto</h1>
    <div class="details">
        <div class="detail">
            <span class="label">Cliteral:</span>
            <span class="value" ><?php echo $familia->getCliteral(); ?></span>
        </div>
        <div class="detail">
            <span class="label">Vliteral:</span>
            <span class="value"><?php echo $familia->getVliteral(); ?></span>
        </div>

    </div>
</div>
</body>
</html>


