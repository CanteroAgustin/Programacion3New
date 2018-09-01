<?php
echo "<h2>Aplicación Nº 16 (Invertir palabra)</h2>";
echo "<h4>Descripcion: Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.</h4>";
echo "<h4>Programa:</h4>";

$array = array('H','O','L','A');
echo "Array sin invertir: ";
foreach ($array as $key => $value) {
    echo $value;
}
echo "<br/>Array invertido: ";
foreach (invertirArray($array) as $key => $value) {
    echo $value;
}

function invertirArray($array){
    $arrayTemporal = array_reverse($array);
    return $arrayTemporal;
}

?>