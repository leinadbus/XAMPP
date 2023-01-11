<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Registro</h1>


<form method="post" >
        <fieldset>
            <legend>Inicio Sesión</legend>

<label for="nombre">Nombre</label>
<input type="text" name="nombre" required>

<label for="apellidos">apellidos</label>
<input type="text" name="apellidos" required>

<label for="user">Usuario</label>
<input type="text" name="user" required>

<label for="contraseña">Contraseña</label>
<input type="text" name="contraseña" required>

<input type="submit" name="btnEnviar" >

</fieldset>
    </form>
    <?php
require "conexión.php";

$conn=conectar();
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



//-----------------COMPROBACIÓN DEL LOGIN-----------------

if (isset($_POST['btnEnviar'])){
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $usuario=$_POST['user'];
    $contraseña=password_hash($_POST['contraseña'],PASSWORD_DEFAULT) ;

    $sql="INSERT INTO usuarios (nombre, apellido, usuario, contraseña) VALUES (:A,:B,:C,:D); ";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':A', $nombre);
    $stmt->bindParam(':B',$apellidos);
    $stmt->bindParam(':C', $usuario);
    $stmt->bindParam(':D',$contraseña);

    if ($stmt->execute()) {
        echo "Insertado correctamente";
    }
}
$conn=null;

?>
</body>
</html>