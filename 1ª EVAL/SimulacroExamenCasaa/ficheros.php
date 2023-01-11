<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p>Operadion de lectura </p>
    <?php 
    $archivo= fopen("fichero1.txt","r+b");

    if (!$archivo){
        echo "Error al abrir el fichero";
    }
        $cadena = fread($archivo,filesize("fichero1.txt"));
        echo $cadena;

        fwrite($archivo,"ña");

        $archivo2= fopen("fichero1.txt","r+b");

        $cadena2 = fread($archivo2,filesize("fichero1.txt"));

        echo $cadena2;

        echo "</br>-------------------------------------</br>";

        //$pagina = file_get_contents("https://elpais.com/");
       // echo $pagina;

       $aCadena = file("fichero1.txt");
       print_r($aCadena);

       echo "</br>-------------------------------------</br>";
 
       rewind($archivo2);

       while(feof($archivo2)== false){
        echo fgets($archivo2),"</br>";
       }



       fclose($archivo);
    ?>
</body>
</html>