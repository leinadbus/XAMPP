<!--Crear un formulario que solicite el nombre de persona y su edad, luego mostrar en otra
página si es mayor de edad (si la edad es mayor o igual a 18). Utiliza el método GET.
-->
<html>
    <head>

    <meta charset="UTF-8"/>

    <?php
    /*
    echo $_GET['botonEnviar'];

    if(isset($_GET['botonEnviar'])){
        $numero = (int)$_GET['number'];

        $nombre = $_GET['nombre'];

        echo $nombre;

        if ($numero>=18)
            echo "Mayor de edad";
        else 
            echo "Menor de edad";

    }
    */
    ?>

    </head>

    <body>

    <form method="get" action="ejercicio202.php">

            <label for="nombre">Nombre</label>

            <input type="text" name="nombre" required></input>

            <label for="edad">Edad</label>

            <input type="number" name="edad" required></input>

            <p><input type="submit" name="botonEnviar" value="Enviar Datos"></input></p>

        </form>

    </body>
</html>