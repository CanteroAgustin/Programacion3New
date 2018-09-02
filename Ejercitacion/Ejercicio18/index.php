<?php

echo "<h2>Aplicación Nº 18 (Par e impar)</h2>";
echo "<h4>Descripcion: Crear una función llamada EsPar que reciba un valor entero como parámetro 
y devuelva TRUE si este número es par ó FALSE si es impar.
Reutilizando el código anterior, crear la función EsImpar.</h4>";
echo "<h4>Programa:</h4>";
    
$numPar = 14; $numImpar = 7; 

echo "Numero Par: ".$numPar." - Retorno de la funcion esPar: ".esPar($numPar)."<br/>";
echo "Numero Impar: ".$numImpar." - Retorno de la funcion esPar: ".esPar($numImpar)."<br/>";
echo "Numero Par: ".$numPar." - Retorno de la funcion esImpar: ".esImpar($numPar)."<br/>";
echo "Numero Impar: ".$numImpar." - Retorno de la funcion esImpar: ".esImpar($numImpar)."<br/>";

function esPar($num){
    if($num % 2 == 0){
        return true;
    }else{
        return false;
    }
}

function EsImpar($num){
    if(!esPar($num)){
        return true;
    }else{
        return false;
    }
}
?>