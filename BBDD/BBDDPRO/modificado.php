<?php
$msg="";
if(isset($_POST['btnodificar'])){
    $servidor = "localhost";
    $usuario="root";
    $clave= "";

    try{
        $conn = new PDO ("mysql:host=$servidor;dbname=mibbdd;charset=utf8",$usuario,$clave);
        //asignamos el modo excepcion
        $conn->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE ALUMNOS SET NOMBRE=:nom, APELLIDOS=:ape, TELEFONO=:tel, CORREO=:correo WHERE codigo=:cod";
        $stmt = $CONN->prepare($sql);
        $stms->bindParam(':nom', $_POST['nombre']);
        $stms->bindParam(':ape',$_POST['apellidos']);
        $stms->bindParam(':tel',$_POST['telefono']);
        $stms->bindParam(':correo',$_POST['correo']);
        $stms->bindParam(':cod',$_POST['codigo']);
        if($stmt->execute())
            $msg="El alumn@ se ha Actualizado correctamente";
        
    }catch (PDOException $e){
    echo "Error: " . $e->getMessage();
}
$conn=null;
} else {
    $msg="Hay algún error en los datos a modificar ";
}
?>