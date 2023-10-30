<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulari de Registre</title>
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
        fieldset {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
        }
        legend {
            font-weight: bold;
            font-size: 20px;
        }
        .fila {
            margin: 10px 0;
        }
        label {
            display: block;
            margin-top: 5px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<form action='../login.php' method='post'>
  <fieldset>
    <legend>Login</legend>
    <div><span class='error'><?php echo $error; ?></span></div>
<div class='fila'>
    <label for='usuario'>Usuario:</label><br />
    <input type='text' name='inputUsuario' id='usuario' maxlength="50" /><br />
</div>
<div class='fila'>
    <label for='password'>Contraseña:</label><br />
    <input type='password' name='inputPassword' id='password' maxlength="50" /><br />
</div>
<div class='fila'>
    <input type='submit' name='enviar' value='Enviar' />
</div>
</fieldset>
</form>
</body>
</html>