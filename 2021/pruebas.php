<?php
$valor="danie@.lgmailcom";
 $arroba= strpos($valor, "@");
 $punto= strpos($valor, ".");
 if($arroba===false) {
    $arroba="No encuentra arroba//";
}else $arroba="arroba encuentra//";

    if($punto===false) {
        $punto="No encuentra punto//";
    }else $punto="punto encuentra//";
echo $arroba,$punto;
echo "------------------------------------------------";
$valor="@.";
$arroba= strpos($valor, "@");
        $punto= strpos($valor, ".");
        $comprobadorarroba=false;
        $comprobadorpunto=false;
        if($arroba===false) {
            $comprobadorarroba=false;
       }else  $comprobadorarroba=true;
       
        if($punto===false) {
            $comprobadorpunto=false;
        }else $comprobadorpunto=true;

        if($comprobadorarroba && $comprobadorpunto){
            echo "Todo correcto";
        }else echo "Falta algo";
?>