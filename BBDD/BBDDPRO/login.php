<?php
function conexion () {
$servername = "localhost";
$username = "root";
$passord = "";
$bd="mibbdd";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$bd; charset=UTF8", $username,$passord);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}catch (PDOException$e){
    echo "Connection failed: " . $e->getMessage();
}
return $conn;                   
}
?>