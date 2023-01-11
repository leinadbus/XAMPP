<?php
    

    if(isset($_GET['botonEnviar'])){
        $numero = (int)$_GET['edad'];

        $nombre = $_GET['nombre'];


        echo $nombre;

        echo "<br>";

        if ($numero>=18)
            echo "Mayor de edad";
        else 
            echo "Menor de edad";

    }
    
    ?>