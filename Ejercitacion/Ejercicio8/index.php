<?php
    
    $num=22;
    
    $numEnLetras = convertir($num);
    echo("<h2>".$numEnLetras."</h2>");

    function convertir($num){
        $unidad = $num % 10;
        $decena = ($num / 10)%10;
        $uLetras = unidadesEnLetras($unidad);
        $dLetras = decenasEnLetras($decena);
        if($num >=20 && $num <= 60){
            if($unidad == 0){
                return $dLetras;
                var_dump($dLetras);
            }else if($decena == 2){
                return "veinti".$uLetras;
            }else{
                return $dLetras." y ".$uLetras;
            }
        }else{
            return "Numero fuera de rango";
        }
        
    }

    function unidadesEnLetras($num){
        switch($num){
            case 1:
            return "uno";
                break;
            case 2:
            return "dos";
                break;
            case 3:
            return "tres";
                break;
            case 4:
            return "cuatro";
                break;
            case 5:
            return "cinco";
                break;
            case 6:
            return "seis";
                break;
            case 7:
            return "siete";
                break;
            case 8:
            return "ocho";
                break;
            case 9:
            return "nueve";
                break;
        }
    }
    function decenasEnLetras($num){
        switch($num){
            case 2:
            return "veinte";
                break;
            case 3:
            return "treinta";
                break;
            case 4:
            return "cuarenta";
                break;
            case 5:
            return "cincuenta";
                break;
            case 6:
            return "sesenta";
                break;
        }   
    }
?>