<?php

// require 'Usuario.php';
// require 'Animal.php';
require 'Adopcion.php';



$usuario = new Usuario('marcos','pedrino','hombre','amapola 13','918476638',34,'protectora');

// // print_r($usuario);
// // echo "<br/>";
$usuario->crear();

$usuario2 = new Animal('thor','pez','comun','femenino','naranja',3,'protectora');
echo "<br/>";echo "<br/>";
// //print_r($usuario);
// // echo "<br/>";
 $usuario2->crear();
 print_r($usuario2);
 echo "<br/>";echo "<br/>";
 $prueba = new Adopcion($usuario2->get_id(),$usuario->get_id(),'2022-12-07','regalo','protectora');
 echo "<br/>";echo "<br/>";
 print_r($prueba);
 echo "<br/>";echo "<br/>";
 $prueba->crear();
 echo "<br/>";echo "<br/>";
 print_r($prueba);
$prueba->set_razon('pepito');
$prueba->actualizar();
?>