<?php

echo "<h2>Aplicación Nº 17 (Invertir palabra)</h2>";
echo "<h4>Descripcion: Crear una función que reciba como parámetro un string (&#36;palabra) 
y un entero (&#36;max). La función validará que la cantidad de caracteres 
que tiene &#36;palabra no supere a &#36;max y además deberá determinar 
si ese valor se encuentra dentro del siguiente listado de palabras válidas: “Recuperatorio”, 
“Parcial” y “Programacion”. Los valores de retorno serán:
1 si la palabra pertenece a algún elemento del listado.
0 en caso contrario..</h4>";
echo "<h4>Programa:</h4>";
    
$palabra1 = "Recuperatorio"; $palabra2 = "Parcial"; $palabra3 = "Programacion"; $palabra4 = "OtraPalabra"; $palabra5 = "PalabraDemasiadoLarga"; 
$maxLenght = 20;

echo "Palabra 1: ".$palabra1." - Retorno: ".validarPalabra($palabra1, $maxLenght)."<br/>";
echo "Palabra 2: ".$palabra2." - Retorno: ".validarPalabra($palabra2, $maxLenght)."<br/>";
echo "Palabra 3: ".$palabra3." - Retorno: ".validarPalabra($palabra3, $maxLenght)."<br/>";
echo "Palabra 4: ".$palabra4." - Retorno: ".validarPalabra($palabra4, $maxLenght)."<br/>";
echo "Palabra 5: ".$palabra5." - Retorno: ".validarPalabra($palabra5, $maxLenght)."<br/>";

function validarPalabra($palabra, $max){
    if(strlen($palabra)<=$max){
        $array = array("recuperatorio","parcial","programacion");
        foreach ($array as $value) {
            if(strcasecmp($value,$palabra) == 0){
                return 1;
            }
        }
    }
    return 0;
}

?>