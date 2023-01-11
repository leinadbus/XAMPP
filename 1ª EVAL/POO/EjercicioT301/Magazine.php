<?php
/*Clase pública Magazine (hija de ReadingMaterial)
○ variable privada: additionalResources
○ debe incluir:
▪ constructor
▪ métodos getter y setter*/

class Magazine extends ReadingMaterial{

    private $additionalResources;

    function __construct ($adr,$tit,$pag,$pri,$publi){
        $this->additionalResources=$adr;
        parent::__construct($tit,$pag,$pri,$publi);
    }

    public function get_adre () {
        return $this->additionalResources;
    }

    public function set_adre ($adr) {
        $this->additionalResouces=$adr;
    }
}
?>