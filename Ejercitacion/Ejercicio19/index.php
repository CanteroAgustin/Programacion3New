<?php

echo "<h2>Aplicación Nº 19 (Figuras geométricas)</h2>";
echo "<h4>Descripcion: La clase FiguraGeometrica posee: todos sus atributos protegidos, 
un constructor por defecto, un método getter y setter para el atributo _color, 
un método virtual (ToString) y dos métodos abstractos: Dibujar (público) y 
CalcularDatos (protegido).
CalcularDatos será invocado en el constructor de la clase derivada que corresponda, 
su funcionalidad será la de inicializar los atributos _superficie y _perimetro.
Dibujar, retornará un string (con el color que corresponda) formando la figura geométrica 
del objeto que lo invoque (retornar una serie de asteriscos que modele el objeto).
Ejemplo:
  *   *******
 ***  *******
***** *******
Utilizar el método ToString para obtener toda la información completa del objeto, y luego
dibujarlo por pantalla.</h4>";

echo "<h4>Programa:</h4>";

abstract class FiguraGeometrica{

    protected $_color;
    protected $_perimetro;
    protected $_superficie; 

    function __construct(){

    }

    abstract protected function CalcularDatos();

    abstract public function Dibujar();

    public function __get($key) {
        return $this->$key;
    }
        
    public function __set($key, $value) {
        $this->$key = $value;
    }    

    function ToString(){

    }

    

    
}

class Triangulo extends FiguraGeometrica{

    protected $_altura;
    protected $_base;

    function __construct($b,$h){
        $this->_altura = $h;
        $this->_base = $b;
        FiguraGeometrica::CalcularDatos();
    }

    function CalcularDatos(){
        $_superficie = $_altura * ($_base/2);
        $_area = ($_base * $_altura)/2;
    }

    function Dibujar(){

    }

    function ToString(){

    }
    
    
}

class Rectangulo extends FiguraGeometrica{

    protected $_ladoDos;
    protected $_ladoUno;

    function __construct($l1, $l2){
        $this->_ladoUno = $l1;
        $this->_ladoDos = $l2;
        FiguraGeometrica::CalcularDatos();
    }

    function CalcularDatos(){
        $_superficie = $_ladoUno * $_ladoDos;
        $_perimetro = ($_ladoUno*2) + ($_ladoDos*2);
    }
    
    function Dibujar(){

    }

    function ToString(){

    }
}

?>