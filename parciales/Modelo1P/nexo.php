<?php
include_once 'Alumno.php';

if(isset($_GET)){

}elseif (isset($_POST)) {
    if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['foto'])){
        cargarAlumno($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['foto']);
    }else{
        echo "Error. Faltan parametros o alguno de los parametros ingresados es incorrecto.";
    }
}else{
    echo "Error. No se reconoce la accion solicitada";
}

?>