<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Alta Llibre</title>
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
<?php include_once "header.view.php"?>
<form action="../newBook.php" method="post" enctype="multipart/form-data">
    <div>
        <label for="module">Mòdul:</label>
        <select id="module" name="module">
            <!-- Opcions del mòdul aquí -->
            <?php
            foreach ($modules as $module){ ?>
                <option value="<?= $module->getCode() ?>" <?= $module->getCode() ==$module->getCode() ?'selected':'' ?> ><?= $module->getCliteral() ?></option>
                <?php
            }
            ?>
        </select>
        <span class="error"><?=printError($errors,'module')?></span>
    </div>
    <div>
        <label for="publisher">Editorial:</label>
        <input type="text" id="publisher" name="publisher" value="<?=$publisher??''?>">
        <span class="error"><?=printError($errors,'publisher')?></span>
    </div>
    <div>
        <label  for="price">Preu:</label>
        <input type="number" id="price" name="price" value="<?=$price??''?>">
        <span class="error"><?=printError($errors,'price')?></span>
    </div>
    <div>
        <label for="pages">Pàgines:</label>
        <input type="number" id="pages" name="pages" value="<?=$pages??''?>">
        <span class="error"><?=printError($errors,'pages')?></span>
    </div>
    <div>
        <label for="status">Estat:</label>
        <select id="status" name="status">
            <?php
            foreach ($estados as $estado){ ?>
                <option value="<?= $estado ?>" ><?= $estado?></option>
                <?php
            }
            ?>
        </select>
        <span class="error"><?=printError($errors,'status')?></span>
    </div>
    <div>
        <label for="photo">Foto:</label>
        <input type="file" id="photo" name="photo">
    </div>
    <div>
        <label for="comments">Comentaris:</label>
        <textarea id="comments" name="comments"></textarea>
    </div>
    <div>
        <button type="submit">Donar d'alta</button>
    </div>
</form>
</body>
</html>