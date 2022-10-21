<!-- 
    1. Realizar un formulario html con el siguiente aspecto:
El número de veces indicado en el cuadro de texto tendrá que imprimirse la frase “Los bucles
son fáciles”. Para finalizar se escribirá por pantalla la frase “Se acabó”.
• El código php y el código html deberán de estar en dos ficheros distintos.
• Utilizar la sentencia WHILE
• Para recoger el dato metido en el cuadro de texto se utiliza la instrucción $_POST.
Ejemplo: $number = $_POST['number']; siendo number el name puesto al cuadro
de texto.
Ampliación: Repite el programa anterior pero en este caso la sentencia a utilizar debe de ser
FOR y además el código html y php se deberán de encontrar en el mismo fichero.
 -->
 <html>
    <head>
        <meta charset="UTF-8"/>
        <?php
           if(isset($_POST['botonEnviar'])){
            $numero = (int)$_POST['number'];

            for($i=0;$i<$numero;$i++){
                echo "Los bucles son fáciles";
            }
           } 
        ?>
    </head>
    <body>
        
<form method="post" action="ejercicio1.php">

        <label for="number">¿Cuántas veces?</label>

        <input type="text" name="number" required></input>

        <p><input type="submit" name="botonEnviar" value="Enviar Datos"></p>
    
    </form>
   
</body>
 
</html>