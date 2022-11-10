<?php
/*Clase abstracta ReadingMaterial
○ variables privadas: id, title, pages, price
○ objeto private editor de la clase Publisher (ver descripción de la clase más abajo)
○ debe incluir:
▪ constructor
▪ métodos getter y setter*/

//include_once 'Publisher.php';
require 'Publisher.php';
/*include 'Magazine.php';
include 'Book.php';*/

//$publisher1 = new Publisher ("001","Jorjo", "C/ Flores", "666999888", "www.publisher.com");


//------------------------------------------------------------------------------------------



//SI PONEMOS FINAL EN UNA CLASE O EN UN METODO, CORTA LA CADENA DE HERENCIA, NO PUEDE SER HEREDADA
//UNA CLASE FINAL ABSTRACT CLASS NO TIENE SENTIDO PUES LAS CLASES ABSTRACTAS SON FORZADAS A IMPLEMENTAR MÉTODOS
//LA INTERFAZ NO TIENE ATRIBUTOS, SIEMPRE SON CONSTANTES
//LA INTERFAZ SI TIENE HERENCIA MULTIPLE

//SE PUEDEN SOBREESCRIBIR METODOS HEREDADOS

//PHP NO PERMITE CREAR DOS CONSTRUCTORES

//------------------------------------------------------------------------------------------


abstract class ReadingMaterial {
    private static $id = 0;
    private $title;
    private $pages;
    private $price;
    private Publisher $atributoPubliser;
   

    function __construct ($tit,$pag,$pri,$atributoPublis) { //$id que le he quitado
        self::$id++;//De ismael
        $this->title=$tit;
        $this->pages=$pag;
        $this->price=$pri;
        $this->atributoPubliser=$atributoPublis;
    }


    public function get_id (){
        return $this->id;
    }

    public function set_id ($id) {
        $this->id=$id;
    }

    public function get_title (){
        return $this->title;
    }

    public function set_title ($tit) {
        $this->title=$tit;
    }

    public function get_pages (){
        return $this->pages;
    }

    public function set_pages ($pag) {
        $this->pages=$pag;
    }

    public function get_price (){
        return $this->price;
    }

    public function set_price ($pri) {
        $this->price=$pri;
    }

}


?>