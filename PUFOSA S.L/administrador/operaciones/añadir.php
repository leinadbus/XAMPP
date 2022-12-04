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
    <h1>Añadir Datos</h1>

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

                echo "<form method='post'>
        <fieldset>
            <legend>Añadir Cliente</legend>

        <label for='Cliente_ID'>Cliente ID</label>
        <input type='text' name='Cliente_ID' required>

        <label for='nombre'>Nombre</label>
        <input type='text' name='nombre' >

        <label for='Dirección'>Dirección</label>
        <input type='text' name='Dirección' >

        <label for='Ciudad'>Ciudad</label>
        <input type='text' name='Ciudad' >

        <label for='Estado'>Estado</label>
        <input type='text' name='Estado' >

        <label for='CodigoPostal'>CodigoPostal</label>
        <input type='text' name='CodigoPostal' >

        <label for='CodigoDeArea'>CodigoDeArea</label>
        <input type='text' name='CodigoDeArea' >

        <label for='Telefono'>Telefono</label>
        <input type='text' name='Telefono' >

        <label for='Vendedor'>Vendedor</label>
        <select name='vendedor'>";

                //Recoge los IDs de vendedores para que no introduzca un valor INNEXISTENTE
                $sql = "SELECT empleado_ID FROM empleados;";

                foreach (($conn->query($sql)) as $row) {
                    echo "<option value='", $row['empleado_ID'], "'>", $row['empleado_ID'], "</option>";
                }


                echo  "
       </select>

        <label for='Limite_De_Credito'>Limite_De_Credito</label>
        <input type='text' name='Limite_De_Credito' >

        <label for='Comentarios'>Comentarios</label>
        <input type='text' name='Comentarios' >

        <input type='submit' name='btnEnviar' >

</fieldset>
        
        </form>";

                if (isset($_POST["btnEnviar"])) {
                    try {

                        //Recogemos el ID del vendedor que nos ha marcado el usuario
                        $vendedor = $_REQUEST['vendedor'];
                        $sql = "INSERT INTO cliente (CLIENTE_ID, nombre, Direccion, Ciudad, Estado, CodigoPostal, CodigoDeArea, Telefono, Vendedor_ID, Limite_De_Credito, Comentarios) VALUES (:id, :nom, :dir, :ciu, :est, :cp, :ca, :tel, :ven, :lim, :com) ";

                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':id', $_POST['Cliente_ID']);
                        $stmt->bindParam(':nom', $_POST['nombre']);
                        $stmt->bindParam(':dir', $_POST['Dirección']);
                        $stmt->bindParam(':ciu', $_POST['Ciudad']);
                        $stmt->bindParam(':est', $_POST['Estado']);
                        $stmt->bindParam(':cp', $_POST['CodigoPostal']);
                        $stmt->bindParam(':ca', $_POST['CodigoDeArea']);
                        $stmt->bindParam(':tel', $_POST['Telefono']);
                        $stmt->bindParam(':ven', $vendedor);
                        $stmt->bindParam(':lim', $_POST['Limite_De_Credito']);
                        $stmt->bindParam(':com', $_POST['Comentarios']);

                        if ($stmt->execute()) {
                            echo "Insertado correctamente";
                            $registro = fopen("../pufosaRegistros.txt", "a+b");
                                if (!$registro) {
                                    echo "error al abrir el fichero";
                                } else {
                                    $sentenciaEscritura= "Usuario: ".$user." ha añadido un cliente con ID: ". $_POST['Cliente_ID']. " el día ".date("d M y") . " \n ";
                                    fwrite($registro, $sentenciaEscritura );    
                                    rewind($registro);
                                }
                        }
                    } catch (PDOException $e) {

                        echo 'Algo salió mal escribiendo los datos. </br> Recuerda no introducir un ID de cliente existente';
                    }
                }
                break;
            case 'departamento':

                echo "  
        <form method='post'>
    

