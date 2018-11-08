<?php

require_once "AutentificadorJWT.php";
require_once 'Empleado.php';

class Login
{
 
 
	public function loguear($request, $response, $args) {
        
        if($request->isPost())
		{
            $nombre=$args['nombre'];
            $apellido = $args['apellido'];
        	$empleado=Empleado::TraerPorNombreYApellido($nombre, $apellido);
		    $objDelaRespuesta= new stdclass();
		    $objDelaRespuesta->respuesta="";
	   
		
		    $datos = array('usuario' => $empleado->nombre,'puesto' => $empleado->apellido);
		    $token= AutentificadorJWT::CrearToken($datos);
		    $response->getBody()->write('<p>'.$token.'</p>');
		    $objDelaRespuesta->elToken=$token;
		    
		}
		
		if($objDelaRespuesta->respuesta!="")
		{
			$nueva=$response->withJson($objDelaRespuesta, 401);  
			return $nueva;
		}
		
		 return $response;   
	}
}
?>