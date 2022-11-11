<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         body {
            margin: 0 auto;
    text-align: center;
    font-size:90%;
    width: 20%;
    height: 20%;
            }

    </style>

    </style>

</head>
<body>
    <form method="get" action="administrador/menu.php">
        <fieldset>
            <legend>Inicio Sesión</legend>
<label for="user">Usuario</label>
<input type="text" name="user" required>
<label for="contraseña">Contraseña</label>
<input type="text" name="contraseña" required>
<input type="submit" name="btnEnviar" >

</fieldset>
<p><?php echo $_GET['msg']?? '' ?></p>
    </form>
</body>
</html>