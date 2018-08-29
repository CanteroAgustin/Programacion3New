<?php
echo "<h2>Aplicación Nº 11 (Carga aleatoria)</h2>";
echo "<h4>Descripcion: Imprima los valores del vector asociativo siguiente usando la estructura de control foreach:</h4>";
echo "<h4>Programa:</h4>";

$v[1]=90; $v[30]=7; $v['e']=99; $v['hola']= 'mundo';

foreach ($v as $key => $value) {
    echo "Clave: ".$key." - "."Valor: ".$value."<br/>";
}

?>


