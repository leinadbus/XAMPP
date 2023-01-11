<html>
    <head>
<meta charset="UTF-8">
    </head>

    <body>
<?php

$sueldo=2750;

$retencion=22;

$final=($sueldo+100)/$retencion;

$sueldoFinal=$sueldo-$final;

echo "<h1>El sueldo inicial es de " . $sueldo . "€</h1>";

echo "<br><h2>La retencion es del " . $retencion . "%, es decir, un total de ". $final ."€</h2>";

echo "<br><p>El sueldo final percibido es de <b>" . $sueldoFinal . "€</b></p>";


?>
    </body>

    </html>