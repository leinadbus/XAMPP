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
</head>
<body>
    <h1>User</h1>
    <a href="../index.php">Cerrar Sesión</a>
<p></p>
    <form method="post" >

    <fieldset>
            <legend>¿Qué quieres hacer?</legend>
    <select name="accion">
     <option value="1">Ver Tablas</option>
     <option value="2">Añadir datos</option>
     <option value="3">Editar Tablas</option>
     <option value="4">Borrar Datos</option>
    </select>
</fieldset>

<p><input type="submit" name="enviar" value="Enviar datos"></p>
</form>

<?php 
$user=$_GET['user'];
$contraseña=$_GET['contraseña'];

if (isset($_POST['enviar'])){
    switch($_POST["accion"]){
        case 1:
            header("location:../administrador/operaciones/ver.php?valor=cliente&user=$user&contraseña=$contraseña");
            break;
        case 2:
            header("location:../administrador/operaciones/añadir.php?valor=cliente&user=$user&contraseña=$contraseña");
            break;
        
        case 3:
            header("location:../administrador/operaciones/editar.php?valor=cliente&user=$user&contraseña=$contraseña&user=$user&contraseña=$contraseña");
            break;
        
        case 4:
            header("location:../administrador/operaciones/borrar.php?valor=cliente&user=$user&contraseña=$contraseña");
            break;
    }
}
?>
</body>
</html>