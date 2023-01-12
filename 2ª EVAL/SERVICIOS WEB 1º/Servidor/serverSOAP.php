<?php
include "librari.php";

$options = array('uri'=>"http://localhost/XAMPP/CLASE/2%c2%aa%20EVAL/SERVICIOS%20WEB/Servidor/");

$server = new SoapServer(null,$options);

$server->setClass('librari');

$server->handle();

?>