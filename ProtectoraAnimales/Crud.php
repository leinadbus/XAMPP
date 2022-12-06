<?php
require 'Conexion.php';

abstract class Crud extends Conexion{

    private $tabla;
    //private $conexion;

    function __construct ($con,$tabla){
        parent::__construct($con);
        $this->tabla=$tabla;
    }


    public function obtieneTodos (){
        try {
            $conn=parent::conectar();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql= "SELECT * FROM $this->tabla ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $registros=$stmt->fetchAll(PDO::FETCH_OBJ);
            return($registros);
        }catch (PDOException $e){
            echo "Error: " . $e->getMessage();
        }

    }

    public function obtienedeid ($id) {
        try{
            $conn=parent::conectar();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql= "SELECT * FROM $this->tabla WHERE id=$id ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $registros=$stmt->fetchAll(PDO::FETCH_OBJ);
            return($registros);
        }catch (PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public function borrar ($id) {
        try{
            $conn=parent::conectar();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql= "DELETE FROM $this->tabla WHERE id=$id ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $registros=$stmt->fetchAll(PDO::FETCH_OBJ);
            return($registros);
        }catch (PDOException $e){
            echo "Error: " . $e->getMessage();
        }

    }

    abstract function crear();
    abstract function actualizar();

}

//  $ejenplo= new Crud ('protectora', 'animales');
//  print_r($ejenplo);
// //  $registro=$ejenplo->obtieneTodos();
// //  print_r($registro);
//  $registross=$ejenplo->borrar(9);
//  print_r($registross);
?>