<fieldset>
            <legend>Añadir Departamento</legend>

        <label for='departamento_ID'>departamento ID</label>
        <input type='text' name='departamento_ID' required>

        <label for='nombre'>Nombre</label>
        <select name='nombreDep'>
            <option value='contabilidad'>Contabilidad</option>
            <option value='Investigacion'>Investigacion</option>
            <option value='Ventas'>Ventas</option>
            <option value='Operaciones'>Operaciones</option>
        </select>
        
        <label for='ubicacion'>Ubicacion</label>
        <select name='Ubicacion'>";

                //Recoge los IDs de vendedores para que no introduzca un valor INNEXISTENTE
                $sql = "SELECT Ubicacion_ID FROM ubicacion;";

                foreach (($conn->query($sql)) as $row) {
                    echo "<option value='", $row['Ubicacion_ID'], "'>", $row['Ubicacion_ID'], "</option>";
                }

                echo  "

        </select>

        <input type='submit' name='btnEnviar' >

        </fieldset>
        </form>";
//SI SACAMOS LISTA DE VENDEDORES PERO NO DE DEPARTAMENTOS
// CONTROLO MEDIANTE FALLO DE BASE DE DATOS, SI NO INTRODUCE VALOR ADECUADO EL 
//CODIGO FALLA Y DEVUELVO EL MENSAJE CON SU MOTIVO
                if (isset($_POST["btnEnviar"])) {
                    try {

                        $ubicacion = $_REQUEST['Ubicacion'];
                        $nombre = $_REQUEST['nombreDep'];
                        $sql = "INSERT INTO departamento (departamento_ID, Nombre, Ubicacion_ID) VALUES (:dep, :nom, :ubi) ";

                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':dep', $_POST['departamento_ID']);
                        $stmt->bindParam(':nom', $nombre);
                        $stmt->bindParam(':ubi', $ubicacion);


                        if ($stmt->execute()) {
                            echo "Insertado correctamente";
                        }
                    } catch (PDOException $e) {

                        echo 'Algo salió mal escribiendo los datos. </br> Recuerda no introducir un ID de departamento existente </br>';
                    }
                }
                break;

            case 'empleados':


                echo "
        <form method='post'>
        <fieldset>
            <legend>Añadir empleados</legend>

        <label for='empleado_ID'> empleado_ID</label>
        <input type='text' name='empleado_ID' required>
        
        <label for='Apellido'>Apellido </label>
        <input type='text' name='Apellido' >

        <label for='Nombre'> Nombre</label>
        <input type='text' name='Nombre' >

        <label for='Inicial_del_segundo_apellido'>Inicial_del_segundo_apellido </label>
        <input type='text' name='Inicial_del_segundo_apellido' >

        <label for='Trabajo_ID'>Trabajo_ID </label>
        <select name='trabajos'>";
                //Recoge los IDs de vendedores para que no introduzca un valor INNEXISTENTE
                $sql = "SELECT Trabajo_ID FROM trabajos;";

                foreach (($conn->query($sql)) as $row) {
                    echo "<option value='", $row['Trabajo_ID'], "'>", $row['Trabajo_ID'], "</option>";
                }

                echo  "
        </select>
        <label for='Jefe_ID'>Jefe_ID </label>
        <input type='text' name='Jefe_ID' >

        <label for='Fecha_contrato'> Fecha_contrato</label>
        <input type='text' name='Fecha_contrato' >

        <label for='Salario'>Salario </label>
        <input type='text' name='Salario' >

        <label for='Comision'>Comision</label>
        <input type='text' name='Comision' >

        <label for='Departamento_ID'>Departamento_ID </label>
        <select name='departamentoID'>";
                //Recoge los IDs de vendedores para que no introduzca un valor INNEXISTENTE
                $sql = "SELECT departamento_ID FROM departamento;";

                foreach (($conn->query($sql)) as $row) {
                    echo "<option value='", $row['departamento_ID'], "'>", $row['departamento_ID'], "</option>";
                }

                echo  "
        </select>   
        <input type='submit' name='btnEnviar' >     
        </fieldset>
        </form>
        ";

                if (isset($_POST["btnEnviar"])) {
                    try {

                        $trabajo = $_REQUEST['trabajos'];
                        $departamento = $_REQUEST['departamentoID'];
                        $sql = "INSERT INTO empleados (empleado_ID, Apellido, Nombre, Inicial_del_segundo_apellido, Trabajo_ID, Jefe_ID, Fecha_contrato, Salario, Comision, Departamento_ID) 
                            VALUES (:emp, :ape, :nom, :ini, :tra, :jef, :fec, :sal, :com, :dep)  ";

                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':emp', $_POST['empleado_ID']);
                        $stmt->bindParam(':ape', $_POST['Apellido']);
                        $stmt->bindParam(':nom', $_POST['Nombre']);
                        $stmt->bindParam(':ini', $_POST['Inicial_del_segundo_apellido']);
                        $stmt->bindParam(':tra', $trabajo);
                        $stmt->bindParam(':jef', $_POST['Jefe_ID']);
                        $stmt->bindParam(':fec', $_POST['Fecha_contrato']);
                        $stmt->bindParam(':sal', $_POST['Salario']);
                        $stmt->bindParam(':com', $_POST['Comision']);
                        $stmt->bindParam(':dep', $departamento);


                        if ($stmt->execute()) {
                            echo "Insertado correctamente";
                        }
                    } catch (PDOException $e) {

                        echo 'Algo salió mal escribiendo los datos. </br> Recuerda no introducir un ID de empleado existente </br>';
                    }
                }
                break;

            case 'trabajos':

                echo "  
        <form method='post'>
        <fieldset>
            <legend>Añadir trabajo</legend>

        <label for='Trabajo_ID'>Trabajo_ID</label>
        <input type='text' name='Trabajo_ID' required>

        <label for='Funcion'>Funcion</label>
        <input type='text' name='Funcion' required>
        <input type='submit' name='btnEnviar' >     
        </fieldset>
        </form>
        ";

                if (isset($_POST["btnEnviar"])) {
                    try {
                        $sql = "INSERT INTO trabajos (Trabajo_ID, Funcion) VALUES (:tra, :fun) ";

                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':tra', $_POST['Trabajo_ID']);
                        $stmt->bindParam(':fun', $_POST['Funcion']);

                        if ($stmt->execute()) {
                            echo "Insertado correctamente";
                        }
                    } catch (PDOException $e) {

                        echo 'Algo salió mal escribiendo los datos. </br> Recuerda no introducir un ID de trabajo existente </br>';
                    }
                }
                break;
            case 'ubicacion':
                echo "  
        <form method='post'>
        <fieldset>
            <legend>Añadir ubicación</legend>

        <label for='Ubicacion_ID'>Ubicacion_ID</label>
        <input type='text' name='Ubicacion_ID' required>

        <label for='GrupoRegional'>GrupoRegional</label>
        <input type='text' name='GrupoRegional' >

        <input type='submit' name='btnEnviar' >     
        </fieldset>
        </form>
        ";

                if (isset($_POST["btnEnviar"])) {
                    try {
                        $sql = "INSERT INTO ubicacion (Ubicacion_ID, GrupoRegional) VALUES (:ubi, :gru) ";

                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':ubi', $_POST['Ubicacion_ID']);
                        $stmt->bindParam(':gru', $_POST['GrupoRegional']);

                        if ($stmt->execute()) {
                            echo "Insertado correctamente";
                        }
                    } catch (PDOException $e) {

                        echo 'Algo salió mal escribiendo los datos. </br> Recuerda no introducir un ID de ubicación existente </br>';
                    }
                }
                break;
        }
    } catch (PDOException $e) {
        //echo "Error: " . $e->getMessage();
        //echo "<input type='button' onclick='history.back()' name='volver atrás' value='volver atrás'>";
    }
    $conn = null;

    ?>
<ul>
    <li><input type='button' onclick='history.back()' name='volver atrás' value='volver atrás'></li>
    <li><a href='../menu.php?user=<?=$user?>&contraseña=<?=$contraseña?>'>Inicio</a></li>
</ul>
</body>

</html>