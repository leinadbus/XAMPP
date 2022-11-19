<?php
class Alumno {
    private $nombre;
    private $apellidos;
    private $telefono;
    private $correo;

    function __construct ($nom,$ape,$tel,$cor) {
        $this->nombre=$nom;
        $this->apellidos=$ape;
        $this->telefono=$tel;
        $this->correo=$cor;
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

    public function set_nombre ($telefono) {
        $this->telefono=$telefono;
    }
//CORREO
    public function get_correo () {
        return $this->correo;
    }

    public function set_nombre ($correo) {
        $this->correo=$correo;
    }

    //if(str_contains($texto,'caracter')==true && true) return true;

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
   
}
?>