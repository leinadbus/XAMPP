<?php
include "login.php";


//Prueba de consula de datos con formato de tablas::::

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

//Preparación de consultas:::
//$primerValor= "J";
//$segundoValor= "alumnos";
$stmt = $conn->prepare("SELECT * FROM ALUMNOS");
//$stmt->bindParam(1, $primerValor);
//$stmt->bindParam(2, $segundoValor);
$stmt->execute();




?>