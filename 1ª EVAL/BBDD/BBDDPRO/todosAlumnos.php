<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' type='text/css' href='stilo.css'/>

</head>
<body>
<?php
$tblDatos = null;
$servidor = "localhost";
$usuario ="root";
$clave ="";
$sql="";

    try {
        $conn = new PDO ("mysql:host=$servidor;dbname=mibbdd;charset=utf8",$usuario,$clave);

        //asignamos el modo excepción
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql= "SELECT * FROM alumnos ";

        echo "<table border=1>";
        echo "<th>Nombre</th>
        <th>Apellidos</th>
        <th>Telefono</th>
        <th>Correo</th>";
        
        foreach (($conn->query($sql)) as $row){
           echo "
            <tr>
                <td>".$row['NOMBRE']. " </td>
                <td>".$row['APELLIDOS']. " </td>
                <td>".$row['TELEFONO']. " </td>
                <td>".$row['CORREO']. " </td>
            </tr>
           " ;
        }
        echo "</table>";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo "<p><a href='index.html'>Volver</a></p>";
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    $conn=null;


?>
</body>

</html>