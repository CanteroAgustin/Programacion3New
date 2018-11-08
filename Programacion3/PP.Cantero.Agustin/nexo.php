<?php
include_once 'Usuario.php';
include_once 'Mensaje.php';

if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_FILES['foto']) && isset($_POST['modificar'])){
    modificarUsuario($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_FILES['foto']);
}elseif(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_FILES['foto'])){
    cargarUsuario($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_FILES['foto']);
}elseif (isset($_GET['apellido'])) {
    consultarUsuario($_GET['apellido']);
}elseif(isset($_POST['remitente']) && isset($_POST['destinatario']) && isset($_POST['mensaje'])){
    cargarMensaje($_POST['remitente'], $_POST['destinatario'], $_POST['mensaje'], $_FILES['foto']);
}elseif (isset($_GET['destinatario'])) {
    mensajesRecibidos($_GET['destinatario']);
}elseif (isset($_GET['remitente'])) {
    mensajesEnviados($_GET['remitente']);
}elseif (isset($_GET['listMsj'])) {
    mensajes();
}else{
    listarUsuarios();
}



?>