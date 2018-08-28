<?php
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
