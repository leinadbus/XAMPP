
<html>
    <head>

    <?php
    //isset valida si el campo tiene dato o no, si no tiene dato no muestra nada
    //Si no ponemos el isset nos aparece un warning ya que ejecuta antes de recibir lainformación
if(isset($_POST['nombre'])){ 
    $nombre =  $_POST['nombre'];

    echo "Bienvenid@ $nombre";
}
    ?>

    </head>

    <body>

<form method="post" action="EjemploFormulario.php">

    <label for="nombre" >Nombre:</label>

    <input type="text" name="nombre" required></input>

    <p><input type="submit" name="botonEnviar" value="Enviar datos"></p></input>

</form>

    </body>

</html>