<?php include_once '../app/QueryBuilder.php';
include_once '../app/Book.php';
include_once 'header.view.php'?>

<!DOCTYPE html>
<html>
<head>
    <title>Detalles del Objeto</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">

    <?php $idBook = $_GET['id'];
    $book = \BatBook\QueryBuilder::find(\BatBook\Book::class,$idBook)     ?>
    <h1>Detalles del Objeto</h1>
    <div class="details">
        <div class="detail">
            <span class="label">Id de Usuario:</span>
            <span class="value" ><?php echo $book->getIdUser(); ?></span>
        </div>
        <div class="detail">
            <span class="label">ID del Módulo:</span>
            <span class="value"><?php echo $book->getIdModule(); ?></span>
        </div>
        <div class="detail">
            <span class="label">Editorial:</span>
            <span class="value"><?php echo $book->getPublisher(); ?></span>
        </div>
        <div class="detail">
            <span class="label">Precio:</span>
            <span class="value">$<?php echo $book->getPrice(); ?></span>
        </div>
        <div class="detail">
            <span class="label">Páginas:</span>
            <span class="value"><?php echo $book->getPages(); ?></span>
        </div>
        <div class="detail">
            <span class="label">Estado:</span>
            <span class="value"><?php echo $book->getStatus(); ?></span>
        </div>
        <div class="detail">
            <span class="label">Foto:</span>
            <span class="value"><img src="<?php echo $book->getPhoto(); ?>" alt="Foto"></span>
        </div>
        <div class="detail">
            <span class="label">Comentarios:</span>
            <span class="value"><?php echo $book->getComments(); ?></span>
        </div>
        <div class="detail">
            <span class="label">Fecha de Venta:</span>
            <span class="value"><?php echo $book->getSoldDate(); ?></span>
        </div>
    </div>
</div>
</body>
</html>

