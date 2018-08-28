<?php

echo "Suma: ";
$op1 = 2;
$op2 = 3;
echo $op1." + ".$op2." = ".operar(2,3,"+")."</br>";

echo "Resta: ";
$op1 = 3;
$op2 = 2;
echo $op1." - ".$op2." = ".operar(3,2,"-")."</br>";

echo "Division: ";
$op1 = 6;
$op2 = 2;
echo $op1." / ".$op2." = ".operar(6,2,"/")."</br>";

echo "Multiplicacion: ";
$op1 = 2;
$op2 = 2;
echo $op1." * ".$op2." = ".operar(2,2,"*")."</br>";

echo "Division por 0: ";
$op1 = 2;
$op2 = 0;
echo $op1." / ".$op2." = ".operar(2,0,"/")."</br>";

echo "Operador invalido: ";
$op1 = 2;
$op2 = 3;
echo $op1." = ".$op2." = ".operar(2,2,"=")."</br>";

function operar($op1, $op2, $operador){
    switch($operador){
        case "+":
            return $op1 + $op2;
            break;
        case "-";
            return $op1 - $op2;
            break;
        case "/";
            if($op2 == 0){
                return "No se puede dividir por 0";
            }else{
                return $op1 / $op2;
            }
            break;
        case "*";
            return $op1 * $op2;
            break;
        default;
            return "Operador erroneo";
            break; 
    }
}

?>
