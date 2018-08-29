<?php

echo "<h2>Aplicación Nº 6 (Calculadora)</h2>";
echo "<h4>Escribir un programa que use la variable &#36;operador que pueda almacenar los símbolos matemáticos: ‘+’, ‘-’, ‘/’ y ‘*’; y definir dos variables enteras &#36;op1 y &#36;op2. De acuerdo al símbolo que tenga la variable &#36;operador, deberá realizarse la operación indicada y mostrarse el resultado por pantalla.</h4>";
echo "<h4>Programa:</h4>";

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
