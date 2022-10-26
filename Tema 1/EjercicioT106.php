<?php

$num1= 2;

if(is_integer($num1)){

        if ($num1%2==0)
        echo "el numero " . $num1 . " es par";

        else
        echo "el numero " . $num1 . " es impar";

}else
    echo $num1 ." no es un número";
?>