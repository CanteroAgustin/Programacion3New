<?php
require_once 'Empleado.php';
require_once 'IApiUsable.php';

class EmpleadoApi extends Empleado implements IApiUsable
{
 	public function TraerUno($request, $response, $args) {
     	$id=$args['id'];
    	$empleado=Empleado::TraerUnEmpleado($id);
     	$newResponse = $response->withJson($empleado, 200);  
    	return $newResponse;
    }
    
     public function TraerTodos($request, $response, $args) {
        $empleado = Empleado::TraerTodosLosEmpleados();

     	$newResponse = $response->withJson($empleado, 200);
    	return $newResponse;
    }
      public function CargarUno($request, $response, $args) {
     	$ArrayDeParametros = $request->getParsedBody();
        $nombre= $ArrayDeParametros['nombre'];
        $apellido= $ArrayDeParametros['apellido'];
        $puesto= $ArrayDeParametros['puesto'];
        $suspendido= $ArrayDeParametros['suspendido'];
        $empleado = new Empleado();
        $empleado->setNombre($nombre);
        $empleado->setApellido($apellido);
        $empleado->setPuesto($puesto);
        $empleado->setSuspendido($suspendido);
        $empleado->InsertarElEmpleado();
        
        $response->getBody()->write("se guardo el empleado");

        return $response;
    }

      public function BorrarUno($request, $response, $args) {
     	$ArrayDeParametros = $request->getParsedBody();
     	$id=$ArrayDeParametros['id'];
     	$empleado= new Empleado();
     	$empleado->id=$id;
     	$cantidadDeBorrados=$empleado->BorrarEmpleado();

     	$objDelaRespuesta= new stdclass();
	    $objDelaRespuesta->cantidad=$cantidadDeBorrados;
	    if($cantidadDeBorrados>0)
	    	{
	    		 $objDelaRespuesta->resultado="se borraron ".$cantidadDeBorrados." empleados.";
	    	}
	    	else
	    	{
	    		$objDelaRespuesta->resultado="no se borraron empleados!!!";
	    	}
	    $newResponse = $response->withJson($objDelaRespuesta, 200);  
      	return $newResponse;
    }
     
     public function ModificarUno($request, $response, $args) {

		$ArrayDeParametros = $request->getParsedBody();

		$id = $ArrayDeParametros['id'];
		$nombre = $ArrayDeParametros['nombre'];
		$apellido = $ArrayDeParametros['apellido'];
		$puesto = $ArrayDeParametros['puesto'];
		$suspendido = $ArrayDeParametros['suspendido'];

		$empleado = new Empleado();
		if($nombre != "" || $nombre != null){
			$empleado->setNombre($nombre);
		}
        
        $empleado->setApellido($apellido);
        $empleado->setPuesto($puesto);
		$empleado->setSuspendido($suspendido);
	   	$resultado = $empleado->ModificarEmpleado($id);
	   	$objDelaRespuesta= new stdclass();
		$objDelaRespuesta->resultado=$resultado;
		return $response->withJson($objDelaRespuesta, 200);		
    }


}