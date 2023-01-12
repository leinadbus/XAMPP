<?php
include "Protectora(III).php";

$options = array('uri'=>"http://localhost/XAMPP/CLASE/2%c2%aa%20EVAL/3%20Ejercicios%20Servidor/Protectora(III)/");

$server = new SoapServer(null,$options);

$server->setClass('Adopcion');

$server->handle();

?>