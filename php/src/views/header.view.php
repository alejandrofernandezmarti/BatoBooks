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
    <div id="nav-buttons">
        <button><a href="../logout.php">Logout</a></button>
        <button><a href="../newBook.php">New Book</a></button>
        <button><a href="../myBooks.php">My books</a></button>
    </div>
</div>
</body>
</html>



