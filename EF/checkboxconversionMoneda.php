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

<form method="POST" action ="checkboxconversionMoneda.php">
    <!--el action no es necesario si los datos se quedan en el mismo documento -->

    <label for="number">¿Cuantos euros?</label>

    <input type="text" name="number" required></input>




<P>Marca el tipo de conversión</p><br>


<input type=checkbox name="bitcoin" value="bit">Bitcoin<br>
<input type=checkbox name="dollar" value="dol">Dolar<br>
<input type=checkbox name="libra" value="lib">Libra<br>
<input type=checkbox name="yen" value="yen">Yen<br>
<p><input type="submit" name="enviar" value="Enviar datos"></p>

<?php
//Ejemplo de otra forma de hacer en las capturas
if (isset($_POST['enviar'])){
    $numero = (int)$_POST['number'];

    if(isset($_POST['bitcoin'])){
        $bitcoin= $numero*0.00012;
        echo $numero . "€ = " . $bitcoin . "BTC<br>";
    }

    if(isset($_POST['dollar'])){
        $dollar=$numero*1.12;
        echo $numero . "€ = " . $dollar . "$<br>";
    }

    if(isset($_POST['libra'])){
        $libra=$numero*0.86;
        echo $numero . "€ = " . $libra . "£<br>";
    }

    if(isset($_POST['yen'])){
        $yen=$numero*120.82;
        echo $numero . "€ = " . $yen . "¥<br>";
    }
}


    ?>
</form>
</body>
</html>