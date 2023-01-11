<?php
require 'Usuario.php';

class Animal extends Crud {
    
    private $Id;
    private $nombre;
    private $especie;
    private $raza;
    private $genero;
    private $color;
    private $edad;
   // private $conexion;
    public static $TABLA = 'animal';

    function __construct ($nombre, $especie, $raza, $genero, $color, $edad, $conexion){
        parent::__construct($conexion,self::$TABLA);
        //$this->Id=$id;
        $this->nombre=$nombre;
        $this->especie=$especie;
        $this->raza=$raza;
        $this->genero=$genero;
        $this->color=$color;
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
//ESPECIE
    public function get_especie () {
        return $this->especie;
    }

    public function set_especie ($especie) {
        $this->especie=$especie;
    }
//RAZA
    public function get_raza () {
        return $this->raza;
    }

    public function set_raza ($raza) {
        $this->raza=$raza;
    }
//GENERO
    public function get_genero () {
        return $this->genero;
    }

    public function set_genero ($genero) {
        $this->genero=$genero;
    }
//COLOR
    public function get_color () {
        return $this->color;
    }

    public function set_color ($color) {
        $this->color=$color;
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
        $sql="SELECT MAX(id) from animal;";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $registros=$stmt->fetch();
        $this->Id=$registros[0]+1;
//INSERTAMOS EN LA BD CON LOS VALORES
        $sql="INSERT INTO animal (nombre, especie, raza, genero, color, edad) VALUES (:A,:B,:C,:D,:E,:F)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':A', $this->nombre);
        $stmt->bindParam(':B', $this->especie);
        $stmt->bindParam(':C', $this->raza);
        $stmt->bindParam(':D', $this->genero);
        $stmt->bindParam(':E', $this->color);
        $stmt->bindParam(':F', $this->edad);
        $stmt->execute();
            echo 'insertado';
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }

    function actualizar (){
        try{
        $conn =parent::conectar();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE animal SET nombre=:A, especie=:B, raza=:C, genero=:E, color=:F, edad=:G WHERE id=:D";
        $stms = $conn->prepare($sql);
        $stms->bindParam(':A', $this->nombre);
        $stms->bindParam(':B', $this->especie);
        $stms->bindParam(':C', $this->raza);
        $stms->bindParam(':D', $this->Id);
        $stms->bindParam(':E', $this->genero);
        $stms->bindParam(':F', $this->color);
        $stms->bindParam(':G', $this->edad);
    
        if($stms->execute())
        ECHO  "El animal se ha Actualizado correctamente";
        }catch(PDOException $e){
            return "Error: " . $e->getMessage();
        }
    }




}

//$usuario = new Animal('pepe','pez','comun','femenino','naranja',3,'protectora');

//print_r($usuario);
// echo "<br/>";
// $usuario->crear();
//  print_r($usuario);

// $usuario->set_genero('masculino');
// $usuario->actualizar();
?>