<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         body {
            margin: 0 auto;
    text-align: center;
    font-size:90%;
    width: 20%;
    height: 20%;
        }
        fieldset {
        margin: 0 auto;
    text-align: left;
    width: 20%;
    height: 20%;
        }
        li{
            text-decoration:none;
            display:inline-block;
            padding:5px 10px;
    }

    </style>
</head>

<body>
    <h1>Borrado de datos</h1>

    <?php

    require "../../conexión.php";
    $conn = conectar();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $valor = $_GET['valor'];
    $user=$_GET['user'];
    $contraseña=$_GET['contraseña'];
//-----------------SWITCH VALOR PARA MOSTRAR FORMULARIOS-----------------
//***************Es importante que $valor tenga el nombre de las tablas****************
    try {
        switch ($valor) {
            case 'cliente':
//CLIENTE ES SUSCEPTIBLE DE SER BORRADO SIN PROBLEMA

                echo "
            <form method='post'>
            <fieldset>
                <legend>Datos del cliente a borrar</legend>
                Id de cliente:
                <input type='text' name='idcliente' required>

                <input type='submit' name='btnEnviar' value='Borrar'>
            </fieldset>
        </form>
            ";
                if (isset($_POST["btnEnviar"])) {
                    try {

                        $idcliente = $_POST['idcliente'];

                        $sql = "SELECT CLIENTE_ID FROM cliente WHERE CLIENTE_ID=:cod;";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':cod', $idcliente);
                        $stmt->execute();
                        $registros = $stmt->fetch(PDO::FETCH_ASSOC);
                        if ($registros > 0) {
                            $sql = "DELETE FROM cliente WHERE CLIENTE_ID=:cod";
                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(':cod', $idcliente);
                            $stmt->execute();
                            echo "Cliente eliminado correctamente de la BD";
                            
                            $registro = fopen("../pufosaRegistros.txt", "a+b");
                            if (!$registro) {
                                echo "error al abrir el fichero";
                            } else {
                                $sentenciaEscritura= "Usuario: ".$user." ha borrado un cliente con ID: ". $idcliente. " el día ".date("d M y") . " \n ";
                                fwrite($registro, $sentenciaEscritura );    
                                rewind($registro);  
                            } 
                    }else {
                            echo "El cliente a borrar NO existe en la BD";
        
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                }
                break;
            case 'departamento':
        //DEPARTAMENTO NO ES SUSCEPTIBLE DE SER BORRADO
        //**********Departamento solo dejará borrar si no es usado en otras tablas ************* */
                echo "
            <form method='post'>
            <fieldset>
                <legend>Datos del departamento a borrar</legend>
                ID de departamento:
                <input type='text' name='departamentoid' required>

                <input type='submit' name='btnEnviar' value='Borrar'>
            </fieldset>
        </form>
            ";
                if (isset($_POST["btnEnviar"])) {
                    try {

                        $departamentoid = $_POST['departamentoid'];

                        $sql = "SELECT departamento_ID FROM departamento WHERE departamento_ID=:cod;";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':cod', $departamentoid);
                        $stmt->execute();
                        $registros = $stmt->fetch(PDO::FETCH_ASSOC);
                        if ($registros > 0) {
                            $sql = "DELETE FROM departamento WHERE departamento_ID=:cod";
                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(':cod', $departamentoid);
                            $stmt->execute();
                            echo "Departamento eliminado correctamente de la BD";

                        } else {
                            echo "El departamento a borrar NO existe en la BD";

                        }
                    } catch (PDOException $e) {
                        //echo "Error: " . $e->getMessage();
                        echo "No tienes permisos para borrar este valor de la tabla Departamentos";
                    }
                }
                break;
            case 'empleados':
                //EMPLEADOS NO ES SUSCEPTIBLE DE SER BORRADO
        //**********Empleados solo dejará borrar si no es usado en otras tablas ************* */
                echo "
                <form method='post'>
                <fieldset>
                    <legend>Datos del departamento a borrar</legend>
                    ID de empleado:
                    <input type='text' name='empleadoid' required>

                    <input type='submit' name='btnEnviar' value='Borrar'>
                </fieldset>
            </form>
                ";
                if (isset($_POST["btnEnviar"])) {
                    try {

                        $empleadoid = $_POST['empleadoid'];

                        $sql = "SELECT empleado_ID FROM empleados WHERE empleado_ID=:cod;";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':cod', $empleadoid);
                        $stmt->execute();
                        $registros = $stmt->fetch(PDO::FETCH_ASSOC);
                        if ($registros > 0) {
                            $sql = "DELETE FROM empleados WHERE empleado_ID=:cod";
                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(':cod', $empleadoid);
                            $stmt->execute();
                            echo "Empleado eliminado correctamente de la BD";

                        } else {
                            echo "El empleado a borrar NO existe en la BD";

                        }
                    } catch (PDOException $e) {

                        echo "No tienes permisos para borrar este valor de la tabla Empleados";
                    }
                }
                break;
            case 'trabajos':
                //TRABAJOS NO ES SUSCEPTIBLE DE SER BORRADO
        //**********Trabajos solo dejará borrar si no es usado en otras tablas ************* */
                echo "
                    <form method='post'>
                    <fieldset>
                        <legend>Datos del trabajo a borrar</legend>
                        ID de trabajo:
                        <input type='text' name='trabajoid' required>

                        <input type='submit' name='btnEnviar' value='Borrar'>
                    </fieldset>
                </form>
                    ";
                if (isset($_POST["btnEnviar"])) {
                    try {

                        $trabajoid = $_POST['trabajoid'];

                        $sql = "SELECT Trabajo_ID FROM trabajos WHERE Trabajo_ID=:cod;";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':cod', $trabajoid);
                        $stmt->execute();
                        $registros = $stmt->fetch(PDO::FETCH_ASSOC);
                        if ($registros > 0) {
                            $sql = "DELETE FROM trabajos WHERE Trabajo_ID=:cod";
                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(':cod', $trabajoid);
                            $stmt->execute();
                            echo "Trabajo eliminado correctamente de la BD";
                     
                        } else {
                            echo "El trabajo a borrar NO existe en la BD";
                 
                        }
                    } catch (PDOException $e) {
                        //echo "Error: " . $e->getMessage();
                        echo "No tienes permisos para borrar este valor de la tabla trabajos";
                    }
                }
                break;
            case 'ubicacion':
                //UBICACIÓN NO ES SUSCEPTIBLE DE SER BORRADO
        //**********Ubicacion solo dejará borrar si no es usado en otras tablas ************* */
                echo "
                    <form method='post'>
                    <fieldset>
                        <legend>Datos de la ubicación a borrar</legend>
                        ID de ubicación:
                        <input type='text' name='ubicacionid' required>

                        <input type='submit' name='btnEnviar' value='Borrar'>
                    </fieldset>
                </form>
                    ";
                if (isset($_POST["btnEnviar"])) {
                    try {

                        $ubicacionid = $_POST['ubicacionid'];

                        $sql = "SELECT Ubicacion_ID FROM ubicacion WHERE Ubicacion_ID=:cod;";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':cod', $ubicacionid);
                        $stmt->execute();
                        $registros = $stmt->fetch(PDO::FETCH_ASSOC);
                        if ($registros > 0) {
                            $sql = "DELETE FROM ubicacion WHERE Ubicacion_ID=:cod";
                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(':cod', $ubicacionid);
                            $stmt->execute();
                            echo "Ubicación eliminado correctamente de la BD";
                           
                        } else {
                            echo "La ubicación a borrar NO existe en la BD";
                         
                        }
                    } catch (PDOException $e) {
                        //echo "Error: " . $e->getMessage();
                        echo "No tienes permisos para borrar este valor de la tabla ubicacion";
                    }
                }
        }
    } catch (PDOException $e) {
  
    }
    $conn = null;
    ?>
<ul>
    <li><input type='button' onclick='history.back()' name='volver atrás' value='volver atrás'></li>
    <li><a href='../menu.php?user=<?=$user?>&contraseña=<?=$contraseña?>'>Inicio</a></li>
</ul>

</body>

</html>