<?php

class Producto{

    protected $_nombre;
    protected $_codBarra;

    function __construct($_nombre, $_codBarra){
        $this->_nombre = $_nombre;
        $this->_codBarra = $_codBarra;
    }

    function ToString(){
        echo $this->_nombre." - ".$this->_codBarra;
    }
}


?>