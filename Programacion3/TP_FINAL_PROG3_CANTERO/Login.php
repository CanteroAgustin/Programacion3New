<?php

require_once "AutentificadorJWT.php";
require_once 'Empleado.php';

class Login
{
 
 
	public function loguear($request, $response, $args) {
        
        if($request->isPost())
		{
		    $array = $request->getParsedBody();
            $email = $array['email'];
            $password = $array['password'];
        	$empleado=Empleado::TraerPorEmail($email);
		    $objDelaRespuesta= new stdclass();
		    $objDelaRespuesta->respuesta="";
	        
	       if($empleado != null){
	           if($empleado->password === $password){
	               $datos = array('email' => $email);
    		       $token= AutentificadorJWT::CrearToken($datos);
    		       $response->getBody()->write($token);
    		       $objDelaRespuesta->token=$token;
	           }else{
	               $objDelaRespuesta->error="Contraseña incorrecta.";
	               $nueva=$response->withJson($objDelaRespuesta, 401);  
			       return $nueva;
	           }
	           
	       }else{
	           $objDelaRespuesta->error="El email ingresado no esta registrado";
	           $nueva=$response->withJson($objDelaRespuesta, 401);  
			   return $nueva;
	       }
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