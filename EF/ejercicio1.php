<?php

if(isset($_POST['botonEnviar'])){
    $numero = (int)$_POST['number'];

    $i=0;

    while ($i<$numero) {
        echo "Los bucles son fáciles <br>";

        $i++;
    }
}


?>