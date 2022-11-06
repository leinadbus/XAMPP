<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $inferior=$_POST['inferior'];
    $superior=$_POST['superior'];

    echo "Límite inferior es: ",$inferior,"<br>";
    echo "Límite superior es: ",$superior,"<br>";
    if($inferior>$superior){
        header("location:limites.php?msg=El valor inferior no puede ser mayor que el superior");
        die();
    }

    //echo $_POST['intentos'];

    if(!empty($_POST['numeroUser'])){

        $intentos=$_POST['intentos']+1;

         if(empty($_POST['numAle'])){

           $numalea=rand($inferior,$superior);

         }else $numalea=$_POST['numAle'];

        //$numalea = (empty($_POST['numAle'])) ? $_POST['numAle'] : (rand($inferior,$superior));
        
       echo $numalea;
        $numeroUser=$_POST['numeroUser'];


        if($numeroUser<$numalea){
            echo "Está por arriba";
        }else if ($numeroUser>$numalea){
            echo "Está por abajo";
        }else 
        header("location:ganar.php");

    }

    

    ?>
<form method="post" >
        <input type="number" name="numeroUser" value="<?=$numeroUser?>"required min="1">
        <input type="hidden" name="inferior" value="<?=$inferior?>">
        <input type="hidden" name="superior" value="<?=$superior?>">
        <input type="hidden" name="numAle" value="<?=$numalea?? ''?>">
        <input type="hidden" name="intentos" value="<?=$intentos??'1'?>">
        <input type="submit" name="enviar" value="Enviar">
        <?php echo "<br>Número de intentos: ",$_POST['intentos']??'' ?>
    </from>

    
</body>
</html>