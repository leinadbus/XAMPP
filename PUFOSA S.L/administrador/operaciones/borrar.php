<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        fieldset {
            width: 10%;
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

    try {
        switch ($valor) {
            case 'cliente':
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
                            //$msg="El alumn@ se ha eliminado correctamente";
                            //echo "<p><a href='borrar.html'>Borrar otro alumno</a></p>";
                            //echo "<p><a href='index.html'>Volver a inicio</a></p>";
                        } else {
                            echo "El cliente a borrar NO existe en la BD";
                            // $msg="El alumn@ a borrar NO existe en la BD";
                            // echo "<p><a href='borrar.html'>Borrar otro alumno</a></p>";
                            // echo "<p><a href='index.html'>Volver a inicio</a></p>";
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                }
                break;
            case 'departamento':
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
                            //$msg="El alumn@ se ha eliminado correctamente";
                            //echo "<p><a href='borrar.html'>Borrar otro alumno</a></p>";
                            //echo "<p><a href='index.html'>Volver a inicio</a></p>";
                        } else {
                            echo "El departamento a borrar NO existe en la BD";
                            // $msg="El alumn@ a borrar NO existe en la BD";
                            // echo "<p><a href='borrar.html'>Borrar otro alumno</a></p>";
                            // echo "<p><a href='index.html'>Volver a inicio</a></p>";
                        }
                    } catch (PDOException $e) {
                        //echo "Error: " . $e->getMessage();
                        echo "No tienes permisos para borrar este valor de la tabla Departamentos";
                    }
                }
                break;
            case 'empleados':
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
                            //$msg="El alumn@ se ha eliminado correctamente";
                            //echo "<p><a href='borrar.html'>Borrar otro alumno</a></p>";
                            //echo "<p><a href='index.html'>Volver a inicio</a></p>";
                        } else {
                            echo "El empleado a borrar NO existe en la BD";
                            // $msg="El alumn@ a borrar NO existe en la BD";
                            // echo "<p><a href='borrar.html'>Borrar otro alumno</a></p>";
                            // echo "<p><a href='index.html'>Volver a inicio</a></p>";
                        }
                    } catch (PDOException $e) {
                        //echo "Error: " . $e->getMessage();
                        echo "No tienes permisos para borrar este valor de la tabla Empleados";
                    }
                }
                break;
            case 'trabajos':
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
                            //$msg="El alumn@ se ha eliminado correctamente";
                            //echo "<p><a href='borrar.html'>Borrar otro alumno</a></p>";
                            //echo "<p><a href='index.html'>Volver a inicio</a></p>";
                        } else {
                            echo "El trabajo a borrar NO existe en la BD";
                            // $msg="El alumn@ a borrar NO existe en la BD";
                            // echo "<p><a href='borrar.html'>Borrar otro alumno</a></p>";
                            // echo "<p><a href='index.html'>Volver a inicio</a></p>";
                        }
                    } catch (PDOException $e) {
                        //echo "Error: " . $e->getMessage();
                        echo "No tienes permisos para borrar este valor de la tabla trabajos";
                    }
                }
                break;
            case 'ubicacion':
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
                            //$msg="El alumn@ se ha eliminado correctamente";
                            //echo "<p><a href='borrar.html'>Borrar otro alumno</a></p>";
                            //echo "<p><a href='index.html'>Volver a inicio</a></p>";
                        } else {
                            echo "La ubicación a borrar NO existe en la BD";
                            // $msg="El alumn@ a borrar NO existe en la BD";
                            // echo "<p><a href='borrar.html'>Borrar otro alumno</a></p>";
                            // echo "<p><a href='index.html'>Volver a inicio</a></p>";
                        }
                    } catch (PDOException $e) {
                        //echo "Error: " . $e->getMessage();
                        echo "No tienes permisos para borrar este valor de la tabla ubicacion";
                    }
                }
        }
    } catch (PDOException $e) {
        //echo "Error: " . $e->getMessage();
        //echo "<input type='button' onclick='history.back()' name='volver atrás' value='volver atrás'>";
    }
    $conn = null;
    ?>


</body>

</html>