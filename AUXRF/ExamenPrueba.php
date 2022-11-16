<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen Arrays</title>
</head>

<body>
    <?php

    function arrayAuxiliar($arrayParametro){
        
        foreach ($arrayParametro as $key => $value) {
            $arrayAux[$value['posicion']]=array($key,$value['puntos']);
        }
        return $arrayAux;
    } 
    $arrayEquipos = array('Barcelona'=> array('puntos'=> 22 , 'posicion'=> 1),
                    'Madrid'=> array('puntos'=> 14 , 'posicion'=> 5),
                    'Betis'=> array('puntos'=> 16 , 'posicion'=> 3),
                    'Sevilla'=> array('puntos'=> 10 , 'posicion'=> 6),
                    'Bilbao'=> array('puntos'=> 5 , 'posicion'=> 7),
                    'Rayo'=> array('puntos'=> 21 , 'posicion'=> 2),
                    'Girona'=> array('puntos'=> 15 , 'posicion'=> 4));



    $arrayEquiposPorPosiciones = array_column($arrayEquipos, 'posicion');

    print_r($arrayEquiposPorPosiciones);
    if (ksort($arrayEquiposPorPosiciones)) {
        echo "<pre>";
        print_r($arrayEquiposPorPosiciones);
        echo "</pre>";
    }

    echo "<pre>";
    print_r(arrayAuxiliar($arrayEquipos));
    echo "</pre>";


    $arrayFinal = arrayAuxiliar($arrayEquipos);
    ksort($arrayFinal);
    echo "<pre>";
    print_r($arrayFinal);
    echo "</pre>";


    

    

    
    ?>


</body>

</html>