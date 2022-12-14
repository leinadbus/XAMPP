<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    //$pepe=$_POST[''];
    ?>
</head>
<body>
 
</body>
</html>


<?php
// LIMIT en consulta SELECT limita los resultados tiene dos parametros inicio y fin
//si quiero una página con 10 resultados 
//$tamaño_pagina=10;
//Primero un select que cuente los registros:
//$total_registros=count;
//Numero de páginas es la división entre el tamaño y el numero de registros
//$numero_paginas=resultado;
//$numeroPaginas=$count/5;

function conectar (){
    $tblDatos = null;
$servidor = "localhost";
$usuario ="root";
$clave ="";
$sql="";
try {
        $conn = new PDO ("mysql:host=$servidor;dbname=protectora_animales;charset=utf8",$usuario,$clave);
        //asignamos el modo excepción
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo "No conecta la base";
        echo "Error: " . $e->getMessage();
    }
    return $conn;
}

function contartabla(){
    try{
        $conn=conectar();
        $sql1 = "SELECT COUNT(*) from usuarios";
        $result1 = $conn->query($sql1);
        $numero=$result1->fetch();
        $count=$numero[0];
     return $count;
        
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}
function datosTablaUsuario($inicio) {
    echo "<table border=solid black 1px>
    <th colspan=11>TABLA USUARIO</th>
                <tr>
                    <td>ID</td>
                    <td>NOMBRE</td>
                    <td>APELLIDO</td>
                    <td>SEXO</td>
                    <td>DIRECCION</td>
                    <td>TELEFONO</td>
                </tr>"; 
    try{
        $conn=conectar();
        $sql1 = "SELECT COUNT(*) from usuarios";
        $result1 = $conn->query($sql1);
        $numero=$result1->fetch();
        $count=$numero[0];
     
        $sql = "SELECT * from usuarios LIMIT $inicio,5";
        $result = $conn->query($sql);
        foreach($result as $fila) {
            echo " <tr>
                <td>".$fila['id']."</td>", 
                "<td>".$fila['nombre']."</td>", 
                "<td>".$fila['apellido']."</td>", 
                "<td>".$fila['sexo']."</td>", 
                "<td>".$fila['direccion']."</td>", 
                "<td>".$fila['telefono']."</td>";
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    
}

datosTablaUsuario(5);
$numero_Filas=contartabla();
echo $numero_Filas . "pepepe";
?>