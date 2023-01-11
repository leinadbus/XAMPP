<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' type='text/css' href='stilo.css'/>
    
</head>
<body>
    <h1>Buscar Alumnos</h1>
    <form action="" method="post">
        <fieldset>
            <legend>Datos del alumno a buscar</legend>
            Nombre del alumno:
            <input type="text" name="nombre" required><br><br/>
            <input type="submit" name="btnEnviar" value="Buscar">
        </fieldset>
    </form>
    
    
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
        $sql="SELECT * FROM ALUMNOS WHERE NOMBRE LIKE :nom;";  //No me fio de estas mayúsctableas

        $stmt = $conn->prepare($sql);
        $nombre="%".$_POST['nombre']."%";
        $stmt->bindParam(':nom',$nombre);
        $stmt->execute();
        $registros=$stmt->fetchAll(PDO::FETCH_ASSOC);

        //Comprobamos si ha encontrado los registros
        if(count($registros)>0){
            echo "<h2>Alumn@s encontrados que contienen en el nombre: '" . $_POST['nombre'] . "'</h2>";
            echo "<table border=1>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Telefono</th>
            <th>Correo</th>";
            foreach($registros as $fila){
                echo "<tr>
                <td>" . $fila["CODIGO"] . "</td>
                <td>" . $fila["NOMBRE"] . "</td>
                <td>" . $fila["APELLIDOS"] . "</td>
                <td>" . $fila["TELEFONO"] . "</td>
                <td>" . $fila["CORREO"] . "</td>
                </tr>";
            }
            echo "</table><br>";;

        }else {
            $msg="No se ha encontrado ningún alumn@ que contenga ".$_POST['nombre']." en su nombre";
        }
    } catch (PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    $conn=null;
}

?>
    <p style="color:red;"><?php echo $msg?></p>

<p><a href='index.html'>Volver</a></p>
</body>
</html>