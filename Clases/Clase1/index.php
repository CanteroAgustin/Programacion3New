<?php
include "funciones.php";
//include_once "funciones.php";
//require "funciones.php";
//require_once "funciones.php";
include_once "alumno.php";

    echo "<h1>CLASE 1</h1>";
    echo "<h2>EJERCICIO 1</h2>";
    echo "<p>--- Uso de variables ---</p>";
    $nombre = "Agustin";
    $num1 = 2;
    $num2 = 3;
    echo "Hola $nombre!!!";
    echo "</br>";
    echo 'Hola $nombre!!!';

    echo "<p>--- Funciones con y sin retorno ---</p>";
    echo "Funcion Suma con retorno: ".Suma($num1, $num2);
    echo "</br>";
    Suma2($num1, $num2);

    function Suma2($num1, $num2){
        echo "Funcion Suma sin retorno: ".($num1 + $num2);
    }

    echo "<p>--- Uso de Var_dump ---</p>";
    var_dump($nombre);
    var_dump(Suma($num1, $num2));

    echo "<p>--- Uso de arrays ---</p>";
    $array = array(1,2,3,4);
    var_dump($array);

    foreach ($array as $element){
        echo "Elemento: ".$element;
    }

    $arrayClaveValor=array("ALFA"=>666,"BETA"=>555, "GAMMA"=>444);
    var_dump($arrayClaveValor);

    foreach ($arrayClaveValor as $key => $value) {
        echo("Clave: ".$key." - "."Valor".$value."</br>");
    }

    $queesesto[]="";
    var_dump($queesesto);
    //$yesto={""};
    //var_dump($yesto);

    echo "<p>--- Objetos ---</p>";
    $obj = new stdclass;
    var_dump($obj);
    $obj->$nombre="Agustin";
    var_dump($obj);

    echo "<p>--- Clases ---</p>";

    $alumno = new Alumno();
    
    //echo (Alumno::Saludar());
    echo ("</br>");
    echo ($alumno->Saludar());

    echo "</br>";
    $alumno->legajo = 1234;
    echo ($alumno->legajo);
?>