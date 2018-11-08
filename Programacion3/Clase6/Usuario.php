<?php
include_once 'AccesoDatos.php';

class Usuario{

    private $id;
    private $nombre;
    private $clave;
    private $mail;
    private $perfil;

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setClave($clave){
        $this->clave = $clave;
    }

    public function getClave(){
        return $this->clave;
    }

    public function setMail($mail){
        $this->mail = $mail;
    }

    public function getMail(){
        return $this->mail;
    }
    
    public function setPerfil($perfil){
        $this->perfil = $perfil;
    }

    public function getPerfil(){
        return $this->perfil;
    }
    
    public function retornarUsuarios(){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta =$objetoAccesoDato->RetornarConsulta("select id,nombre, clave,mail, perfil from usuario");
		$consulta->execute();			
		
		return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");
    }

   
}

 
?>