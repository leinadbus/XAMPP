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
        $sql="SELECT * FROM ALUMNOS WHERE NOMBRE LIKE :nom;";  //No me fio de estas mayúsculas

        $stmt = $conn->prepare($sql);
        $nombre="%".$_POST['nombre']."%";
        $stmt->bindParam(':nom',$nombre);
        $stmt->execute();
        $registros=$stmt->fetchAll(PDO::FETCH_ASSOC);

        //Comprobamos si ha encontrado los registros
        if(count($registros)>0){
            echo "<h2>Alumn@s encontrados que contienen en el nombre: '" . $_POST['nombre'] . "'</h2>";
            echo "<ul>";
            foreach($registros as $fila){
                echo "<li>código: " . $fila["CODIGO"] . ", Nombre: " . $fila["NOMBRE"] . " " . $fila["APELLIDOS"] . ", Teléfono: " . $fila["TELEFONO"] . 
                ", correo electrónico: " . $fila["CORREO"] . "</li>";
            }
            echo "</ul><br>";
            echo "<p><a href='buscar.html'>Buscar otro alumno</a></p>";
            echo "<p><a href='index.html'>Volver a inicio</a></p>";

        }else {
            echo "No se ha encontrado ningún alumn@ que contenga '".$_POST['nombre']."' en su nombre <br>";
            echo "<p><a href='buscar.html'>Buscar otro alumno</a></p>";
            echo "<p><a href='index.html'>Volver a inicio</a></p>";
            $msg="No se ha encontrado ningún alumn@ que contenga ".$_POST['nombre']." en su nombre";
        }
    } catch (PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    $conn=null;
}

?>