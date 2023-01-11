<!-- Aplicación web que realice conversión de una cantidad de euros que se introduzca 
por teclado al tipo de moneda seleccionado
Tipo de conversión para cada moneda es:
1€= 0,00012 Bitcoin
1€ = 1,12$ Dolares
1€ = 0,86 Libras
1€ = 120,82 Yenes Japoneses-->
<html>
    
<head>

    <meta charset="UTF-8">

</head>
<body>

<form method="POST" action ="radioconversionmoneda.php">
    <!--el action no es necesario si los datos se quedan en el mismo documento -->

    <label for="number">¿Cuantos euros?</label>

    <input type="text" name="number" required></input>




<P>Marca el tipo de conversión</p><br>


<input type=radio name="moneda" value="1">Bitcoin<br>
<input type=radio name="moneda" value="2">Dolar<br>
<input type=radio name="moneda" value="3">Libra<br>
<input type=radio name="moneda" value="4">Yen<br>
<p><input type="submit" name="enviar" value="Enviar datos"></p>

<?php
if (isset($_POST['enviar'])){
    $numero = (int)$_POST['number'];

    switch($_POST['moneda']) {
        case 1:
            $bitcoin = $numero * 0.00012;
            echo $numero . "€ = " . $bitcoin . "BTC<br>";
            break;
        case 2:
            $dolar = $numero * 1.12;
            echo $numero . "€ = " . $dolar . "$<br>";
            break;
        case 3:
            $libra = $numero * 0.86;
            echo $numero . "€ = " . $libra . "£<br>";
            break;
        case 4:
            $yen = $numero * 120.82;
            echo $numero . "€ = " . $yen . "¥<br>";
            break;

        default: echo "Algo salió mal";

    }
}


    ?>
</form>
</body>
</html>