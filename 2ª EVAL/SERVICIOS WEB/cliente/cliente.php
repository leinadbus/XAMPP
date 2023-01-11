<?php

$options = array ('uri'=>"http://localhost/XAMPP/CLASE/2%c2%aa%20EVAL/SERVICIOS%20WEB/Servidor/",
                  'location'=>"http://localhost/XAMPP/CLASE/2%c2%aa%20EVAL/SERVICIOS%20WEB/Servidor/serverSOAP.php");

try{

    $cliente = new SoapClient(null,$options);
    $respuesta = array ('suma'=>$cliente->sumar(9,7),
                    'resta'=>$cliente->restar(9,7),
                    'multiplicación'=>$cliente->multiplicar(9,7),
                    'división'=>$cliente->dividir(9,7));
    print_r($respuesta);
}catch(SoapFault $e){

}

?>