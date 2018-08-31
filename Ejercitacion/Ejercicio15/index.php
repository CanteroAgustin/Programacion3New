<?php
echo "<h2>Aplicación Nº 15 (Potencias de números)</h2>";
echo "<h4>Descripcion: Mostrar por pantalla las primeras 4 potencias de los números
 del uno 1 al 4 (hacer una función que las calcule invocando la función pow).</h4>";
echo "<h4>Programa:</h4>";

for($i=1; $i<=4; $i++){
    echo "Primeras 4 potencias de ".$i.": ";
    inprimirPrimerasCuatroPotencias($i);
    echo "<br/>";
}

function inprimirPrimerasCuatroPotencias($num){
    echo pow($num, 1)." - ";
    echo pow($num, 2)." - ";
    echo pow($num, 3)." - ";
    echo pow($num, 4)." - ";
}
?>


