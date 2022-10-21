<?php
/*11. Realiza un programa en php donde dada la cadena: “Estamos dando nuestros primeros
pasos en programación utilizando el lenguaje php” imprima por pantalla:
• La longitud de la cadena.
• La primera ocurrencia de “os”.
• La búsqueda de la palabra “nuestros”.
• La subcadena “lenguaje php”.
• La subcadena “nuestros primeros pasos”.
• El reemplazo de las palabras estamos por estoy y nuestros por mis.
• Todas las letras de la cadena en minúsculas.
• Todas las letras de la cadena en mayúsculas
• La frase con todas las letras iniciales de cada palabra en mayúscula.
*/

$frase = "Estamos dando nuestros primeros pasos en programación utilizando el lenguaje php";

echo $frase . "<br>";

echo "La longitud de la cadena es de " . mb_strlen($frase) . " caracteres<br>"; //El mb delante de la funcion no cuenta el caracter de la tilde, debemos usarlo siempre con caracteres especiales

echo "La primera ocurrencia 'os' fue encontrada en la posición " . strpos($frase, "os") . "<br>";

echo "La palabra 'nuestros' se encuentra en la posición número " . strrpos($frase,"nuestros") . "<br>";

echo "La subcadena 'lenguaje php' se encuentra en la posición número " . strrpos($frase,"lenguaje php") . "<br>";

echo "La subcadena 'nuestros primeros pasos' se encuentra en la posición número " . strrpos($frase,"nuestros primeros pasos") . "<br>";

$palabrasOrigen = array("Estamos","nuestros");
$palabrasDestino = array ("Estoy", "mis");

$frase2 = str_replace($palabrasOrigen, $palabrasDestino, $frase);

echo $frase2 . "<br>";

echo strtolower($frase) . "<br>";

echo strtoupper($frase) . "<br>";

echo ucwords($frase);

?>