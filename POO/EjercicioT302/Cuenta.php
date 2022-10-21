<?php
/*2. Escribe una clase Cuenta para representar una cuenta bancaria. Los datos de la cuenta son:
nombre del cliente (String), número de cuenta (String), tipo de interés (double) y saldo (double).
La clase contendrá los siguientes métodos:
• Constructor con todos los parámetros
• Métodos setters/getters para asignar y obtener los datos de la cuenta.
• Métodos ingreso y reintegro. Un ingreso consiste en aumentar el saldo en la cantidad
que se indique. Esa cantidad no puede ser negativa. Un reintegro consiste en disminuir
el saldo en una cantidad pero antes se debe comprobar que hay saldo suficiente. La
cantidad no puede ser negativa. Los métodos ingreso y reintegro devuelven true si la
operación se ha podido realizar o false en caso contrario.
Crea 2 instancias para validar el funcionamiento del programa.*/

class Cuenta {
    private $nombre;
    private $numero;
    private $interes;
    private $saldo;

    function __construct ($nom,$num,$int,$sal) {
        $this->nombre=$nom;
        $this->numero=$num;
        $this->interes=$int;
        $this->saldo=$sal;
    }

    public function get_nombre () {
        return $this->nombre;
    }

    public function set_nombre ($nombre) {
        $this->nombre=$nombre;
    }
    public function get_numero () {
        return $this->numero;
    }

    public function set_numero ($numero) {
        $this->numero=$numero;
    }
    public function get_interes () {
        return $this->interes;
    }

    public function set_interes ($interes) {
        $this->interes=$interes;
    }
    public function get_saldo () {
        return $this->saldo;
    }

    public function set_saldo ($saldo) {
        $this->saldo=$saldo;
    }

    function ingreso ($cantidad) {
        if ($cantidad>0){
            $valor1=($this->get_saldo()+$cantidad);
            $this->set_saldo($valor1);
            return true;
            //echo "Ingreso realizado correctamente. Cantidad total: " . $cantidad;
        }else 
        echo "Solamente se pueden ingresar cantidades positivas de dinero";
        return false;
    }

    public function reintegro ($cantidad) {
        
        $valor2= ($this->get_saldo())-$cantidad;
        if ($valor2>=0){
   
                     $this->set_saldo($valor2);
                     return true;
              
        }else 
        echo "no existe suficiente dinero disponible";
        return false;

    }

   public function transferencia ($objeto1,$cantidad) {
    //Usamos el booleano que devuelve la función para poder comprobar si funcionaria, si tal, lo hacemos
        if($this->reintegro($cantidad)){
            $this->reintegro($cantidad);
            $objeto1->ingreso($cantidad);
        }
        

    }
}


$objeto1 = new Cuenta("Pedro", "numero", "interes", 2000);
$objeto2 = new Cuenta("Marta", "numero", "interes", 1000);
echo "<pre>";
print_r($objeto1);
echo "</pre>";

$objeto1->ingreso(300);

echo "<pre>";
print_r($objeto1);
echo "</pre>";

$objeto1->reintegro(2000);

echo "<pre>";
print_r($objeto1);
echo "</pre>";

$objeto1->transferencia($objeto2,200);

echo "<pre>";
print_r($objeto1);
echo "</pre>";

echo "<pre>";
print_r($objeto2);
echo "</pre>";

//Método transferencia???
?>