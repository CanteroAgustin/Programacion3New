<?php
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