
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
        <th>Id course</th>
        <th>Cycle</th>
        <th>Vliteral</th>
        <th>Cliteral</th>
    </tr>

    <?php
    foreach ($cicles as $cicle) {
        ?>
        <tr>
            <td><?php echo $cicle->getId(); ?></td>
            <td><?php echo $cicle->getCycle(); ?></td>
            <td><?php echo $cicle->getVliteral(); ?></td>
            <td><?php echo $cicle->getCliteral(); ?></td>
            <td>
                <div class="botones">
                    <button class="add">
                        <a href="showCicle.php?id=<?php echo $cicle->getIdFamily()?>"><span class="material-icons">visibility</span></a>

                    </button>
                    <button class="edit">
                        <a href="editCicle.php?id=<?php echo $cicle->getId()?>"><span class="material-icons">edit</span></a>

                    </button>
                    <button class="delete">
                        <a href="deleteCicle.php?id=<?php echo $cicle->getId()?>"><span class="material-icons">delete</span></a>
                    </button>

                </div>
            </td>
        </tr>
    <?php } ?>
</table>

</body>
</html>