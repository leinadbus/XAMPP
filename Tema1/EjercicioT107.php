<?php

$numero = rand(0, 100);

echo "El numero generado es " . $numero;

if ($numero>50)
    echo "<br>Es mayor que el numero 50";

    elseif ($numero<50)
    echo "<br>Es menor que el numero 50";

    else
    echo "<br>Es igual que 50";

?>