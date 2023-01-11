<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>LOGIN</h1>

<form method="post" >
        <fieldset>
            <legend>Inicio Sesión</legend>

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
    
    $usuario=$_POST['user'];
    $contraseña=$_POST['contraseña'] ;

    $sql="SELECT * from usuarios WHERE  usuario LIKE :A ";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':A',$usuario);
    $stmt->execute();
    $registros=$stmt->fetchAll(PDO::FETCH_ASSOC);

    //Comprobamos si ha encontrado los registros
    if(count($registros)>0){
        echo "usuario existente <br/>";
        foreach($registros as $fila){
            if (password_verify($contraseña,$fila['contraseña']) ){
                echo "contraseña válida";
            }else {
                echo "fallo en la contraseña";
            }
        }
    }
}
$conn=null;

?>
</body>
</html>