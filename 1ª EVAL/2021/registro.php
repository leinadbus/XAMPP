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
        
       </form>

       <?php
       include "Alumno.php";
       include "conexión.php";
       $conn = conectar();
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       if (isset($_POST["btnEnviar"])) {
            $nombre= $_POST['NOMBRE']??'';
            $apellido=$_POST['APELLIDOS']??'';
            $telefono=$_POST['TELEFONO']??'';
            $correo=$_POST['CORREO']??'';
                // echo $nombre;
            $alumno= new Alumno($nombre,$apellido,$telefono,$correo);
        
                 if (!$alumno->comprobacionCorreo($correo)){
                         echo "Correo no válido";

                 }
                 else{
                     $sql="SELECT COUNT(*) AS 'cantidad' FROM ALUMNOS WHERE correo='".$correo."';";
                     $result=$conn->query($sql);
                     $num=$result->fetch();
            
                     if($num['cantidad']>0){
                         echo "Alumno ya matriculado, no es posible dar de alta<br>";
                         echo "<p><a href='index.html'>Volver</a></p>";
            
                     }else{
            
                       
                    try {
                        $alumnombre=$alumno->get_nombre();
                        $alumpellido=$alumno->get_apellidos();
                        $alumtel=$alumno->get_telefono();
                        $alumcor=$alumno->get_correo();
                        echo $alumnombre,$alumpellido,$alumtel,$alumcor,"</br>";
                        
                        $sql = "INSERT INTO alumnos (CODIGO, NOMBRE, APELLIDOS, TELEFONO, CORREO) VALUES (NULL,:a, :b, :c, :d); ";
                        $stmt = $conn->prepare($sql);
                        
                        $stmt->bindParam(':a', $alumnombre);
                        $stmt->bindParam(':b',$alumpellido );
                        $stmt->bindParam(':c',$alumtel );
                        $stmt->bindParam(':d', $alumcor);

                        if ($stmt->execute()) 
                        //print_r($stmt);
                        echo $sql;
                            echo "Insertado correctamente";
                    }catch (PDOException $e){
                        //echo $e;
                        echo 'Algo salió mal escribiendo los datos. </br>';
                    }

                }
    

            }
        }  
       
       ?>
</body>
</html>