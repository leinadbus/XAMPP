<?php
//conprobamos si ha escrito algo en el campo del formulario de la página
$msg="";
$datosCorrectos=false;
if (isset($_POST['codigo'])){
    $servidor = "localhost";
    $usuario = "root";
    $clave= "";

    try{
        $conn = new PDO ("mysql:host=$servidor;dbname=mibbdd;charset=utf8",$usuario,$clave);
        //asignamos el modo excepcion
        $conn->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM ALUMNOS WHERE codigo=:cod;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':cod',$_POST['codigo']);
        $stmt->execute();
        $reg = $stmt->fetch(PDO::FETCH_ASSOC);
        //si lo encuentra pinta un formulario para intoducir 
        if($reg<=0){
            $msg= "El alumno a modificar NO existe en la BD";
            $daosCorrectos=false;
        }else
            $datosCorrectos=true;
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    $conn= null;
}

?>