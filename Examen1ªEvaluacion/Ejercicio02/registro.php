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
    width: 50%;
    height: 50%;
        }
        fieldset {
        margin: 0 auto;
    text-align: left;
    width: 30%;
    height: 30%;
        }
        li{
            text-decoration:none;
            display:inline-block;
            padding:5px 10px;
    }

    </style>
</head>
<body>
<?php
       include "identificador.php";

$tblDatos = null;
$servidor = "localhost";
$usuario ="root";
$clave ="";
$sql="";

//Recogemos de identificador.php el valor necesario y le sumamos uno para que nos de el número
$numerosiguiente=$fila[0]+1;

//Declaramos el contador de fallos para controlar el número de intentos:


//Realizamos la conexión:
$conn = new PDO ("mysql:host=$servidor;dbname=mibbdd;charset=utf8",$usuario,$clave);

        //asignamos el modo excepción
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       //-----------------------------------CLASE ALUMNO-------------------------------
       class Alumno {
        private $codigo;
        private $nombre;
        private $apellidos;
        private $telefono;
        private $correo;
    
        function __construct ($cod,$nom,$ape,$tel,$cor) {
            $this->codigo=$cod;
            $this->nombre=$nom;
            $this->apellidos=$ape;
            $this->telefono=$tel;
            $this->correo=$cor;
        }
    //CODIGO
        public function get_codigo () {
            return $this->codigo;
        }
    
        public function set_codigo ($codigo) {
            $this->codigo=$codigo;
        }
    //NOMBRE
        public function get_nombre () {
            return $this->nombre;
        }
    
        public function set_nombre ($nombre) {
            $this->nombre=$nombre;
        }
    //APELLIDOS
        public function get_apellidos () {
            return $this->nombre;
        }
    
        public function set_apellidos ($apellidos) {
            $this->apellidos=$apellidos;
        }
    //TELEFONO
        public function get_telefono () {
            return $this->telefono;
        }
    
        public function set_telefono ($telefono) {
            $this->telefono=$telefono;
        }
    //CORREO
        public function get_correo () {
            return $this->correo;
        }
    
        public function set_correo ($correo) {
            $this->correo=$correo;
        }
    
        function comprobacionCorreo ($valor) {
            $arroba= strpos($valor, "@");
            $punto= strpos($valor, ".");
            $comprobadorarroba=false;
            $comprobadorpunto=false;
            if($arroba===false) {
                $comprobadorarroba=false;
           }else  $comprobadorarroba=true;
           
            if($punto===false) {
                $comprobadorpunto=false;
            }else $comprobadorpunto=true;
    
            if($comprobadorarroba && $comprobadorpunto){
                return true;
            }else return false;
    
        }
    
        public function toString (){
            return $this->nombre ;
        }
       
    }
    //-----------------------------------cierrE-------------------------------

       if (isset($_POST["btnEnviar"])) {
        // $fallosLogin=$_POST['intentos'];
        // echo $fallosLogin;
        $intentos=$_POST['intentos']+1;

            $nombre= $_POST['NOMBRE']??'';
            $apellido=$_POST['APELLIDOS']??'';
            $telefono=$_POST['TELEFONO']??'';
            $correo=$_POST['CORREO']??'';
                // echo $nombre;
            $alumno= new Alumno($numerosiguiente,$nombre,$apellido,$telefono,$correo);
            try {
                 if (!$alumno->comprobacionCorreo($correo)){
                         //echo "Correo no válido";
                          
                         //echo "Llevas:",$intentos, " intentos";
                         $msgConfirmación="Correo no válido Llevas ".$intentos." intentos";
                        
                         $archivo = fopen("registrosLogin.txt","a+b");
                         $sentenciaEscritura= $msgConfirmación .  " \n " ;
                         fwrite($archivo, $sentenciaEscritura );    
                         rewind($archivo);
                         //comprobamos los intentos para redirigir en caso de superación y lo escribimos en LOG
                                 if($intentos==3){
                                    $msg="Superados los 3 intentos de inicio de sesión." ;
                                    $archivo = fopen("registrosLogin.txt","a+b");
                                    $sentenciaEscritura= $msg .  " \n " ;
                                    fwrite($archivo, $sentenciaEscritura );    
                                    rewind($archivo);
                                            //redirigimos
                                    header("location:error.php");
                                 }
                 }
                 else{
                    
                        $alumcodigo=$alumno->get_codigo();
                        $alumnombre=$alumno->get_nombre();
                        $alumpellido=$alumno->get_apellidos();
                        $alumtel=$alumno->get_telefono();
                        $alumcor=$alumno->get_correo();
                        //echo $alumnombre,$alumpellido,$alumtel,$alumcor,"</br>";
                        
                        $sql = "INSERT INTO alumnos (CODIGO, NOMBRE, APELLIDOS, TELEFONO, CORREO) VALUES (:p,:a, :b, :c, :d); ";
                        $stmt = $conn->prepare($sql);
                        
                        $stmt->bindParam(':p', $alumcodigo);
                        $stmt->bindParam(':a', $alumnombre);
                        $stmt->bindParam(':b',$alumpellido );
                        $stmt->bindParam(':c',$alumtel );
                        $stmt->bindParam(':d', $alumcor);
                      

                        if ($stmt->execute()) 
                        $msg="Inserción correcta del alumno: " . $alumnombre . " con sentencia: " . $sql ;
                        $archivo = fopen("registrosLogin.txt","a+b");
                        $sentenciaEscritura= $msg .  " \n " ;
                        fwrite($archivo, $sentenciaEscritura );    
                        rewind($archivo);
                        //print_r($stmt);
                        //echo $sql;
                            //echo "Insertado correctamente";
                            $msgConfirmación="Insertado correctamente";
                           // header("location:registro.php?$msgConfirmación=Insertado correctamente");
                           print_r($alumno);
                    }
                }catch (PDOException $e){
                    //echo $e;
                    echo 'Algo salió mal escribiendo los datos. </br>';
                    $msg="Algo salió mal escribiendo los datos: " ;
                    $archivo = fopen("registrosLogin.txt","a+b");
                    $sentenciaEscritura= $msg .  " \n " ;
                    fwrite($archivo, $sentenciaEscritura );    
                    rewind($archivo);
                }
    

            }
        
       
       ?>

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

        <!--<input type='text' name='mensaje' value="<?php $msgConfirmación??''?>">-->

        <input type="hidden" name="intentos" value="<?=$intentos??'0'?>">

        <label for='mensajes'>Avisos</label>
        <input type="textarea" name="mensajes" value="<?=$msgConfirmación??''?>" disabled>
        

        <input type='submit' name='btnEnviar' >

        </fieldset>
        
       </form>

       
</body>
</html>