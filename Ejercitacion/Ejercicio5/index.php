<?php
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

