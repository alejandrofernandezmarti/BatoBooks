<!DOCTYPE html>
<html>
<head>
    <title>Encabezado con Redirecciones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        #header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
        #nav-buttons {
            display: flex;
            justify-content: center;
        }
        #nav-buttons button {
            background-color: #555;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin: 5px;
        }
        #nav-buttons button a {
            text-decoration: none;
            color: #fff;
        }
    </style>
</head>
<body>
<div id="header">
    <a><?php echo $_SESSION['last_visit'] ?></a>
    <div id="nav-buttons">
        <button><a href="../index.php">Index</a></button>
        <button><a href="../numeros.php">Numeros</a></button>
        <button><a href="../sales.php">Sales</a></button>
        <button><a href="../cicles.php">Cicles</a></button>
    </div>
</div>
</body>
</html>



