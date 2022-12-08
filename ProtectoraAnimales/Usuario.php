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
   // private $conexion;
    public static $TABLA = 'usuarios';

    function __construct ($nombre, $apellido, $sexo, $direccion, $telefono, $edad, $conexion){
        parent::__construct($conexion,self::$TABLA);
        //$this->Id=$id;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->sexo=$sexo;
        $this->direccion=$direccion;
        $this->telefono=$telefono;
        $this->edad=$edad;
        //$this->conexion=$conexion;

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
//RECOGEMOS EL MAXIMO IF Y LO GUARDAMOS EN LAS PROPIEDADES DE LA INSTANCIA
        $sql="SELECT MAX(id) from usuarios;";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $registros=$stmt->fetch();
        $this->Id=$registros[0]+1;
//INSERTAMOS EN LA BD CON LOS VALORES
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
        try{
        $conn =parent::conectar();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE usuarios SET nombre=:A, apellido=:B, sexo=:C, direccion=:E, telefono=:F WHERE id=:D";
        $stms = $conn->prepare($sql);
        $stms->bindParam(':A', $this->nombre);
        $stms->bindParam(':B', $this->apellido);
        $stms->bindParam(':C', $this->sexo);
        $stms->bindParam(':D', $this->Id);
        $stms->bindParam(':E', $this->direccion);
        $stms->bindParam(':F', $this->telefono);
    
        if($stms->execute())
        ECHO  "El usuario se ha Actualizado correctamente";
        }catch(PDOException $e){
            return "Error: " . $e->getMessage();
        }
    }




}

// $usuario = new Usuario('gavi','pedrino','hombre','amapola 13','918476638',34,'protectora');

// // print_r($usuario);
// // echo "<br/>";
//  $usuario->crear();
// print_r($usuario);

// $usuario->set_sexo('Mujer');
// $usuario->actualizar();
?>