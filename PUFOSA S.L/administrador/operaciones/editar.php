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
            font-size: 90%;
            width: 20%;
            height: 20%;
        }

        fieldset {
            margin: 0 auto;
            text-align: left;
            width: 20%;
            height: 20%;
        }
    </style>
</head>

<body>
    <h1>Editar de datos</h1>

    <?php

    require "../../conexión.php";
    $conn = conectar();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $datosCorrectos = false;
    $valor = $_GET['valor'];

    try {
        switch ($valor) {

            case 'cliente':
                try {



                    if (!$datosCorrectos) {
                        echo "<form method='post'>
<fieldset>
<legend>Código Cliente a modificar</legend>
ID del cliente: 
<input type='text' name='codigo' required><br><br/>
<input type='submit' name='btnEnviar' value='Buscar'>
</fieldset></form>";
                        if (isset($_POST['btnEnviar'])) {
                            $sql = "SELECT * FROM cliente WHERE CLIENTE_ID=:cod;";
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
                        }
                    }
                    if ($datosCorrectos) {
                        echo "<form action='' method='post'>
    <fieldset><legend>Datos actuales del cliente a modificar</legend>
    CLIENTE_ID: <input type='text' name='CLIENTE_ID' value='" . $reg['CLIENTE_ID'] . "'disabled><br><br/>
    Nombre: <input type='text' name='nombre' value='" . $reg['nombre'] . "'><br><br/>
    Direccion:  <input type='text' name='Direccion' value='" . $reg['Direccion'] . "'><br><br/>
    Ciudad: <input  type='text' name='Ciudad' value='" . $reg['Ciudad'] . "'><br><br/>
    Estado: <input type='text' name='Estado' value='" . $reg['Estado'] . "'><br><br/>
    CodigoPostal: <input type='text' name='CodigoPostal' value='" . $reg['CodigoPostal'] . "'><br><br/>
    CodigoDeArea: <input type='text' name='CodigoDeArea' value='" . $reg['CodigoDeArea'] . "'><br><br/>
    Telefono: <input type='text' name='Telefono' value='" . $reg['Telefono'] . "'><br><br/>

    <label for='Vendedor'>Vendedor</label>
    <select name='vendedor'>";

                        //Recoge los IDs de vendedores para que no introduzca un valor queno existe
                        $sql = "SELECT empleado_ID FROM empleados;";

                        foreach (($conn->query($sql)) as $row) {
                            echo "<option value='", $row['empleado_ID'], "'>", $row['empleado_ID'], "</option>";
                        }


                        echo  "
   </select>

    <input type='text' name='Limite_De_Credito' value='" . $reg['Limite_De_Credito'] . "'><br><br/>
    <input type='text' name='Comentarios' value='" . $reg['Comentarios'] . "'><br><br/>
    <input type='submit' name='btnModificar' value='Modificar'>
    </fieldset></form>
   ";
                    }
                    if (isset($_POST['btnModificar'])) {

                       // $clienteID=$_POST['CLIENTE_ID'];
                        $nombre=$_POST['nombre'];
                        $direccion=$_POST['Direccion'];
                        $ciudad=$_POST['Ciudad'];
                        $estado=$_POST['Estado'];
                        $CodigoPostal=$_POST['CodigoPostal'];
                        $CodigoDeArea=$_POST['CodigoDeArea'];
                        $Telefono=$_POST['Telefono'];
                        $empleado_ID=$_POST['vendedor'];
                        $Limite_De_Credito=$_POST['Limite_De_Credito'];
                        $Comentarios=$_POST['Comentarios'];

                        try {
                            
                            $sql = "UPDATE cliente SET CLIENTE_ID=:cli, nombre=:nom, Direccion=:dir, Ciudad=:ciu, Estado=:es ,CodigoPostal=:cp ,CodigoDeArea=:ca ,Telefono=:tel ,empleado_ID=:eid ,Limite_De_Credito=:lcr,Comentarios=:com WHERE CLIENTE_ID=:cli";
                            $stms = $conn->prepare($sql);
                            $stms->bindParam(':cli', $_POST['CLIENTE_ID']);
                            $stms->bindParam(':nom', $_POST['nombre']);
                            $stms->bindParam(':dir', $_POST['Direccion']);
                            $stms->bindParam(':ciu', $_POST['Ciudad']);
                            $stms->bindParam(':es',$_POST['Estado']);
                            $stms->bindParam(':cp',$_POST['CodigoPostal']);
                            $stms->bindParam(':ca', $_POST['CodigoDeArea']);
                            $stms->bindParam(':tel', $_POST['Telefono']);
                            $stms->bindParam(':eid', $_POST['vendedor']);
                            $stms->bindParam(':lcr', $_POST['Limite_De_Credito']);
                            $stms->bindParam(':com', $_POST['Comentarios']);


                            if($stms->execute())
                                $msg = "El cliente se ha Actualizado correctamente";
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                    }
                    
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
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