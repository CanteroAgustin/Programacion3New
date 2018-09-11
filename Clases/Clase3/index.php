<?php

include_once "producto.php";
include_once "fileUtils.php";

if(isset($_POST['nombre'] ) && isset($_POST['nombre'] )){

    $nombre = $_POST['nombre'];
    $codBarra = $_POST['codBarra'];
    $foto = $_FILES['img'];
    $tipo = $_FILES['img']['type'];
    
    $extencion = get_extension($tipo);
    date_default_timezone_set('america/argentina/buenos_aires'); 
    $destino = "uploads/".$nombre.$codBarra.".".$extencion;
    if(!file_exists($destino)){
        file_exists_or_create("uploads");
        guardarArchivo($_FILES["img"]["tmp_name"],$destino);
    }else{
        $hoy = date("j-m-y H.i.s");
        file_exists_or_create("bkp");
        moverArchivo($destino,"bkp/".$nombre.$codBarra.$hoy.".".$extencion);
        guardarArchivo($_FILES["img"]["tmp_name"],$destino);
    }
    
    $producto = new Producto($nombre, $codBarra);
    echo("</br>");
    $producto->ToString();
}


?>