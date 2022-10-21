<?php

include 'Repetidor.php';

class Alumno {

    private $nombre;
    private $apellido;
    const CICLO ="DAW";    //NO SE PUEDE CAMBIAR DE NINGUNA MANERA -- Siempre se escriben en MAYUSCULAS
    public static $curso = "Primero";    //SI SE PUEDE CAMBIAR SI ES NECESARIO, PERO CAMBIA PARA TODOS
    private static $trimestre = "Segundo";    //

    function __construct ($nom, $ape){
        $this->nombre=$nom;
        $this->apellido=$ape;
    }

    public function get_nombre () {
        return $this->nombre;
    }

    public function set_nombre ($nom) {
        $this->nombre=$nom;
    }

    public static function get_trimestre () {
        return self::$trimestre;
    }

    public static function set_trimestre ($tri) {
        self::$trimestre=$tri;
    }
}

$alumno1 = new Alumno("Pepe","Marquez");
print_r($alumno1); //Sólo funciona si los atributos son public
echo "<br>";

//Para acceder a una variable private ---------//---------- Las constantes o atributos estáticos son generales a todas las instancias de un objeto y se accede así
echo "El nombre del alumno es " . $alumno1->get_nombre() . " y está matriculado en " . Alumno::CICLO; 
//PARA ACCEDER A LA ESTATIC PUBLIC ES
echo " En curso " . Alumno::$curso;
//PARA ACCEDER A LA ESTATIC PRIVATE ES
echo " En trimestre " . Alumno::get_trimestre();
//Cambiamos el valor a ver si funciona
$alumno1::set_trimestre("tercero");
echo " En trimestre " . Alumno::get_trimestre();
echo "<br>";

//Instanciamos clase heredada

$alumno2 = new Repetidor("BBDD","Manuel","Gonzalez");
print_r($alumno2);



//CLASE ABSTRACTA: No se puede instanciar, puede o no tener métodos abstractos al menos uno, la idea es solo poder instanciar las clases que heredan
//Qué es un método abstract: es como un molde, solo lo declaro no lo implemento. Si tengo una función que es calcular nota_alumno
                                        //Solo va a decirme que en la clase que heredo tiene que haber un calcular_nota_alumno
                                        //Los hijos tienen si o si que implementarla, esta OBLIGADO

//INTERFAZ: TODOS SUS MÉTODOS SON ABSTRACTOS. Solo sirve de plantilla para los hijos, no tienen variables, solo constantes
?>