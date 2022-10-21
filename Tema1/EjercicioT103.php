<doctype html>
<html>
    <head>
        <title>Mi primer php </title>
        <?php
        function resta(){
            $num1=2;
            $num2=5;
            $resta=$num1-$num2;
            return "La resta es $resta <br>";
        }
        function multiplicacion ($num,$num3){
            $multiplicacion=$num*$num3;
            echo "La multiplicacion es $multiplicacion <br>";
        }
        ?>
</head>
<body>
    <?php
    $num1=2;
    $num2=5;
    $resultado_suma=$num1+$num2;
    echo "Los numeros que vamos a usar son $num1 y $num2 <br>";
    echo "La suma de $num1 y $num2 es $resultado_suma <br>";
    echo resta();
    multiplicacion(2,5);
    include "división.php";
    include "operacionmodulo.php";
    ?>
</body>
</html>