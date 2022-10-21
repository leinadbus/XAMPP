<?php
/*18. Realizar un script en PHP se obtenga un número aleatorio entre 1 y 100.
Deberá mostrarse en pantalla el número generado y la suma de todos los números
pares anteriores a él.
*/

$numero = rand(1,100);

$suma=0;

echo $numero . "<br>";

for ($i=1;$i<=$numero;$i++){

    if ($i%2==0){

        echo $i . "<br>";

        $suma = $suma + $i;

    }

}

echo $suma;

?>