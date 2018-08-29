<?php

echo "<h2>Aplicación Nº 10 (Mostrar impares)</h2>";
echo "<h4>Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el
salto de línea en HTML es la etiqueta <br/>). Repetir la impresión de los números utilizando
las estructuras while y foreach.</h4>";
echo "<h4>Programa:</h4>";

$array = array();
$cont = 0;
while(count($array)<10){
    $cont++;
    if($cont%2!=0){
        array_push($array, $cont);
    }
}

echo "Impresion con while";
$cont = 0;
while($cont < count($array)){
    echo "</br>".$array[$cont];
    $cont++;
}

echo "<br/><br/>Impresion con for";
for($i=0;$i<count($array);$i++){
    echo "</br>".$array[$i];
}

echo "<br/><br/>Impresion con foreach";
foreach ($array as $value) {
    echo "</br>".$value;
}
?>


