<?php
$tblDatos = null;
$servidor = "localhost";
$usuario ="root";
$clave ="";
$sql="";

if(isset($_POST['btnEnviar'])) {
    try {
        $conn = new PDO ("mysql:host=$servidor;dbname=mibbdd;charset=utf8",$usuario,$clave);

        //asignamos el modo excepción
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Método que previene si el dato ya está en la base de datos
        $sql="SELECT COUNT(*) AS 'cantidad' FROM ALUMNOS WHERE correo='".$_POST['mail']."';";
        $result=$conn->query($sql);
        $num=$result->fetch();
        if($num['cantidad']>0){
            echo "Alumno ya matriculado, no es posible dar de alta<br>";
            echo "<p><a href='index.html'>Volver</a></p>";

        }else{

            //else introducimos los datos
            $sql="INSERT INTO ALUMNOS (nombre, apellidos, telefono, correo) VALUES (:nom, :ape, :tel, :cor)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nom', $_POST['nombre']);
            $stmt->bindParam(':ape', $_POST['apellidos']);
            $stmt->bindParam(':tel', $_POST['telefono']);
            $stmt->bindParam(':cor', $_POST['mail']);
            $stmt->execute();

            echo "Se han introducido los datos correctamente en la Base de Datos";

            echo "<p><a href='index.html'>Volver</a></p>";
        }
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    $conn=null;
}

?>