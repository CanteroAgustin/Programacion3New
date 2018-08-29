<?php

echo "<h2>Aplicación Nº 9 (Carga aleatoria)</h2>";
echo "<h4>Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
función rand). Mediante una estructura condicional, determinar si el promedio de los números
son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
resultado.</h4>";
echo "<h4>Programa:</h4>";

$array = array(1=>rand(1,10),2=>rand(1,10),3=>rand(1,10),4=>rand(1,10),5=>rand(1,10));
$cont = 0; $acum = 0; $prom = 0;
foreach ($array as $key => $value) {
    $cont++;
    $acum += $value;
}
$prom =$acum/$cont;
if($prom > 6){
    echo "son mayores";
}elseif($prom < 6){
    echo "son menores";
}else {
    echo "son iguales";
}
?>
