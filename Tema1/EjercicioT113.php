<?php
/*13. Realiza un programa en php en el que se declare un vector de 5 posiciones. Cada
posición tomará como valor un color distinto (azul, rojo, verde, rosa, naranja). A
continuación, deberá de comprobar si el valor rosa se encuentra almacenado en el array.
Si es así, deberá de borrar el elemento del array.
*/

$colores = array ("azul", "rojo", "verde", "rosa", "naranja");

print_r($colores);

foreach($colores as $color){
    echo $color . "<br>";
}


if (in_array("rosa",$colores)){
    unset($colores[array_search("rosa",$colores)]);
}

print_r($colores);

foreach($colores as $color){
    echo $color . "<br>";
}
?>