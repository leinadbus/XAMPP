<?php
$servename = "localhost";
$username = "root";
$passord = "";


try {
    $conn = new PDO("mysql:host=$servername;dbname=mibbdd", $username,$passord);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_XCEPTION);
    echo "Connected successfully";
}catch (PDOException$e){
    echo "Connection failed: " . $e->getMessage();
}


?>