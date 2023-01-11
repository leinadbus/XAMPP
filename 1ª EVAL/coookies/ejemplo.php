
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <input type="button" name="visitas">
<?php
if(isset($_COOKIE['visitas'])){
    $_COOKIE['visitas']++;
    setcookie("visitas", $_COOKIE['visitas'], time()+10);
    setcookie("hora",date("d-m-y h:i:s"), time()+10);
    echo "Visita numero: " . $_COOKIE['visitas']. "<br/>";
    echo "Hor DE VISITA: " . $_COOKIE['hora'] . "<br/>";

}else {
    echo "Primera vez que enras en la web";
    setcookie("visitas", 0 );
    setcookie("hora",date("d-m-y h:i:s"), time()+10);
}

?> 
</body>
</html>