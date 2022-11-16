<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>


<form method="post" >
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
    <?php
require "conexión.php";

$conn=conectar();
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



//-----------------COMPROBACIÓN DEL LOGIN-----------------

if (isset($_POST['btnEnviar'])){
    $nombre=$_POST['user'];
    $contraseña=strtolower($nombre);
    
    $sql = "SELECT * FROM alumnos where NOMBRE = '$nombre';";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $registros=$stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if($registros==null){
        $msg="Identificación incorrecta ";
        echo $msg;
        $archivo = fopen("registrosLogin.txt","a+b");
        $sentenciaEscritura= $msg . time() . date("d M y") . " \n ";
        fwrite($archivo, $sentenciaEscritura );    
        rewind($archivo);
    }else {

        $result=$conn->query($sql);
        $num=$result->fetch();
        $num=strtolower($num['NOMBRE']);
        if ($num==$contraseña){
            
            echo "<p>Bienvenid@ " . $nombre. " </p>";

        }else {
            echo "contraseña incorrecta";
        }
    }

}else{

    
    $conn=null;
}

?>
</body>
</html>