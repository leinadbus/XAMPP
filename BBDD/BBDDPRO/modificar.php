<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Modificar alumno</h1>
    <p style="color:red;"><?=$msg?></p>
    <?php
        $html="";
        if(!$datosCorrectos){
            $html="<form action='' method='post'>";
            $html.="<fieldset><legend>Código Alumno a modificar</legend>";
            $html.="Código del alumno: <input type='text' name='codigo' required><br><br/>";
            $html.="<input type='submit' name='btnEnviar' value='Buscar'>";
            $html.="</fieldset></form>";
        }else{
            $html="<form action='comprobacionModificado.php' method='post'>";
            $html.="<fieldset><legend>Datos actuales del alumno a modificar</legend>";
            $html.="Nombre: <input type='text' name='nombre' value='" .$reg['NOMBRE']. "'><br><br/>";
            $html.="Apellidos: <input type='text' name='apellidos' value='".$reg['APELLIDOS']."'><br><br/>";
            $html.="Teléfono:  <input type='text' name='telefono' value='".$reg['TELEFONO']."'><br><br/>";
            $html.="Correo elecrónico: <input  type='text' name='correo' value='".$reg['CORREO']."'><br><br/>";
            $html.="<input type='hidden' name='hiddenCodigo' value='".$reg['CODIGO']."'><br><br/>";
            $html.="<input type='submit' name='btnModificar' value='Modificar'>";
            $html.="</fieldset></form>";
            $html.="";
        }   
        echo $html;
        
    ?>
</body>

</html>