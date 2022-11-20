<?php
$valorUsuario=$_POST['numeroT'];
$valor1=0;
$valor2=0;
$valor3=0;
$valor4=0;
$valor5=0;
$valor6=0;
$arrayResultados= Array();
if (empty($_POST['numeroT'])){
    header("location:index.html");
}

$array;
$array_repes= array_fill(0,7,0);

for ($i=0; $i<$valorUsuario; $i++){
$aleatorio= mt_rand(1,6);
$array[$i]= $aleatorio;
$array_repes[$aleatorio]= $array_repes[$aleatorio] +1;

}
echo "El resultado de las tiradas es: </br>";
// print_r($array);
// echo "</br>";
// array_multisort($array_repes);
// print_r($array_repes);
// echo "</br>";

foreach($array_repes as $numeros => $valor ){
    if (!$valor==0)
    echo "El numero ".$numeros . " aparece " . $valor . " vez</br>";
}
?>