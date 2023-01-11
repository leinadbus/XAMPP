<?php
//Mostrar los equipos por posición, para ello utiliza la función ksort Puedes realizar los siguientes pasos:
        //Guardo en un array auxiliar los equipos por posiciones. Después lo ordeno y lo muestro por pantalla

        //El índice del array auxiliar será la posición en la que quedó, y el contenido es un array con el nombre del equipo y los puntos obtenidos

$aEquipos = array ("Real Madrid" => array("puntos"=>87,"posicion"=>1),
                    "Villareal" => array("puntos"=>60,"posicion"=>5),
                    "Celta de Vigo"=>array("puntos"=>36,"posicion"=>17),
                    "Ath. Bilbao"=>array("puntos"=>51,"posicion"=>11),
                    "RCD Espayol"=>array("puntos"=>25,"posicion"=>20),
                    "Leganés"=>array("puntos"=>33,"posicion"=>18),
                    "Atlético de Madrid"=>array("puntos"=>70,"posicion"=>3),
                    "Getafe"=>array("puntos"=>54,"posicion"=>8),
                    "Alavés"=>array("puntos"=>37,"posicion"=>16),
                    "Sevilla"=>array("puntos"=>70,"posicion"=>4),
                    "Barcelona"=>array("puntos"=>82,"posicion"=>2),
                    "Real Sociedad"=>array("puntos"=>56,"posicion"=>6),
                    "Osasuna"=>array("puntos"=>52,"posicion"=>10),
                    "Granada"=>array("puntos"=>56,"posicion"=>7),
                    "Valencia C.F"=>array("puntos"=>53,"posicion"=>9),
                    "Levante"=>array("puntos"=>49,"posicion"=>12),
                    "Valladolid"=>array("puntos"=>42,"posicion"=>13),
                    "Betis"=>array("puntos"=>39,"posicion"=>15));

$arrayAux;

    foreach ($aEquipos as $datos=>$equipo){ //Introduzco en el nuevo array por indice de posiciones
        $arrayAux[$equipo['posicion']]= array($datos,$equipo['puntos']);
    }

 /*   foreach ($arrayAux as $super =>$dato){ //Enseñarlo por pantalla

        echo "Indice " . $super . "<br>";
    
        foreach($dato as $indice=>$valor){
    
            echo $valor . " / ";
        }
    
        echo "<br>";
        echo "<br>";
        
    }

    echo "<h2>Array Ordenado</h2> <br>";
*/
    ksort($arrayAux); //Ordenamos, el ksort ordena por los indices

    foreach ($arrayAux as $super =>$dato){ //Enseño el resultado
        echo "Posicion " . $super . "<br>";
    
        foreach($dato as $indice=>$valor){
            echo $valor . " / ";
        }
        echo "<br>";
        echo "<br>";
    }

    /*
RESULTADO COMPILADO:

Posicion 1
Real Madrid / 87 /

Posicion 2
Barcelona / 82 /

Posicion 3
Atlético de Madrid / 70 /

Posicion 4
Sevilla / 70 /

Posicion 5
Villareal / 60 /

Posicion 6
Real Sociedad / 56 /

Posicion 7
Granada / 56 /

Posicion 8
Getafe / 54 /

Posicion 9
Valencia C.F / 53 /

Posicion 10
Osasuna / 52 /

Posicion 11
Ath. Bilbao / 51 /

Posicion 12
Levante / 49 /

Posicion 13
Valladolid / 42 /

Posicion 15
Betis / 39 /

Posicion 16
Alavés / 37 /

Posicion 17
Celta de Vigo / 36 /

Posicion 18
Leganés / 33 /

Posicion 20
RCD Espayol / 25 /
*/
?>