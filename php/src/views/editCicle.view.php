<?php
include_once 'accesos.view.php'?>

<!DOCTYPE html>
<html>
<head>
    <title>Detalles del Objeto</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .error {
            color: red;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .error {
            color: red;
        }
        button[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<form action="../editCicle.php?id=<?php echo $idCourse ?>" method="post" enctype="multipart/form-data">

    <div>
        <label for="publisher">Cycle:</label>
        <input type="text" id="publisher" name="publisher" value="<?php echo $cicle->getCycle(); ?>">
        <span class="error"><?=printError($errors,'publisher')?></span>
    </div>
    <div>
        <label  for="price">Vliteral:</label>
        <input type="text" id="price" name="price" value="<?php echo $cicle->getVliteral(); ?>" maxlength="99">
        <span class="error"><?=printError($errors,'price')?></span>
    </div>
    <div>
        <label for="pages">Cliteral:</label>
        <input type="text" id="pages" name="pages" value="<?php echo $cicle->getCliteral(); ?>" maxlength="99">
        <span class="error"><?=printError($errors,'pages')?></span>
    </div>

        <button type="submit">Donar d'alta</button>
    </div>
</form>


</body>
</html>