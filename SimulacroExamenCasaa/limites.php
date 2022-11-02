<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="acierto.php" >
        <label for="ingerior">Valor inferior</label>
<input type="number" id="inferior"name="inferior" required>
<label for="superior">Valor superior</label>
<input type="number" id="supeior"name="superior" required>
<input type="submit" name="enviar" value="Enviar">

<p><?php echo $_GET['msg']?? '' ?></p>

</form>
</body>
</html>