<?php

require "../../conexión.php";

$user=$_GET['user'];
$contraseña=$_GET['contraseña'];

$conn=conectar();
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "<style>
table {
    margin: 0 auto;
    text-align: center;
    font-size:90%;
    width: 20%;
    height: 20%;
}
</style>";
   
        
        $sql= "SELECT ubicacion.GrupoRegional, departamento.Nombre , COUNT(empleados.empleado_ID)AS NumeroEmpleados , MAX(empleados.Salario) AS SalarioMaximo, MIN(empleados.Salario) AS SalarioMinimo, AVG(empleados.Salario) AS SalarioMedio FROM ubicacion,departamento,empleados WHERE ubicacion.Ubicacion_ID=departamento.Ubicacion_ID AND departamento.departamento_ID = empleados.Departamento_ID GROUP BY ubicacion.GrupoRegional, departamento.Nombre;";
        echo "<table border=1>";
        echo "<th>Grupo Regional</th>
         <th>Departamento</th>
         <th>Numero de Empleados</th>
         <th>Salario MAX</th>
         <th>Salario MIN</th>
         <th>Salario MEDIO</th>
        ";
        
        foreach (($conn->query($sql)) as $row){
           echo "
            <tr>
                <td>".$row['GrupoRegional']. " </td>
                <td>".$row['Nombre']. " </td>
                <td>".$row['NumeroEmpleados']. " </td>
                <td>".$row['SalarioMaximo']. " </td>
                <td>".$row['SalarioMinimo']. " </td>
                <td>".$row['SalarioMedio']. " </td>
                
            </tr>
           " ;
        }
        echo "</table>";
        echo "<a href='../menu.php?user=$user&contraseña=$contraseña'>Inicio</a>";
//SELECT ubicacion.GrupoRegional, departamento.Nombre , COUNT(empleados.empleado_ID)AS NumeroEmpleados , MAX(empleados.Salario) AS SalarioMaximo, MIN(empleados.Salario) AS SalarioMinimo, AVG(empleados.Salario) AS SalarioMedio FROM ubicacion,departamento,empleados WHERE ubicacion.Ubicacion_ID=departamento.Ubicacion_ID AND departamento.departamento_ID = empleados.Departamento_ID GROUP BY ubicacion.GrupoRegional, departamento.Nombre

?>