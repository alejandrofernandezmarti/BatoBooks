<?php use BatBook\Module; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Mis libros</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        /* Estilos para la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Estilos para las filas impares */
        tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        /* Estilos para las filas pares */
        tr:nth-child(even) {
            background-color: #ffffff;
        }

        /* Estilos para el encabezado de la tabla */
        th {
            background-color: #333;
            color: #fff;
        }

        /* Estilos para las celdas cuando se pasa el ratón por encima */
        tr:hover {
            background-color: #e6e6e6;
        }

    </style>
</head>
<body>
<table>
    <tr>
        <th>IdUser</th>
        <th>Editorial</th>
        <th>Precio</th>
        <th>Paginas</th>
        <th>Estado</th>
        <th>Foto</th>
        <th>Nombre módulo</th>
        <th>Fecha de Venta</th>
    </tr>

    <?php
    foreach ($books as $book) {
        $module = Module::getModuleById($book->getIdModule())[0];?>
        <tr>
            <td><?php echo $book->getIdUser(); ?></td>
            <td><?php echo $book->getPublisher(); ?></td>
            <td><?php echo $book->getPrice(); ?></td>
            <td><?php echo $book->getPages(); ?></td>
            <td><?php echo $book->getStatus(); ?></td>
            <td><?php echo $book->getPhoto(); ?></td>
            <td><?php echo $module->getCliteral(); ?></td>
            <td>
                <div class="botones">
                    <button class="add">
                        <a href="views/showBook.view.php?id=<?php echo $book->getId()?>"><span class="material-icons">visibility</span></a>

                    </button>
                    <button class="edit">
                        <a href="editBook.php?id=<?php echo $book->getId()?>"><span class="material-icons">edit</span></a>

                    </button>
                    <button class="delete">
                        <a href="deleteBook.php?id=<?php echo $book->getId()?>"><span class="material-icons">delete</span></a>
                    </button>
                </div>
            </td>
        </tr>
    <?php } ?>
</table>

</body>
</html>