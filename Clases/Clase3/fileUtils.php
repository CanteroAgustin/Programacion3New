<?php

function get_extension($str) 
{
    $result = explode("/", $str);
    return end($result);
}

function guardarArchivo($origen, $destino){
    if(move_uploaded_file($origen, $destino)){
        echo "Imagen subida con exito...";
    }else{
        echo "Algo salio mal...";
    }
}

function moverArchivo($origen, $destino){
    rename ($origen, $destino);
}

function file_exists_or_create($file){
    if(!file_exists($file)){
        mkdir($file);
    }
}

?>