<?php

function abrirOCrearFichero($directorio,$archivo, $modo){
    if(!file_exists($directorio)){
        mkdir($directorio);
        
    }
    return fopen($directorio."/".$archivo, $modo);
}

function crearFichero($directorio){
    if(!file_exists($directorio)){
        mkdir($directorio);
    }
}

?>