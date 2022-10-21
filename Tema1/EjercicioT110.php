<?php
/*Realizar un programa en php que escriba por pantalla la sucesión de Fibonacci. Cada
número de la serie de Fibonacci se forma sumando los dos números anteriores
*/

$num1 = 0;
$num2 = 1;

$suma=0;

for ($i=0;$i<100;$i++){
    $suma = $num1 + $num2;
    $num1= $num2;
    $num2=$suma;

    echo "<br>" . $suma;
}

?>