<?php
include_once 'fileUtils.php';

class Mensaje{
    public $remitente;
    public $destinatario;
    public $mensaje;
    public $pathFoto;

    function __construct($remitente, $destinatario, $mensaje, $pathFoto){
        $this->setRemitente($remitente);
        $this->setDestinatario($destinatario);
        $this->setMensaje($mensaje);
        $this->setPathFoto($pathFoto);
    }

    function setRemitente($remitente){
        $this->remitente = $remitente;
    }

    function getRemitente(){
        return $this->remitente;
    }

    function setDestinatario($destinatario){
        $this->destinatario = $destinatario;
    }

    function getDestinatario(){
        return $this->destinatario;
    }

    function setMensaje($mensaje){
        $this->mensaje = $mensaje;
    }

    function getMensaje(){
        return $this->mensaje;
    }

    function setPathFoto($pathFoto){
        $this->pathFoto = $pathFoto;
    }

    function getPathFoto(){
        return $this->pathFoto;
    }

    function toString(){
        return $this->getRemitente()."-".$this->getDestinatario()."-".$this->getMensaje()."-".$this->getPathFoto();
    }
}

function cargarMensaje($remitente, $destinatario, $mensaje, $foto){
    $archivo = abrirOCrearFichero("archivos","mensajes.txt", "a+");
    $pathFoto = guardarFotoMensaje($foto,$remitente);
    $nuevoMensaje = new Mensaje($remitente, $destinatario, $mensaje, $pathFoto);
    fwrite($archivo,$nuevoMensaje->toString().PHP_EOL);
    echo "Mensaje enviado!!!";
    fclose($archivo);
}

function getMensajes(){
    if(file_exists("archivos/mensajes.txt")){
        $file = fopen("archivos/mensajes.txt", "r") or exit("El archivo no existe!");
        $listaMensajes = [];
        
        while(!feof($file))
        {
            $mensajeTemp = fgets($file);
            $mensaje = explode("-",$mensajeTemp);
            if(!$mensaje[0] == ""){
                $mensaje = new Mensaje($mensaje[0],$mensaje[1],$mensaje[2],$mensaje[3]);
                array_push($listaMensajes, $mensaje);
            }
           
        }
        fclose($file);
        
        return $listaMensajes;
    }else{
        return null;
    }
}

function mensajesRecibidos($destinatario){
    $mensajes = getMensajes();
    $grilla = getTHeadMensaje();
    $noHayMensajes = true;
    for ($i = 0; $i<Count($mensajes); $i++){

        if(strcmp($mensajes[$i]->destinatario, $destinatario)=== 0){
            $noHayMensajes = false;
            $grilla .= "<tr>
            <td>".$mensajes[$i]->remitente."</td>
            <td>".$mensajes[$i]->destinatario."</td>
            <td>".$mensajes[$i]->mensaje."</td>
            <td><img src='".$mensajes[$i]->pathFoto."' width='100px' height='100px'/></td>
            </tr>";
        }

    }
    if($noHayMensajes){
        echo "El usuario: ".$destinatario.", No recibio ningun mensaje";
    }else{
        echo $grilla;
    }
    
}

function mensajesEnviados($remitente){
    $mensajes = getMensajes();
    $grilla = getTHeadMensaje();
    $noHayMensajes = true;
   
    for ($i = 0; $i<Count($mensajes); $i++){

        if(strcmp($mensajes[$i]->remitente, $remitente)=== 0){
            $noHayMensajes = false;
            $grilla .= "<tr>
            <td>".$mensajes[$i]->remitente."</td>
            <td>".$mensajes[$i]->destinatario."</td>
            <td>".$mensajes[$i]->mensaje."</td>
            <td><img src='".$mensajes[$i]->pathFoto."' width='100px' height='100px'/></td>
            </tr>";
        }

    }
    if($noHayMensajes){
        echo "El usuario: ".$remitente.", No envio ningun mensaje";
    }else{
        echo $grilla;
    }
}

function mensajes(){
    $mensajes = getMensajes();
    $grilla = getTHeadMensaje();
    $noHayMensajes = true;
   
    for ($i = 0; $i<Count($mensajes); $i++){
        $noHayMensajes = false;
        $grilla .= "<tr>
            <td>".$mensajes[$i]->remitente."</td>
            <td>".$mensajes[$i]->destinatario."</td>
            <td>".$mensajes[$i]->mensaje."</td>
            <td><img src='".$mensajes[$i]->pathFoto."' width='100px' height='100px'/></td>
            </tr>";
    }
    if($noHayMensajes){
        echo "No hay mensajes";
    }else{
        echo $grilla;
    }
}

function getTHeadMensaje(){
    $grilla = '<table class="table">
					<thead style="background:rgb(14, 26, 112);color:#fff;">
						<tr>
							<th> REMITENTE </th>
							<th>  DESTINATARIO     </th>
                            <th>  MENSAJE       </th>
                            <th>  FOTO     </th>
						</tr> 
					</thead>';
    return $grilla;
}

function guardarFotoMensaje($foto, $nombre){
    crearFichero("fotosMensajes");
    $dir_subida = 'fotosMensajes/';
    $tipo = explode("/",$foto['type']);
    $extension = end($tipo);
    $fichero_subido = $dir_subida.$nombre.".".$extension;
    if (move_uploaded_file($foto['tmp_name'], $fichero_subido)) {
        echo "La foto es valida y se subió con éxito.\n";
    } else {
        echo "¡No se pudo cargar la foto!\n";
    }
    return $fichero_subido;
}
?>