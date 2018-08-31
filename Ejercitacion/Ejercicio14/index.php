<?php
echo "<h2>Aplicación Nº 14 (Arrays de Arrays)</h2>";
echo "<h4>Descripcion: Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que
contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los
Arrays de Arrays.</h4>";
echo "<h4>Programa:</h4>";

$array1 = array("Perro","Gato","Raton","Araña","Mosca");
$array2 = array("1986","1996","2015","78","86");
$array3 = array("php","mysql","html5","typescript","ajax");
$array4 = array($array1, $array2, $array3);
$array5 = array("Array1"=>$array1, "Array2"=>$array2, "Array3"=>$array3);


foreach ($array4 as $value) {
    echo "<br/>";
    foreach ($value as $value2) {
            echo $value2.", ";
    }
}
echo "<br/><br/>";
foreach ($array5 as $key => $value) {
    echo "<br/>".$key.": ";
    foreach ($value as $value2) {
        echo $value2.", ";   
    }
}
?>






