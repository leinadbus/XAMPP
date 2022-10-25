<?php
$tblDatos = null;
$servidor = "localhost";
$usuario ="root";
$clave ="";
$sql="";

if(isset($_POST['btnEnviar'])) {
    try {
        $conn = new PDO ("mysql:host=$servidor;dbname=mibbdd;charset=utf8"),$usuario,$clave;

        //asignamos el modo excepción
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO ALUMNOS (nombre, apellidos, telefono, correo)" . "VALUES (:nom, :ape, :tel, :cor";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nom', $_POST['nombre']);
            $stmt->bindParam(':ape', $_POST['apellidos']);
            $stmt->bindParam(':tel', $_POST['telefono']);
            $stmt->bindParam(':cor', $_POST['mail']);
            $stmt->execute();

            echo "Se han introducido los datos correctamente en la Base de Datos";
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    $conn=null;
}

?>