<?php
require 'Publisher.php';
abstract class ReadingMaterial 
{
    private $id;
    private $title;
    private $pages ;
    private $price ;
    private $editor;

    public function __construct($id,$title,$pages,$price,$editor)
    {
        $this->id=$id;
        $this->title=$title;
        $this->pages=$pages;
        $this->price=$price;
        $this->editor=$editor;
    }

    public function get_Id()
    {
        return $this->id;
    }

    public function set_Id($id)
    {
        $this->id=$id;;
    }

    public function get_Title()
    {
        return $this->title;
    }

    public function set_Title($title)
    {
        $this->title=$title;
    }

    public function get_Pages()
    {
        return $this->pages;
    }

    public function set_pages($pages)
    {
        $this->pages=$pages;
    }

    public function get_Price()
    {
        return $this->price;
    }

    public function set_Price($price)
    {
        $this->price=$price;
    }

    


}

?>