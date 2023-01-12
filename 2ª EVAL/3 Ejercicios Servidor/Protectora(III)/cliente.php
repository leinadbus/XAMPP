<?php

$options = array ('uri'=>"http://localhost/XAMPP/CLASE/2%c2%aa%20EVAL/3%20Ejercicios%20Servidor/Protectora(III)/",
                  'location'=>"http://localhost/XAMPP/CLASE/2%c2%aa%20EVAL/3%20Ejercicios%20Servidor/Protectora(III)/serverSOAP.php");

try{

    $adopcion = new SoapClient(null,$options);

   // $animal = new Adopcion(1,1,2022-01-01,'macho','protectora_animales');

    $respuesta =$adopcion->obtienedeid(12);

    echo $respuesta;

}catch(SoapFault $e){

  echo "errorrr: " , $e->getMessage();
  
}

?>