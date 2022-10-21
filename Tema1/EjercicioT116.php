<?php
/*16. Realiza una matriz de 3 filas por 4 columnas. El contenido de cada uno de los elementos
de la matriz se generará de manera aleatoria. Una vez generada:
• Muestra el contenido de la matriz en formato filas x columnas
• Identifica el número mayor y menor generado dentro de la matriz
• Calcula la media de los números impares contenidos en la matriz
• Imprime únicamente la diagonal
• Imprime únicamente la primera columna
*/

$matriz = array (array(rand(0, 100),rand(0, 100),rand(0, 100)),
                array(rand(0, 100),rand(0, 100),rand(0, 100)),
                array(rand(0, 100),rand(0, 100),rand(0, 100)),
                array(rand(0, 100),rand(0, 100),rand(0, 100)));

for ($i=0;$i<3;$i++){
    echo $matriz[$i][$i] . "  ";
}

echo "<br>";

for ($i=1;$i<3;$i++){
    echo $matriz[$i][$i] . "  ";
}

?>