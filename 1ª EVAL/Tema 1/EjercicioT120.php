<?php
/*20. Haz un programa que muestre 2000 cuadrados de colores aleatorios que además se
coloquen en posiciones aleatorias por la pantalla.
• El tamaño de los cuadrados será 50x50 píxeles.
• Las posiciones aleatorias se calcularán entre 0 y 100 que representa el porcentaje
(0% -100%) para posiciones absolutas, relativa, o fixed de los atributos left y top
de los cuadrados.
• Los colores aleatorios se calculan obteniendo un número aleatorio entre 0 y 255
para cada valor RGB.*/

for ($i=0;$i<2000;$i++){

    $aColor= rand(0,255);
    $bColor=rand(0,255);
    $cColor=rand(0,255);

    $aPosicion=rand(0,1000);
    $bPosicion=rand(0,1000);

    echo "<div style='position:fixed; 
    height:50px ; 
    width:50px ; 
    left:".$aPosicion."px; top:".$bPosicion."px; 
    background-color: rgb($aColor,$bColor,$cColor)'>
    </div>";

    
}

/*echo "<div style='position:absolute; 
    height:50px ; 
    width:50px ; 
    left: 9px; 
    top: 99px; 
    background-color: rgb(222,222,222)'>
    </div>";
*/
//echo "<div style='posicion:absolute; height:50px ; width:50px ; left:500px; top:500px; background-color: rgb(150,120,12)'></div>";

?>