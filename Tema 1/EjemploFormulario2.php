
<html>
    <head>

    <?php
    //toda la información enviada por html se envia como texto, por mucho que pongamos type number
    // el html lo manda igualmente en texto, son solo para facilitar allado cliente y la estetica.
    //Si queremos trabajar con otro tipo de dato, tendremos que hacer casting

    //NO FUNCIONA SI CAMBIAMOS LA PRUEBA....PROBAR A MEJORARLO
if(isset($_POST['botonEnviar'])){ 
    $nombre =  (int)$_POST['nombre'];

    if(is_integer($nombre))
        echo "Admitido <br>";
    else
        echo "No admitido <br>";

    echo "Bienvenid@ $nombre";
}
    ?>

    </head>

    <body>

<form method="post" action="EjemploFormulario2.php">

    <label for="nombre" >Nombre:</label>

    <input type="number" name="nombre" required></input>

    <p><input type="submit" name="botonEnviar" value="Enviar datos"></p></input>

</form>

    </body>

</html>