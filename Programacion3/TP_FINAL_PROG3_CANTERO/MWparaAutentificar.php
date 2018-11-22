<?php

require_once "AutentificadorJWT.php";
class MWparaAutentificar
{   
	public function VerificarUsuario($request, $response, $next) {
         
		$objDelaRespuesta= new stdclass();
		$objDelaRespuesta->respuesta="";
	   
		$arrayConToken = $request->getHeader('token');
		$token=$arrayConToken[0];
		$objDelaRespuesta->esValido=true; 
		try 
		{
			AutentificadorJWT::verificarToken($token);
			$objDelaRespuesta->esValido=true;
		}	
		catch (Exception $e) {      
			$objDelaRespuesta->excepcion=$e->getMessage();
			$objDelaRespuesta->esValido=false;   
		}

		if($objDelaRespuesta->esValido)
		{					
			$response = $next($request, $response);
		}    
		else
		{
		    $objDelaRespuesta->respuesta="Solo usuarios registrados";
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