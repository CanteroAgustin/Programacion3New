<?php

echo "<h2>Aplicación Nº 5 (Obtener el valor del medio)</h2>";
echo "<h4>Descripcion: Dadas tres variables numéricas de tipo entero &#36;a, &#36;b y &#36;c, realizar una aplicación que muestre el contenido de aquella variable que contenga el valor que se encuentre en el medio de las tres variables. De no existir dicho valor, mostrar un mensaje que indique lo sucedido.
Ejemplo 1: &#36;a = 6; &#36;b = 9; &#36;c = 8; => se muestra 8.
Ejemplo 2: &#36;a = 5; &#36;b = 1; &#36;c = 5; => se muestra un mensaje “No hay valor del medio”</h4>";
echo "<h4>Programa:</h4>";

$a = 6; $b = 9; $c = 8;
$a1 = 5; $b2 = 1; $c3 = 5;

echo "Se muestra valor del medio: ";
echo numeroDelMedio($a,$b,$c);

echo "</br>";

echo "No se muestra valor: ";
echo numeroDelMedio($a1,$b2,$c3);

function numeroDelMedio($a,$b,$c){
    if($a<$b&&$a>$c){
        echo $a;
    }elseif($b<$a&&$b>$c){
        echo $b;
    }elseif($c<$b&&$c>$a){
        echo $c;
    }else{
        echo "No hay valor del medio";
    }
}
?>

