<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php


$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];

$tblDatos = null;
$servidor = "localhost";
$usuario ="root";
$clave ="";
$sql="";

    try {
        $conn = new PDO ("mysql:host=$servidor;dbname=pufosa;charset=utf8",$usuario,$clave);

        //asignamos el modo excepción
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql= "SELECT empleado_ID FROM empleados where empleado_ID LIKE :ide";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':ide',$usuario);
        $stmt->execute();
        $registros=$stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if(count($registros)>=0){
            header("locale:../index.html");
        }else {
            
        }
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    $conn=null;


?>
</head>
<body>
    <h1>funciona</h1>
</body>
</html>