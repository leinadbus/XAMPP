<?php
$tblDatos = null;
$servidor = "localhost";
$usuario ="root";
$clave ="";
$sql="";
 echo "<link rel='stylesheet' type='text/css' href='stilo.css'/>";

    try {
        $conn = new PDO ("mysql:host=$servidor;dbname=mibbdd;charset=utf8",$usuario,$clave);

        //asignamos el modo excepción
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql= "SELECT * FROM alumnos ";

        echo "<table  border=1px >";
        
        foreach (($conn->query($sql)) as $row){
           echo "
            <tr>
                <td>".$row['NOMBRE']. " </td>
                <td>".$row['APELLIDOS']. " </td>
                <td>".$row['TELEFONO']. " </td>
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