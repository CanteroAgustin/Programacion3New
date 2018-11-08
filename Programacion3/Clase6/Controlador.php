<?php
include_once 'Login.php';

if(isset($_POST['nombre']) && isset($_POST['clave']) && isset($_POST['perfil'])){
    Login::verificarUsuario($_POST['nombre'], $_POST['clave'], $_POST['perfil']);
}else{
    echo "Verificar parametros";
}



?>