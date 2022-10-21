<?php
include "login.php";

$sql= "SELECT * FROM alumnos WHERE  ";

echo "<table bordercolor=black border= 1px>";

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
?>