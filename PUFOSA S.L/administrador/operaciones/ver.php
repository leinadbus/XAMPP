<?php

$valor=$_GET['valor'];

$tblDatos = null;
$servidor = "localhost";
$usuario ="root";
$clave ="";
$sql="";

    try {
        $conn = new PDO ("mysql:host=$servidor;dbname=pufosa;charset=utf8",$usuario,$clave);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql= "SELECT * FROM $valor;";

switch($valor){
case 'cliente':
        echo "<table border=1>";
        echo "<th>CLIENTE_ID</th>
        <th>Nombre</th>
        <th>Direccion</th>
        <th>Ciudad</th>
        <th>Estado</th>
        <th>CodigoPostal</th>
        <th>CodigoDeArea</th>
        <th>Telefono</th>
        <th>Vendedor_ID</th>
        <th>Limite_De_Credito</th>
        <th>Comentarios</th>";
        
        foreach (($conn->query($sql)) as $row){
           echo "
            <tr>
                <td>".$row['CLIENTE_ID']. " </td>
                <td>".$row['nombre']. " </td>
                <td>".$row['Direccion']. " </td>
                <td>".$row['Ciudad']. " </td>
                <td>".$row['Estado']. " </td>
                <td>".$row['CodigoPostal']. " </td>
                <td>".$row['CodigoDeArea']. " </td>
                <td>".$row['Telefono']. " </td>
                <td>".$row['Vendedor_ID']. " </td>
                <td>".$row['Limite_De_Credito']. " </td>
                <td>".$row['Comentarios']. " </td>
            </tr>
           " ;
        }
        echo "</table>";

            break;

case 'departamento':
                echo "<table border=1>";
        echo "<th>departamento_ID</th>
        <th>Nombre</th>
        <th>Ubicacion_ID</th>";
        
        foreach (($conn->query($sql)) as $row){
           echo "
            <tr>
                <td>".$row['departamento_ID']. " </td>
                <td>".$row['Nombre']. " </td>
                <td>".$row['Ubicacion_ID']. " </td>
            </tr>
           " ;
        }
        echo "</table>";

            break;

case 'empleados':
                echo "<table border=1>";
        echo "<th>empleado_ID</th>
        <th>Apellido</th>
        <th>Nombre</th>
        <th>Inicial_del_segundo_apellido</th>
        <th>Trabajo_ID</th>
        <th>Jefe_ID</th>
        <th>Fecha_Contrato</th>
        <th>Salario</th>
        <th>Comision</th>
        <th>Departamento_ID</th>";
        
        foreach (($conn->query($sql)) as $row){
           echo "
            <tr>
                <td>".$row['empleado_ID']. " </td>
                <td>".$row['Apellido']. " </td>
                <td>".$row['Nombre']. " </td>
                <td>".$row['Inicial_del_segundo_apellido']. " </td>
                <td>".$row['Trabajo_ID']. " </td>
                <td>".$row['Jefe_ID']. " </td>
                <td>".$row['Fecha_contrato']. " </td>
                <td>".$row['Salario']. " </td>
                <td>".$row['Comision']. " </td>
                <td>".$row['Departamento_ID']. " </td>
            </tr>
           " ;
        }
        echo "</table>";

            break;
case 'trabajos':
                echo "<table border=1>";
        echo "<th>Trabajo_ID</th>
        <th>Funcion</th>";
        
        foreach (($conn->query($sql)) as $row){
           echo "
            <tr>
                <td>".$row['Trabajo_ID']. " </td>
                <td>".$row['Funcion']. " </td>
            </tr>
           " ;
        }
        echo "</table>";

            break;
case 'ubicacion':
                echo "<table border=1>";
        echo "<th>Ubicacion_ID</th>
        <th>Grupo Regional</th>";
        
        foreach (($conn->query($sql)) as $row){
           echo "
            <tr>
                <td>".$row['Ubicacion_ID']. " </td>
                <td>".$row['GrupoRegional']. " </td>
            </tr>
           " ;
        }
        echo "</table>";

            break;
    }
    echo "<input type='button' onclick='history.back()' name='volver atrás' value='volver atrás'>";
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    $conn=null;


?>