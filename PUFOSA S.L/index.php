<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        fieldset {
            width: 20%;
        }

    </style>

</head>
<body>
    <form method="post" action="administrador/menu.php">
        <fieldset>
            <legend>Inicio Sesión</legend>
<label for="usuario">Usuario</label>
<input type="text" name="usuario" required>
<label for="contraseña">Contraseña</label>
<input type="text" name="contraseña" required>
<input type="submit" name="btnEnviar" >
</fieldset>

    </form>
</body>
</html>