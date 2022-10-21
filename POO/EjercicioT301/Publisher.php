<?php
/*Clase pública Publisher
○ variable privadas: id, name, address, telephone, website
○ debe incluir:
▪ constructor
▪ métodos getter y setter*/

class Publisher {

    private static $id=0;
    private $name;
    private $address;
    private $telephone;
    private $website;

    function __construct ($nam,$add,$tel,$web) {
        self::$id++;
        $this->name=$nam;
        $this->address=$add;
        $this->telephone=$tel;
        $this->website=$web;
    }

    public function set_id ($id) {
        $this->id=$id;
    }

    public function get_id () {
        return $this->id;
    }

    public function set_name ($nam) {
        $this->name=$nam;
    }

    public function get_name () {
        return $this->name;
    }

    public function set_address ($add) {
        $this->address=$add;
    }

    public function get_address () {
        return $this->address;
    }

    public function set_telephone ($tel) {
        $this->telephone=$tel;
    }

    public function get_telephone () {
        return $this->telehpone;
    }

    public function set_website ($web) {
        $this->website=$web;
    }

    public function get_website () {
        return $this->website;
    }

    
}
?>