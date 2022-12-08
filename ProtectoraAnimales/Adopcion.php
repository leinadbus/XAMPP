<?php
require 'Animal.php';

class Adopcion extends Crud {
    
    private $Id;
    private $idanimal;
    private $idusuario;
    private $fecha;
    private $razon;
    
   // private $conexion;
    public static $TABLA = 'adopciones';

    function __construct ($idanimal, $idusuario, $fecha, $razon, $conexion){
        parent::__construct($conexion,self::$TABLA);
        //$this->Id=$id;
        $this->idanimal=$idanimal;
        $this->idusuario=$idusuario;
        $this->fecha=$fecha;
        $this->razon=$razon;
        // $this->color=$color;
        // $this->edad=$edad;
        //$this->conexion=$conexion;

    }
//ID
    public function get_id () {
        return $this->Id;
    }

    public function set_id ($id) {
        $this->Id=$id;
    }
//IDANIMAL
    public function get_idanimal () {
        return $this->idanimal;
    }

    public function set_idanimal ($idanimal) {
        $this->idanimal=$idanimal;
    }
//ISUSUARIO
    public function get_idusuario () {
        return $this->idusuario;
    }

    public function set_idusuario ($idusuario) {
        $this->idusuario=$idusuario;
    }
//FECHA
    public function get_fecha () {
        return $this->fecha;
    }

    public function set_fecha ($fecha) {
        $this->fecha=$fecha;
    }
//RAZON
    public function get_genero () {
        return $this->genero;
    }

    public function set_genero ($genero) {
        $this->genero=$genero;
    }

//CONEXION
    public function get_razon () {
        return $this->razon;
    }

    public function set_razon ($razon) {
        $this->razon=$razon;
    }



    function crear (){
        try{
        $conn=parent::conectar();
//RECOGEMOS EL MAXIMO IF Y LO GUARDAMOS EN LAS PROPIEDADES DE LA INSTANCIA
        $sql="SELECT MAX(id) from adopciones;";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $registros=$stmt->fetch();
        $this->Id=$registros[0]+1;
//INSERTAMOS EN LA BD CON LOS VALORES
        $sql="INSERT INTO adopciones (idAnimal, idUsuario, fecha, razon) VALUES (:A,:B,:C,:D)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':A', $this->idanimal);
        $stmt->bindParam(':B', $this->idusuario);
        $stmt->bindParam(':C', $this->fecha);
        $stmt->bindParam(':D', $this->razon);
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
        $sql = "UPDATE adopciones SET idAnimal=:A, idUsuario=:B, fecha=:C, razon=:E WHERE id=:D";
        $stms = $conn->prepare($sql);
        $stms->bindParam(':A', $this->idanimal);
        $stms->bindParam(':B', $this->idusuario);
        $stms->bindParam(':C', $this->fecha);
        $stms->bindParam(':D', $this->Id);
        $stms->bindParam(':E', $this->razon);
    
        if($stms->execute())
        ECHO  "La adopcion se ha Actualizado correctamente";
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