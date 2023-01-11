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
<h1> Modificar alumno</h1>

<?php
//conprobamos si ha escrito algo en el campo del formulario de la página
$msg = "";
$datosCorrectos = false;
if (isset($_POST['btnEnviar'])) {
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";

    try {
        $conn = new PDO("mysql:host=$servidor;dbname=mibbdd;charset=utf8", $usuario, $clave);
        //asignamos el modo excepcion
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM ALUMNOS WHERE codigo=:cod;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':cod', $_POST['codigo']);
        $stmt->execute();
        $reg = $stmt->fetch(PDO::FETCH_ASSOC);
        //si lo encuentra pinta un formulario para intoducir 
        if ($reg <= 0) {
            $msg = "El alumno a modificar NO existe en la BD";
            $datosCorrectos = false;
        } else
            $datosCorrectos = true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}

?>
<?php

$html = "";
if (!$datosCorrectos) {
    $html = "<form action='' method='post'>";
    $html .= "<fieldset><legend>Código Alumno a modificar</legend>";
    $html .= "Código del alumno: <input type='text' name='codigo' required><br><br/>";
    $html .= "<input type='submit' name='btnEnviar' value='Buscar'>";
    $html .= "</fieldset></form>";
} else {
    $html = "<form action='' method='post'>";
    $html .= "<fieldset><legend>Datos actuales del alumno a modificar</legend>";
    $html .= "Nombre: <input type='text' name='nombre' value='" . $reg['NOMBRE'] . "'><br><br/>";
    $html .= "Apellidos: <input type='text' name='apellidos' value='" . $reg['APELLIDOS'] . "'><br><br/>";
    $html .= "Teléfono:  <input type='text' name='telefono' value='" . $reg['TELEFONO'] . "'><br><br/>";
    $html .= "Correo elecrónico: <input  type='text' name='correo' value='" . $reg['CORREO'] . "'><br><br/>";
    $html .= "<input type='hidden' name='hiddenCodigo' value='" . $reg['CODIGO'] . "'><br><br/>";
    $html .= "<input type='submit' name='btnModificar' value='Modificar'>";
    $html .= "</fieldset></form>";
    $html .="<p><a href='modificar.php'>Atrás</a></p>";
    $html .= "";
}
echo $html;

?>
<?php
//$msg = "";
if (isset($_POST['btnModificar'])) {
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";

    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellidos'];
    $telefono=$_POST['telefono'];
    $correo=$_POST['correo'];
    $codigo=$_POST['hiddenCodigo'];
   // echo $nombre;
    try {
        $conn = new PDO("mysql:host=$servidor;dbname=mibbdd;charset=utf8", $usuario, $clave);
        //asignamos el modo excepcion
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE ALUMNOS SET NOMBRE=:nom, APELLIDOS=:ape, TELEFONO=:tel, CORREO=:correo WHERE CODIGO=:cod";
        $stms = $conn->prepare($sql);
        $stms->bindParam(':nom', $nombre);
        $stms->bindParam(':ape', $apellido);
        $stms->bindParam(':tel', $telefono);
        $stms->bindParam(':correo',$correo);
        $stms->bindParam(':cod', $codigo);
        if($stms->execute())
            $msg = "El alumn@ se ha Actualizado correctamente";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
} else {
    //$msg = "Hay algún error en los datos a modificar ";
}
?>

<p style="color:rgb(243, 138, 138);"><?php echo $msg; ?></p> <!--ESto hay que mirarlo bien!!!!!!!!!!!!-->
<p><a href='index.html'>Volver</a></p>
</body>

</html>