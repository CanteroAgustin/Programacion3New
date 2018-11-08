<?php
include_once 'Usuario.php';
class Login{
    
    
    
    public function verificarUsuario($nombre, $clave, $perfil){
        
        $usuarios = Usuario::retornarUsuarios();
        $flagTemp = false;
        
        if($nombre && $clave && $perfil){
            foreach($usuarios as $usuario){
                if($usuario->getNombre() == $nombre && $usuario->getClave() == $clave){
                    if($perfil == $usuario->getPerfil()){
                        echo "UsuarioRecuperado: ".$usuario->getNombre();
                    }else{
                        echo "El perfil del usuario no coincide";
                    }
                    
                    
                    $flagTemp = true;
                }
                break;
            }
        }
        if(!$flagTemp){
            echo "Usuario o contraseña incorrectos.";
        }
    }

}

?>
					
	