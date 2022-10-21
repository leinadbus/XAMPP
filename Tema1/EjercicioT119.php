<!--19. Busca cuatro imágenes en internet. Crea una página que muestre de forma aleatoria
una de ellas.-->

<html>
    <head>
</head>
<body>

<?php

//si llamo a todas las imagenes 'imagenNumero' podemos hacer el código en una línea haciendo el echo y randomizando el numero final
$imagen1="Avatar.jpg";

$imagen2="Red.jpg";

$imagen3="halloween.jpg";

$numero = rand(1,3);

echo $numero;

 switch($numero){

    case 1:

        echo "<img src='$imagen1'>";

        break;

    case 2:

        echo "<img src='$imagen2'>";

        break;

    case 3:

        echo "<img src='$imagen3'>";

        break;

    default: echo "Algo salió mal";
    
 }

//echo "<img src='$imagen1'>";

?>

</body>

</html>