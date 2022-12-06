<?php
require 'Crud.php';

class Usuario extends Crud {
    
    private $Id;
    private $nombre;
    private $apellido;
    private $sexo;
    private $direccion;
    private $telefono;
    private $edad;
    private $conexion;
    public static $TABLA = 'usuarios';

    function __construct ($id, $nombre, $apellido, $sexo, $direccion, $telefono, $edad, $conexion){
        parent::__construct($conexion,self::$TABLA);
        $this->Id=$id;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->sexo=$sexo;
        $this->direccion=$direccion;
        $this->telefono=$telefono;
        $this->edad=$edad;
        $this->conexion=$conexion;

    }
//ID
    public function get_id () {
        return $this->Id;
    }

    public function set_id ($id) {
        $this->Id=$id;
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
        return $this->apellido;
    }

    public function set_ ($apellido) {
        $this->apellido=$apellido;
    }
//SEXO
    public function get_sexo () {
        return $this->sexo;
    }

    public function set_sexo ($sexo) {
        $this->sexo=$sexo;
    }
//DIRECCION
    public function get_direccion () {
        return $this->direccion;
    }

    public function set_direccion ($direccion) {
        $this->direccion=$direccion;
    }
//TELEFONO
    public function get_telefono () {
        return $this->telefono;
    }

    public function set_telefono ($telefono) {
        $this->telefono=$telefono;
    }
//EDAD
    public function get_edad () {
        return $this->edad;
    }

    public function set_edad ($edad) {
        $this->edad=$edad;
    }
//CONEXION
    public function get_conexion () {
        return $this->conexion;
    }

    public function set_conexion ($conexion) {
        $this->conexion=$conexion;
    }



    function crear (){
        try{
        $conn=parent::conectar();
        $sql="INSERT INTO usuarios (nombre, apellido,sexo,direccion, telefono) VALUES (:A,:B,:C,:D,:E)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':A', $this->nombre);
        $stmt->bindParam(':B', $this->apellido);
        $stmt->bindParam(':C', $this->sexo);
        $stmt->bindParam(':D', $this->direccion);
        $stmt->bindParam(':E', $this->telefono);
        $stmt->execute();
            return 'insertado';
        }catch(PDOException $e){
            return "Error: " . $e->getMessage();
        }
    }

    function actualizar (){
        $conn = conectar();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE departamento SET departamento_ID=:cli, Nombre=:nom, Ubicacion_ID=:dir WHERE departamento_ID=:cli";
        $stms = $conn->prepare($sql);
        $stms->bindParam(':cli', $clienteID);
        $stms->bindParam(':nom', $nombre);
        $stms->bindParam(':dir', $direccion);
    
        if($stms->execute())
        ECHO  "El departamento se ha Actualizado correctamente";
    }




}

$usuario = new Usuario('3','pepe','pedrino','hombre','amapola 13','918476638',34,'protectora');

print_r($usuario);

$usuario->crear();
?>