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

    </style>
    <?php
require "../conexión.php";

$conn=conectar();
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$user=$_POST['user'];
$contraseña=$_POST['contraseña'];
$empresario='';

if ($contraseña != 1111){
    header("location:../index.php?msg=contraseña incorrecta");
}else{

    
        $sql = "SELECT Funcion FROM empleados, trabajos where empleados.empleado_ID = '$user' AND empleados.Trabajo_ID=trabajos.Trabajo_ID;";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $registros=$stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if($registros==null){
            header("location:../index.php?msg=Usuario incorrecto");
           
        }else {
            
            $result=$conn->query($sql);
            $num=$result->fetch();
 
            if (($num['Funcion'])=='MANAGER'){
                
                echo "<p>Bienvenid@ Administrador/a</p>";
            }else if ($num['Funcion']=="PRESIDENT"){
                
                echo "<p>Bienvenid@ Presidente/a</p>";
                $empresario= "<a href=''>Informe de Departamentos</a>";
            }else header("location:../usuario/menu.php");
        }

    $conn=null;
}

?>
</head>
<body>
    <h1>PUFOSA S.L.</h1>
    <form method="post" >

    <fieldset>
            <legend>¿Qué quieres hacer?</legend>
    <select name="accion">
     <option value="1">Ver Tablas</option>
     <option value="2">Añadir datos</option>
     <option value="3">Editar Tablas</option>
     <option value="4">Borrar Datos</option>
    </select>
</fieldset>
<fieldset>
            <legend>¿De qué tabla?</legend>
    <select name="tabla">
     <option value="5">Clientes</option>
     <option value="6">Departamentos</option>
     <option value="7">Empleados</option>
     <option value="8">Trabajos</option>
     <option value="9">Ubicación</option>
    </select>
    </fieldset>

    <p><?php echo $empresario ?></p>

<p><input type="submit" name="enviar" value="Enviar datos"></p>
</form>

 <?php
 
if (isset($_POST['enviar'])){
    
    switch($_POST["tabla"]){
        case 5:
            switch($_POST["accion"]){
                case 1:
                    header("location:operaciones/ver.php?valor=cliente");
                    break;
                case 2:
                    header("location:operaciones/añadir.php?valor=cliente");
                    break;
                case 3:
                    header("location:operaciones/editar.php?valor=cliente");
                    break;
                case 4:
                    header("location:operaciones/borrar.php?valor=cliente");
                    break;

            }
        break;
        case 6:
            switch($_POST["accion"]){
                case 1:
                    header("location:operaciones/ver.php?valor=departamento");
                    break;
                case 2:
                    header("location:operaciones/añadir.php?valor=departamento");
                    break;
                case 3:

                    break;
                case 4:
                    header("location:operaciones/borrar.php?valor=departamento");
                    break;

            }
            break;
        case 7:
            switch($_POST["accion"]){
                case 1:
                    header("location:operaciones/ver.php?valor=empleados");
                    break;
                case 2:
                    header("location:operaciones/añadir.php?valor=empleados");
                    break;
                case 3:

                    break;
                case 4:
                    header("location:operaciones/borrar.php?valor=empleados");
                    break;

            }
            break;
        case 8:
            switch($_POST["accion"]){
                case 1:
                    header("location:operaciones/ver.php?valor=trabajos");
                    break;
                case 2:
                    header("location:operaciones/añadir.php?valor=trabajos");
                    break;
                case 3:

                    break;
                case 4:
                    header("location:operaciones/borrar.php?valor=trabajos");
                    break;

            }
            break;
        case 9:
            switch($_POST["accion"]){
                case 1:
                    header("location:operaciones/ver.php?valor=ubicacion");
                    break;
                case 2:
                    header("location:operaciones/añadir.php?valor=ubicacion");
                    break;
                case 3:

                    break;
                case 4:
                    header("location:operaciones/borrar.php?valor=ubicacion");
                    break;

            }
            break;
            default: echo "Algo salió mal";
        
    } 
}
?>
</body>
</html>