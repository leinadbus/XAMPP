<?php
/*Crea una pequeña agenda electrónica utilizando arrays asociativos multidimensionales.
*Los datos a guardar para cada contacto son: nombre, apellidos, teléfono, correo
*electrónico.
Debe mostrarse en pantalla los datos guardados en la agenda. Ejemplo:*/

$agenda = array(array ("nombre"=>"Jorge",
                       "Apellidos" =>"Manolo" ,
                        "telefono"=>"000987654",
                        "correo"=>"Jorge@gmail.com" ),
                array  ("nombre"=>"Lucas",
                        "Apellidos" =>"de Rubio" ,
                        "telefono"=>234567898,
                        "correo"=>"Lucas@correo.com" ),
                array  ("nombre"=>"Andrea",
                        "Apellidos" =>"Ortiz" ,
                        "telefono"=>999999345,
                        "correo"=>"Andrea@correo.com" ),
                array  ("nombre"=>"Pepa",
                        "Apellidos" =>"Bueno" ,"
                        "=>987987654,
                        "correo"=>"Pepa@correo.com" ));

function compruebaCorreo ($correo) {
    $validos = array("@gamil","@correo.com");
    //Obtenemos la posición de la @
    $posicionArroba = strpos($correo,"@");
    //extraemos la cadena desde esa posicion hasta el final
    $finCorreo= substr($correo,$posicionArroba);
    //si está en el array validos es una direccion de correo correcta
    return in_array($finCorreo,$validos);
}

foreach ($agenda as $contacto => $datosContamto) {
    echo "<ul>";
    if (!compruebaCorreo($datosContamto['correo'])){
            echo "<li>Nombre: {$datosContamto['nombre']} emailnovalido"; //?????
    }
}

?>

