<?php
echo "<h2>Aplicación Nº 4 (Sumar números)</h2>";
echo "<h4>Descripcion: Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números se sumaron.</h4>";
echo "<h4>Programa:</h4>";

$suma = 0;
$cont = 0;
echo "Se sumaran los siguientes numeros: ";
for($i = 1; ($suma+$i)<=1000; $i++){

    echo $i.", ";  
    $suma += $i;
    $cont++;
    
}
echo "</br>";
echo "Total de la suma: ".$suma;
echo "</br>";
echo "Se sumaron ".$cont." numeros";

?>