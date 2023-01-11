<?php
/*24. Crear un array bidimensional asociativo en el que la clave de la primera dimensión será
el nombre de los equipos de la primera división de la liga de fútbol. Cada equipo
contendrá un array de dos elementos, el primero, con clave “puntos” contiene la
puntuación obtenida en la pasada liga. El segundo elemento con clave “posición”
contendrá en número la posición en la tabla en la que finalizó el equipo la liga.
Utilizando los bucles que necesites muestra en pantalla los nombres de los equipos, los
puntos y la posición de los equipos que terminaron en las tres primeras posiciones de la
liga.
*/

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

foreach($aEquipos as $equipo =>$datos){
    if ($datos['posicion']<4){
        echo "Equipo: " . $equipo . " | Puntos: " . $datos['puntos'] . 
                " | Posicion: " . $datos['posicion'] . "<br>";
    }
}
                    //Ahora hay que ordenarlos con el multisort
    array_multisort($aEquipos);
    foreach ($aEquipos as $equipo=>$datos){
        echo $equipo . $datos['puntos'] . " | " . $datos['posicion'] . "<br>";
    }

    echo "<br>";

         //se ordenó por puntos, ahora queremos ordenarlo por posición
    array_multisort(array_column($aEquipos,'posicion'),$aEquipos);
    foreach ($aEquipos as $datos=>$equipo){
        echo $datos . $equipo['puntos'] . " | " . $equipo['posicion'] . "<br>";
    }

    //hay equipos con mismos puntos, hay que contar con eso en la ordenación


    //Ordenar 
    
?>