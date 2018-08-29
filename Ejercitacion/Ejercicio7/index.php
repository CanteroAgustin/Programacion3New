<?php
echo "<h2>Aplicación Nº 7 (Mostrar fecha y estación)</h2>";
echo "<h4>Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del año es. Utilizar una estructura selectiva múltiple.</h4>";
echo "<h4>Programa:</h4>";

date_default_timezone_set("America/Argentina/Buenos_Aires");

echo "Hoy es " . date("Y/m/d") . "<br>";
echo "Hoy es " . date("Y.m.d") . "<br>";
echo "Hoy es " . date("Y-m-d") . "<br>";
echo "Hoy es " . date("l"). "<br>";

$dia = date("d");
$mes = date("m");

echo "La estacion actual es: ";
if($dia>=1 && $mes==9 || $mes==10 || $dia<=31 && $mes==11){
    echo "Primavera";
}elseif($dia>=1 && $mes==12 || $mes==1 || $dia<=31 && $mes==2){
    echo "Verano";
}elseif($dia>=1 && $mes==3 || $mes==4 || $dia<=31 && $mes==5){
    echo "Otoño";
}else{
    echo "Invierno";
}


?>
