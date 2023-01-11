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
    text-align: left;
    font-size:90%;
    width: 20%;
    height: 20%;
            }
            label{
  display: inline-block;
  width: 80px;
}

form {
  width: 100%;
  max-width: 600px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

form input {
  width: 90%;
  height: 30px;
  margin: 0.5rem;
}

form button {
  padding: 0.5em 1em;
  border: none;
  background: rgb(100, 200, 255);
  cursor: pointer;
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