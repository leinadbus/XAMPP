<?php
/*17. Crea un array asociativo que contenga la siguiente información:
Array supermercado:
Fruta (Pera, Manzana, Plátano)
Verdura (Berenjena, Calabacín)
Lácteos (leche, yogur, queso, kéfir)
Muestra el array en pantalla haciendo uso del bucle foreach
*/

$supermercado = array ("fruta" => array("pera","manzana", "plátano"),
                        "verdura"=> array("berenjena", "calabacín"),
                        "lácteos"=> array("leche", "yogur", "queso", "kéfir"));

foreach ($supermercado as $super =>$dato){

    echo "Tipo de producto: " . $super . "<br>";

    foreach($dato as $indice=>$valor){

        echo $valor . " / ";
    }

    echo "<br>";
    
}
?>