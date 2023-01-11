<?php
if (isset($_POST["numero"])){
    $numero=$_POST["numero"]; //mirar si funciona post numero o es otra variable abajo
}else {
    $numero="";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Suma pares</h1>

    <form method="post">

        <label for="nombre" >Escribe un número entero:</label>
    
        <input type="number" min="1" name="numero" value="<?=$numero?>"></input>
    
        <input type="submit" name="botonEnviar" value="Enviar datos" ></input>
    
    
    </form>


    <?php
    if(isset($_POST['botonEnviar'])){ 
    //$numero = rand(1,100);
    $numero=(int)$_POST['numero'];
    $suma=0;
    for ($i=1;$i<=$numero;$i++){
        if ($i%2==0){
           // echo $i . "<br>";
            $suma = $suma + $i;
        }
    }
    echo "Suma es: " . $suma;
}
    ?>
</body>
</html>