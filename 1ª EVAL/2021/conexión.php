<?php

function conectar (){
    $tblDatos = null;
$servidor = "localhost";
$usuario ="root";
$clave ="";
$sql="";
try {
        $conn = new PDO ("mysql:host=$servidor;dbname=mibbdd;charset=utf8",$usuario,$clave);
        //asignamos el modo excepción
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo "No conecta la base";
        echo "Error: " . $e->getMessage();
    }
    return $conn;
}
    ?>