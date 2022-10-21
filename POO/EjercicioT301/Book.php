<?php
/*Clase pública Book (hija de ReadingMaterial)
○ variables privadas: chapters, authors
○ debe incluir:
▪ constructor
▪ métodos getter y setter*/

class Book extends ReadingMaterial{
    private $chapters;
    private $authors;

    function __construct ($chap,$aut,$tit,$pag,$pri,$publi) {
        $this->chapters=$chap;
        $this->authors=$aut;
        parent::__construct($tit,$pag,$pri,$publi);

        }

    public function get_chapters () {
        return $this->chapters;
    }

    public function set_chapters ($chap) {
        $this->chapters=$chap;
    }

    public function get_authors () {
        return $this->authors;
    }

    public function set_authors ($aut) {
        $this->authors=$aut;
    }
}

/*$book1= new Book ("PEPO", "Fernando", "0009", "Las flores del jardin", "390", "20€");

print_r($book1);*/

?>