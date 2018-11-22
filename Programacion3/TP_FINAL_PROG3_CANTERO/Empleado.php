<?php

include_once 'AccesoDatos.php';

class Empleado{

	public $id;
    public $nombre;
    public $apellido;
    public $puesto;
    public $suspendido;
    public $email;
    public $password;
    
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getNombre(){
        return $nombre;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function getApellido(){
        return $apellido;
    }

    public function setPuesto($puesto){
        $this->puesto = $puesto;
    }

    public function getPuesto(){
        return $puesto;
    }

    public function setSuspendido($suspendido){
        $this->suspendido = $suspendido;
    }

    public function getSuspendido(){
        return $suspendido;
    }
    
    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $email;
    }
    
    public function setPassword($password){
        $this->password = $password;
    }

    public function getPassword(){
        return $password;
    }

    public function InsertarElEmpleado()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into empleados (nombre,apellido,puesto,suspendido,email,password)values(:nombre,:apellido,:puesto,:suspendido,:email,:password)");
		$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
		$consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
        $consulta->bindValue(':puesto', $this->puesto, PDO::PARAM_STR);
        $consulta->bindValue(':suspendido', $this->suspendido, PDO::PARAM_INT);
        $consulta->bindValue(':email', $this->email, PDO::PARAM_STR);
        $consulta->bindValue(':password', $this->password, PDO::PARAM_STR);
		$consulta->execute();		
		
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }
     
    public function BorrarEmpleado()
	{
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from empleados 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	}

	public function ModificarEmpleado($id)
	{
	    $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("
				update empleados 
				set nombre=:nombre,
				apellido=:apellido,
                puesto=:puesto,
                suspendido=:suspendido,
                email=:email,
                password=:password
				WHERE id=:id");
		$consulta->bindValue(':id',$id, PDO::PARAM_INT);
		$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_INT);
		$consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
        $consulta->bindValue(':puesto', $this->puesto, PDO::PARAM_STR);
		$consulta->bindValue(':suspendido', $this->suspendido, PDO::PARAM_STR);
		$consulta->bindValue(':email', $this->email, PDO::PARAM_STR);
		$consulta->bindValue(':password', $this->password, PDO::PARAM_STR);
		$consulta->execute();
		return $consulta->rowCount();
	}

  	public static function TraerTodosLosEmpleados()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("select id, nombre, apellido, puesto, suspendido, email, password from empleados");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Empleado");		
	}

	public static function TraerUnEmpleado($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id, nombre, apellido, puesto, suspendido from empleados where id = $id");
			$consulta->execute();
			$empleado= $consulta->fetchObject('Empleado');
			return $empleado;				

			
	}
	
	public static function TraerPorEmail($email) 
	{
	    $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id, nombre, apellido, puesto, suspendido, email, password from empleados WHERE email=:email");
			$consulta->bindValue(':email',$email, PDO::PARAM_INT);
			$consulta->execute();
			$empleado= $consulta->fetchObject('Empleado');
			return $empleado;	
			
	}
}


?>