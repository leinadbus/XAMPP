<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 2 auto;
            text-align: center;
        font-size:90%;
        text-align: justify;
        }
        li{
            text-decoration:none;
            display:inline-block;
            padding:5px 10px;
    }

    </style>
</head>
<body>
<?php 
    $archivo = fopen("pufosaRegistros.txt","a+b");
       while (feof($archivo) == false) {
        echo fgets($archivo)."</br>";
       }
?>
<input type='button' onclick='history.back()' name='volver atrás' value='volver atrás'>
</body>
</html>