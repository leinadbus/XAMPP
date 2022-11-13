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

    $datosCorrectos = false;
    $valor = $_GET['valor'];
    $user=$_GET['user'];
    $contraseña=$_GET['contraseña'];
    //-----------------SWITCH VALOR PARA MOSTRAR FORMULARIOS-----------------
//***************Es importante que $valor tenga el nombre de las tablas****************
        switch ($valor) {
//CLIENTE deja cambiar todos los datos menos el ID 
            case 'cliente':
                if (isset($_POST['btnEnviar'])) {
                
                    try {
                        $conn = conectar();
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = "SELECT * FROM cliente WHERE CLIENTE_ID=:cod;";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':cod', $_POST['CLIENTE_ID']);
                        $stmt->execute();
                        $reg = $stmt->fetch(PDO::FETCH_ASSOC);

                        if ($reg <= 0) {
                            $msg = "El CLIENTE a modificar NO existe en la BD";
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
                    $html .= "<fieldset><legend>Código CLIENTE a modificar</legend>";
                    $html .= "CLIENTE_ID: <input type='text' name='CLIENTE_ID' required><br><br/>";
                    $html .= "<input type='submit' name='btnEnviar' value='Buscar'>";
                    $html .= "</fieldset></form>";
                } else {
                    
                    $html = "<form action='' method='post'>";
                    $html .="<fieldset><legend>Datos actuales del cliente a modificar</legend>" ;
                    $html .="<input type='hidden' name='hiddenCLIENTE' value='" . $reg['CLIENTE_ID'] . "'><br><br/>                    " ;
                    $html .= "Nombre: <input type='text' name='nombre' value='" . $reg['nombre'] . "'><br><br/>";
                    $html .= "Direccion:  <input type='text' name='Direccion' value='" . $reg['Direccion'] . "'><br><br/>";
                    $html .= "Ciudad: <input  type='text' name='Ciudad' value='" . $reg['Ciudad'] . "'><br><br/>" ;
                    $html .= "Estado: <input type='text' name='Estado' value='" . $reg['Estado'] . "'><br><br/>";
                    $html .= "CodigoPostal: <input type='text' name='CodigoPostal' value='" . $reg['CodigoPostal'] . "'><br><br/>";
                    $html .= "CodigoDeArea: <input type='text' name='CodigoDeArea' value='" . $reg['CodigoDeArea'] . "'><br><br/>";
                    $html .= "Telefono: <input type='text' name='Telefono' value='" . $reg['Telefono'] . "'><br><br/>";
                    $html .= "Vendedor: <input type='text' name='Vendedor_ID' value='" . $reg['Vendedor_ID'] . "'><br><br/>";
                    $html .= "Limite de Credito: <input type='text' name='Limite_De_Credito' value='" . $reg['Limite_De_Credito'] . "'><br><br/>";
                    $html .= "Comentarios: <input type='text' name='Comentarios' value='" . $reg['Comentarios'] . "'><br><br/>";
                    $html .= "<input type='submit' name='btnModificar' value='Modificar'>";
                    $html .= "</fieldset></form>";
                    
                }
                echo $html;
                
                ?>
                <?php

                if (isset($_POST['btnModificar'])) {
              
                         $clienteID=$_POST['hiddenCLIENTE'];
                         $nombre=$_POST['nombre'];         
                         $direccion=$_POST['Direccion'];
                         $ciudad=$_POST['Ciudad'];
                         $estado=$_POST['Estado'];
                         $CodigoPostal=$_POST['CodigoPostal'];
                         $CodigoDeArea=$_POST['CodigoDeArea'];
                         $Telefono=$_POST['Telefono'];
                         $empleado_ID=$_POST['Vendedor_ID'];
                         $Limite_De_Credito=$_POST['Limite_De_Credito'];
                         $Comentarios=$_POST['Comentarios'];
                    try {
                        $conn = conectar();
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = "UPDATE cliente SET CLIENTE_ID=:cli, nombre=:nom, Direccion=:dir, Ciudad=:ciu, Estado=:es ,CodigoPostal=:cp ,CodigoDeArea=:ca ,Telefono=:tel ,Vendedor_ID=:eid ,Limite_De_Credito=:lcr,Comentarios=:com WHERE CLIENTE_ID=:cli";
                            $stms = $conn->prepare($sql);
                            $stms->bindParam(':cli', $clienteID);
                            $stms->bindParam(':nom', $nombre);
                            $stms->bindParam(':dir', $direccion);
                            $stms->bindParam(':ciu', $ciudad);
                            $stms->bindParam(':es',$estado);
                            $stms->bindParam(':cp',$CodigoPostal);
                            $stms->bindParam(':ca', $CodigoDeArea);
                            $stms->bindParam(':tel', $Telefono);
                            $stms->bindParam(':eid', $empleado_ID);
                            $stms->bindParam(':lcr', $Limite_De_Credito);
                            $stms->bindParam(':com', $Comentarios);
                        if($stms->execute())
                            ECHO  "El cliente se ha Actualizado correctamente";
                    } catch (PDOException $e) {
            //Si no se introduce ID vendedor válido el código lo mantiene como el existente
                        ECHO "ATENCIÓN: NO HAS INTRODUCIDO UN ID DE VENDEDOR VÁLIDO Y SE ESTÁ MANTENIENDO EL EXISTENTE";
                    }
                    $conn = null;
                } 
                
                break;
                case 'departamento':
                    if (isset($_POST['btnEnviar'])) {
                //DEPARTAMENTO deja cambiar todos los datos menos el ID 
                        try {
                            $conn = conectar();
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $sql = "SELECT * FROM departamento WHERE departamento_ID=:cod;";
                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(':cod', $_POST['departamento_ID']);
                            $stmt->execute();
                            $reg = $stmt->fetch(PDO::FETCH_ASSOC);
                            //si lo encuentra pinta un formulario para intoducir 
                            if ($reg <= 0) {
                                ECHO "El DEPARTAMENO a modificar NO existe en la BD";
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
                    
                   
                    if (!$datosCorrectos) {
                        $html = "<form action='' method='post'>";
                        $html .= "<fieldset><legend>Código CLIENTE a modificar</legend>";
                        $html .= "departamento_ID: <input type='text' name='departamento_ID' required><br><br/>";
                        $html .= "<input type='submit' name='btnEnviar' value='Buscar'>";
                        $html .= "</fieldset></form>";
                    } else {
                        
                        $html = "<form action='' method='post'>";
                        $html .="<fieldset><legend>Datos actuales del cliente a modificar</legend>" ;
                        $html .="<input type='hidden' name='hiddenCLIENTE' value='" . $reg['departamento_ID'] . "'><br><br/>" ;
                        $html .= "Nombre: <input type='text' name='Nombre' value='" . $reg['Nombre'] . "'><br><br/>";
                        $html .= "Direccion:  <input type='text' name='Ubicacion_ID' value='" . $reg['Ubicacion_ID'] . "'><br><br/>";
                        $html .= "<input type='submit' name='btnModificar' value='Modificar'>";
                        $html .= "</fieldset></form>";
                        
                    }
                    echo $html;
                  
                    ?>
                    <?php
                    if (isset($_POST['btnModificar'])) {
                  
                             $clienteID=$_POST['hiddenCLIENTE'];
                             $nombre=$_POST['Nombre'];          
                             $direccion=$_POST['Ubicacion_ID'];
                             
                        try {
                            $conn = conectar();
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $sql = "UPDATE departamento SET departamento_ID=:cli, Nombre=:nom, Ubicacion_ID=:dir WHERE departamento_ID=:cli";
                                $stms = $conn->prepare($sql);
                                $stms->bindParam(':cli', $clienteID);
                                $stms->bindParam(':nom', $nombre);
                                $stms->bindParam(':dir', $direccion);
                                
                            if($stms->execute())
                                ECHO  "El departamento se ha Actualizado correctamente";
                        } catch (PDOException $e) {
                        //Si no se introduce ID de ubicación cálida, departamento mantiene el existente por defecto
                            ECHO "ATENCIÓN: NO HAS INTRODUCIDO UNA UBICACIÓN VÁLIDA Y SE ESTÁ MANTENIENDO LA YA EXISTENTE";
                        }
                        $conn = null;
                    } 
                    break;
                case 'empleados':
                    //EMPLEADO solamente deja cambiar algunos datos no críticos para el trabajo
                    if (isset($_POST['btnEnviar'])) {
                
                        try {
                            $conn = conectar();
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $sql = "SELECT * FROM empleados WHERE empleado_ID=:cod;";
                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(':cod', $_POST['empleado_ID']);
                            $stmt->execute();
                            $reg = $stmt->fetch(PDO::FETCH_ASSOC);
                            //si lo encuentra pinta un formulario para intoducir 
                            if ($reg <= 0) {
                                echo "El EMPLEADO a modificar NO existe en la BD";
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
                        $html .= "<fieldset><legend>Código EMPLEADO a modificar</legend>";
                        $html .= "empleado_ID: <input type='text' name='empleado_ID' required><br><br/>";
                        $html .= "<input type='submit' name='btnEnviar' value='Buscar'>";
                        $html .= "</fieldset></form>";
                    } else {
                        
                    //Disabled nos permite enseñar los datos pero no cambiarlos NI RECOGERLOS
                        $html = "<form action='' method='post'>";
                        $html .="<fieldset><legend>Datos actuales del EMPLEADO a modificar</legend>" ;
                        $html .="empleado_ID: <input type='hidden' name='hiddenCLIENTE' value='" . $reg['empleado_ID'] . "'><br><br/>                    " ;
                        $html .= "Apellido: <input type='text' name='Apellido' value='" . $reg['Apellido'] . "'><br><br/>";
                        $html .= "Nombre:  <input type='text' name='Nombre' value='" . $reg['Nombre'] . "'><br><br/>";
                        $html .= "Inicial_del_segundo_apellido: <input  type='text' name='Inicial_del_segundo_apellido' value='" . $reg['Inicial_del_segundo_apellido'] . "'><br><br/>" ;
                        $html .= "Trabajo_ID: <input type='text' name='Trabajo_ID' value='" . $reg['Trabajo_ID'] . "'disabled><br><br/>";
                        $html .= "Jefe_ID: <input type='text' name='Jefe_ID' value='" . $reg['Jefe_ID'] . "'disabled><br><br/>";
                        $html .= "Fecha_contrato: <input type='date' name='Fecha_contrato' value='" . $reg['Fecha_contrato'] . "'><br><br/>";
                        $html .= "Salario: <input type='text' name='Salario' value='" . $reg['Salario'] . "'disabled><br><br/>";
                        $html .= "Comision: <input type='text' name='Comision' value='" . $reg['Comision'] . "'disabled><br><br/>";
                        $html .= "Departamento_ID: <input type='text' name='Departamento_ID' value='" . $reg['Departamento_ID'] . "'disabled><br><br/>";
                        $html .= "<input type='submit' name='btnModificar' value='Modificar'>";
                        $html .= "</fieldset></form>";
                        
                    }
                    echo $html;
                    
                    ?>
                    <?php

                    if (isset($_POST['btnModificar'])) {
                  
                             $clienteID=$_POST['hiddenCLIENTE'];
                             $Apellido=$_POST['Apellido'];
                             $Nombre=$_POST['Nombre'];
                             $Inicial_del_segundo_apellido=$_POST['Inicial_del_segundo_apellido'];
                             $Fecha_contrato=$_POST['Fecha_contrato'];
 
                        try {
                            $conn = conectar();
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $sql = "UPDATE empleados SET Apellido=:nom, Nombre=:dir, Inicial_del_segundo_apellido=:ciu, Fecha_contrato=:ca WHERE empleado_ID=:cli";
                                $stms = $conn->prepare($sql);
                                $stms->bindParam(':cli', $clienteID);
                                $stms->bindParam(':nom', $Apellido);
                                $stms->bindParam(':dir', $Nombre);
                                $stms->bindParam(':ciu', $Inicial_del_segundo_apellido);
                                $stms->bindParam(':ca', $Fecha_contrato);
                             
                            if($stms->execute())
                                ECHO  "El empleado se ha Actualizado correctamente";
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                        $conn = null;
                    }
                    break;

                    case 'trabajos':
                    //****************Trabajos NO PERMITE CAMBIAR DATOS POR SEGURIDAD******************
                        if (isset($_POST['btnEnviar'])) {
                
                            try {
                                $conn = conectar();
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $sql = "SELECT * FROM trabajos WHERE Trabajo_ID=:cod;";
                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(':cod', $_POST['Trabajo_ID']);
                                $stmt->execute();
                                $reg = $stmt->fetch(PDO::FETCH_ASSOC);
                                //si lo encuentra pinta un formulario para intoducir 
                                if ($reg <= 0) {
                                    ECHO "El TRABAJO a modificar NO existe en la BD";
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
                        
                        if (!$datosCorrectos) {
                            $html = "<form action='' method='post'>";
                            $html .= "<fieldset><legend>Código TRABAJO a modificar</legend>";
                            $html .= "Trabajo_ID: <input type='text' name='Trabajo_ID' required><br><br/>";
                            $html .= "<input type='submit' name='btnEnviar' value='Buscar'>";
                            $html .= "</fieldset></form>";
                        } else {
                            
                            $html = "<form action='' method='post'>";
                            $html .="<fieldset><legend>Datos actuales del trabajo a modificar</legend>" ;
                            $html .="<input type='hidden' name='hiddenCLIENTE' value='" . $reg['Trabajo_ID'] . "'disabled>" ;
                            $html .= "Funcion: <input type='text' name='Funcion' value='" . $reg['Funcion'] . "'disabled><br><br/>";
                            $html .= "</fieldset></form>";
                            $html .= "No tienes permisos para modificar esta BD";
                            
                        }
                        echo $html;
                        
                         
                        break;

                        case 'ubicacion';
                        //****************UBICACION NO PERMITE CAMBIAR DATOS POR SEGURIDAD******************
                        if (isset($_POST['btnEnviar'])) {
                
                            try {
                                $conn = conectar();
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $sql = "SELECT * FROM ubicacion WHERE Ubicacion_ID=:cod;";
                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(':cod', $_POST['Ubicacion_ID']);
                                $stmt->execute();
                                $reg = $stmt->fetch(PDO::FETCH_ASSOC);
                                //si lo encuentra pinta un formulario para intoducir 
                                if ($reg <= 0) {
                                    ECHO "La UNICACIÓN a modificar NO existe en la BD";
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
                            $html .= "<fieldset><legend>Código UBICACION a modificar</legend>";
                            $html .= "Ubicacion_ID: <input type='text' name='Ubicacion_ID' required><br><br/>";
                            $html .= "<input type='submit' name='btnEnviar' value='Buscar'>";
                            $html .= "</fieldset></form>";
                        } else {
                            
                            $html = "<form action='' method='post'>";
                            $html .="<fieldset><legend>Datos actuales del trabajo a modificar</legend>" ;
                            $html .="<input type='hidden' name='hiddenCLIENTE' value='" . $reg['Ubicacion_ID'] . "'disabled>" ;
                            $html .= "Funcion: <input type='text' name='Funcion' value='" . $reg['GrupoRegional'] . "'disabled><br><br/>";
                            $html .= "</fieldset></form>";
                            $html .= "No tienes permisos para modificar esta BD";
                            
                        }
                        echo $html;
                        
                         
                        break;
    }
    ?>
    <a href='../menu.php?user=<?=$user?>&contraseña=<?=$contraseña?>'>Inicio</a>
    <input type='button' onclick='history.back()' name='volver atrás' value='volver atrás'>
</body>

</html>