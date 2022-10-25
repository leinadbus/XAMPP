<?php
$msg="";
if (isset($_POST['btnEnviar'])){
    $servidor= "localhost";
    $usuario="root";
    $clave="";

    //Comprobamos si nos ha llegado el datoa buscar
    try{
        $conn = new PDO ("mysql:host=$servidor;dbname=mibbdd;charset=utf8",$usuario,$clave);
        // asignamos el modo excepcion
        
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="SELECT CODIGO FROM ALUMNOS WHERE codigo=:cod;";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':cod',$_POST['codigo']);
        $stmt->execute();
        $registros = $stmt->fetch(PDO::FETCH_ASSOC);
        if($registros>0){
            $sql = "DELETE FROM ALUMNOS WHERE codigo=:cod";
            $stmt=$conn->prepare($sql);
            $stmt->bindParam(':cod',$_POST['codigo']);
            $stmt->execute();
            echo "Alumn@ eliminado correctamente de la BD";
            $msg="El alumn@ se ha eliminado correctamente";
            echo "<p><a href='borrar.html'>Borrar otro alumno</a></p>";
            echo "<p><a href='index.html'>Volver a inicio</a></p>";
        }else{
            echo "El alumn@ a borrar NO existe en la BD";
            $msg="El alumn@ a borrar NO existe en la BD";
            echo "<p><a href='borrar.html'>Borrar otro alumno</a></p>";
            echo "<p><a href='index.html'>Volver a inicio</a></p>";
        }

    } catch (PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    $conn=null;
}else {
    echo "Se necesita introducit un código a borrar";
    $msg="Se necesita introducit un código a borrar";
    echo "<p><a href='borrar.html'>Introducir otro codigo</a></p>";
    echo "<p><a href='index.html'>Volver a inicio</a></p>";

}

?>