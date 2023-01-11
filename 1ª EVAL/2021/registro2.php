<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method='post'>
        <fieldset>
            <legend>Añadir Alumno</legend>

        <label for='NOMBRE'>NOMBRE</label>
        <input type='text' name='NOMBRE' required>

        <label for='APELLIDOS'>APELLIDOS</label>
        <input type='text' name='APELLIDOS' required>

        <label for='TELEFONO'>TELEFONO</label>
        <input type='text' name='TELEFONO' required>

        <label for='CORREO'>CORREO</label>
        <input type='text' name='CORREO' required>

        <input type='submit' name='btnEnviar' >

        </fieldset>
        
       </form>";

       <?php
       include "Alumno.php";
       include "conexión.php";
       
       if (isset($_POST["btnEnviar"])) {
        $conn = conectar();
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $nombre= $_POST['NOMBRE'];
            $apellido=$_POST['APELLIDOS'];
            $telefono=$_POST['TELEFONO'];
            $correo=$_POST['CORREO'];
                // echo $nombre;
            $alumno= new Alumno($nombre,$apellido,$telefono,$correo);
           
            $alumnombre=$alumno->get_nombre();
            $alumpellido=$alumno->get_apellidos();
            $alumtel=$alumno->get_telefono();
            $alumcor=$alumno->get_correo();
                
            $sql = "INSERT INTO ALUMNOS (nombre, apellidos, telefono, correo) VALUES (?,?,?,?)";
            $stmnt= $conn->prepare($sql);
            $stmnt->bindParam(1, $alumnombre);
            $stmnt->bindParam(2,$alumpellido);
            $stmnt->bindParam(3,$alumtel);
            $stmnt->bindParam(4,$alumcor);

            if($stmnt->execute()) echo "insercion correcta";
          

        }




?>
</body>
</html>