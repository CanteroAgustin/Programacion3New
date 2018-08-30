<?php
echo "<h2>Aplicación Nº 13 (Arrays asociativos II)</h2>";
echo "<h4>Descripcion: Cargar los tres arrays con los siguientes valores y luego ‘juntarlos’ en uno. Luego mostrarlo por
pantalla.
“Perro”, “Gato”, “Ratón”, “Araña”, “Mosca”
“1986”, “1996”, “2015”, “78”, “86”
“php”, “mysql”, “html5”, “typescript”, “ajax”
Para cargar los arrays utilizar la función array_push. Para juntarlos, utilizar la función
array_merge.</h4>";
echo "<h4>Programa:</h4>";

$array1 = array();
$array2 = array();
$array3 = array();

array_push($array1,"Perro","Gato","Raton","Araña","Mosca");
array_push($array2,"1986","1996","2015","78","86");
array_push($array3,"php","mysql","html5","typescript","ajax");

$arrayMerged = array_merge($array1,$array2,$array3);
echo "Array resultante: ";
foreach ($arrayMerged as $value) {
    echo $value." - ";
}
?>