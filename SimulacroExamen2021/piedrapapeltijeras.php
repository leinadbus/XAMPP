<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Piedra, Papel, Tijeras</h2>
    <?php
    //Comprobación del resultado con botón y post
    

$jMaquina=rand(0,2);
if($jMaquina==0){
$jMaquina='tijera';
}else if ($jMaquina==1){
    $jMaquina='piedra';
}else{
    $jMaquina='papel';
}


$maximoPartidas=5;


if (isset($_POST['btnEnviar'])){

     $intentos=$_POST['intentos']+1;
     $empate=$_POST['empate'];
     $ganadoUser=$_POST['ganadoUser'];
     $ganadoMaquina=$_POST['ganadoMaquina'];

    if($intentos<$maximoPartidas){
    $jUser=$_POST['eleccion'];
    echo "Usuario ha escogido: ", $jUser, " Máquina: ", $jMaquina,"</br>";
    if ($jUser==$jMaquina){
        echo "// Empate";
        $empate++;
    }else if ($jUser=='piedra' && $jMaquina=='papel'){
        $ganadoMaquina++;
        echo "Gana la máquina";
    }else if ($jUser=='piedra' && $jMaquina=='tijera'){
        $ganadoUser++;
        echo "Ganas Tú";
    }else if ($jUser=='papel' && $jMaquina=='piedra'){
        $ganadoUser++;
        echo "Ganas Tú";
    }else if ($jUser=='papel' && $jMaquina=='tijera'){
        $ganadoMaquina++;
        echo "Gana la máquina";
    }else if ($jUser=='tijera' && $jMaquina=='papel'){
        $ganadoUser++;
        echo "Ganas Tú";
    }else if ($jUser=='tijera' && $jMaquina=='piedra'){
        $ganadoMaquina++;
        echo "Gana la máquina";
    }

    echo "</br>Numero de intentos: ",$intentos ;
   }else echo"Se acabo el juego";



echo "</br>Ganadores: Máquina: ".$ganadoMaquina." Usuario: ".$ganadoUser;

}
    ?>
<form action="" method="post">
    <input type="radio" name="eleccion" value="tijera" required>Tijeras
    <input type="radio" name="eleccion"value="piedra"required>Piedra
    <input type="radio" name="eleccion"value="papel"required>Papel
    <input type="submit" name="btnEnviar"value="Jugar!">
    <input type="hidden" name="intentos" value="<?=$intentos??'0'?>">
    <input type="hidden" name="ganadoUser" value="<?=$ganadoUser??'0'?>">
    <input type="hidden" name="ganadoMaquina" value="<?=$ganadoMaquina??'0'?>">
    <input type="hidden" name="empate" value="<?=$empate??'0'?>">



</form>


    <!--formulario-->


</body>
</html>