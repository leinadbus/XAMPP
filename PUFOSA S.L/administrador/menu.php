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
    width: 30%;
    height: 30%;
        }
        li{
            text-decoration:none;
            display:inline-block;
            padding:5px 10px;
    }
    </style>
    <?php
require "../conexión.php";

$conn=conectar();
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$user=$_GET['user'];
$contraseña=$_GET['contraseña'];
$empresario='';
$registro = fopen("pufosaRegistros.txt","a+b");
//-----------------COMPROBACIÓN DEL LOGIN-----------------

if ($contraseña != 1111){
    header("location:../index.php?msg=contraseña incorrecta");
}else{

    //Esta consulta comprueba la existencia y el rol del empleado, si el empleado no existe la consulta devuelve null, lo que nos da el error
        $sql = "SELECT Funcion FROM empleados, trabajos where empleados.empleado_ID = '$user' AND empleados.Trabajo_ID=trabajos.Trabajo_ID;";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $registros=$stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if($registros==null){
            header("location:../index.php?msg=Usuario incorrecto");
           
        }else {
            //Según el roll, el valor que guardamos determina la opciones que se nos muestran en esta página
            $result=$conn->query($sql);
            $num=$result->fetch();
 
            if (($num['Funcion'])=='MANAGER'){
                
                echo "<p>Bienvenid@ Administrador/a</p>";
            }else if ($num['Funcion']=="PRESIDENT"){
                //Si el roll es empresario, se nos mostrará la opción del informe de departamento
                echo "<p>Bienvenid@ Presidente/a</p>";
                $empresario= "<a href='operaciones/informeP.php?user=$user&contraseña=$contraseña'>Informe Dpts</a>";
            }else header("location:../usuario/menu.php?user=$user&contraseña=$contraseña");
        }

    $conn=null;
}

?>
</head>
<body>
    <h1>PUFOSA S.L.</h1>
    <!-- El html contempla cerrar sesión y dos selects que nos llevan a donde le pidamos con sus correspondientes valores de login -->
    
<p></p>

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

    <!--Recogemos las variables de login para poder transportarlas por los documentos -->
    <input type="hidden" name="user" value="<?=$user?>">
    <input type="hidden" name="contraseña" value="<?=$contraseña?>">

<input type="submit" name="enviar" value="Enviar datos">
</form>
<ul>
        <li><a href='pufosaRegistros.php?user=$user&contraseña=$contraseña'>Fichero LOG</a></li>
        <li><?php echo $empresario ?></li>
        <li><a href="../index.php">Cerrar Sesión</a></li>

    </ul>
 <?php
 
//-----------------COMPROBACIÓN DE SELECCIÓN-----------------

//Dependiendo de la elección del usuario, se mandan los valores con los que navegamos en las siguientes páginas
//valor determina que partes de código se ejecutan en dichos archivos y user y contraseña los mandamos para dos acciones:
//  - Para poder crear un botón de Inicio que nos transporta a esta misma página con los mismos privilegios
//  - Para poder crear en el Log los datos de escritura según el usuario.

if (isset($_POST['enviar'])){
    $user=$_POST['user'];
    switch($_POST["tabla"]){
        case 5:
            switch($_POST["accion"]){
                case 1:
                    header("location:operaciones/ver.php?valor=cliente&user=$user&contraseña=$contraseña");
                    break;
                case 2:
                    header("location:operaciones/añadir.php?valor=cliente&user=$user&contraseña=$contraseña");
                    break;
                case 3:
                    header("location:operaciones/editar.php?valor=cliente&user=$user&contraseña=$contraseña");
                    break;
                case 4:
                    header("location:operaciones/borrar.php?valor=cliente&user=$user&contraseña=$contraseña");
                    break;

            }
        break;
        case 6:
            switch($_POST["accion"]){
                case 1:
                    header("location:operaciones/ver.php?valor=departamento&user=$user&contraseña=$contraseña");
                    break;
                case 2:
                    header("location:operaciones/añadir.php?valor=departamento&user=$user&contraseña=$contraseña");
                    break;
                case 3:
                    header("location:operaciones/editar.php?valor=departamento&user=$user&contraseña=$contraseña");
                    break;
                case 4:
                    header("location:operaciones/borrar.php?valor=departamento&user=$user&contraseña=$contraseña");
                    break;

            }
            break;
        case 7:
            switch($_POST["accion"]){
                case 1:
                    header("location:operaciones/ver.php?valor=empleados&user=$user&contraseña=$contraseña");
                    break;
                case 2:
                    header("location:operaciones/añadir.php?valor=empleados&user=$user&contraseña=$contraseña");
                    break;
                case 3:
                    header("location:operaciones/editar.php?valor=empleados&user=$user&contraseña=$contraseña");
                    break;
                case 4:
                    header("location:operaciones/borrar.php?valor=empleados&user=$user&contraseña=$contraseña");
                    break;

            }
            break;
        case 8:
            switch($_POST["accion"]){
                case 1:
                    header("location:operaciones/ver.php?valor=trabajos&user=$user&contraseña=$contraseña");
                    break;
                case 2:
                    header("location:operaciones/añadir.php?valor=trabajos&user=$user&contraseña=$contraseña");
                    break;
                case 3:
                    header("location:operaciones/editar.php?valor=trabajos&user=$user&contraseña=$contraseña");
                    break;
                case 4:
                    header("location:operaciones/borrar.php?valor=trabajos&user=$user&contraseña=$contraseña");
                    break;

            }
            break;
        case 9:
            switch($_POST["accion"]){
                case 1:
                    header("location:operaciones/ver.php?valor=ubicacion&user=$user&contraseña=$contraseña");
                    break;
                case 2:
                    header("location:operaciones/añadir.php?valor=ubicacion&user=$user&contraseña=$contraseña");
                    break;
                case 3:
                    header("location:operaciones/editar.php?valor=ubicacion&user=$user&contraseña=$contraseña");
                    break;
                case 4:
                    header("location:operaciones/borrar.php?valor=ubicacion&user=$user&contraseña=$contraseña");
                    break;

            }
            break;
            default: echo "Algo salió mal";
        
    } 
}
?>

</body>
</html>