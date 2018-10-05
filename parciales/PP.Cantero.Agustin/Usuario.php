<?php
include_once 'fileUtils.php';

class Usuario{
    public $nombre;
    public $apellido;
    public $email;
    public $pathFoto;

    function __construct($nombre, $apellido, $email, $pathFoto){
        $this->setNombre($nombre);
        $this->setApellido($apellido);
        $this->setEmail($email);
        $this->setPathFoto($pathFoto);
    }

    function setNombre($nombre){
        $this->nombre = $nombre;
    }

    function getNombre(){
        return $this->nombre;
    }

    function setApellido($apellido){
        $this->apellido = $apellido;
    }

    function getApellido(){
        return $this->apellido;
    }

    function setEmail($email){
        $this->email = $email;
    }

    function getEmail(){
        return $this->email;
    }

    function setPathFoto($pathFoto){
        $this->pathFoto = $pathFoto;
    }

    function getPathFoto(){
        return $this->pathFoto;
    }

    function toString(){
        return $this->getNombre()."-".$this->getApellido()."-".$this->getEmail()."-".$this->getPathFoto();
    }
}

function consultarUsuario($apellido){
    
    $usuarios = getUsuarios();
    $grilla = getTHead();
    $existe = false;
    for ($i = 0; $i<Count($usuarios); $i++){

        if(strcasecmp($usuarios[$i]->apellido, $apellido) === 0){
                $grilla .= "<tr>
							<td>".$usuarios[$i]->nombre."</td>
                            <td>".$usuarios[$i]->apellido."</td>
                            <td>".$usuarios[$i]->email."</td>
							<td><img src='".$usuarios[$i]->pathFoto."' width='100px' height='100px'/></td>
						</tr>";
            $existe = true;
        }
    }

    if(!$existe){
        echo "No existe usuario con apellido: ".$apellido;
    }else{
        echo $grilla;
    }
}

function listarUsuarios(){
    $usuarios = getUsuarios();
    $grilla = getTHead();
    for ($i = 0; $i<Count($usuarios); $i++){
        $grilla .= "<tr>
        <td>".$usuarios[$i]->nombre."</td>
        <td>".$usuarios[$i]->apellido."</td>
        <td>".$usuarios[$i]->email."</td>
        <td><img src='".$usuarios[$i]->pathFoto."' width='100px' height='100px'/></td>
    </tr>";
    }
    if($usuarios != null && Count($usuarios)>=1){
        echo $grilla;
    }else{
        echo "<p>No hay usuarios registrados</p>";
    }
    
}

function cargarUsuario($nombre, $apellido, $email, $foto){
    $usuarios = getUsuarios();
    if(corroborarEmail($email, $usuarios)){
        $archivo = abrirOCrearFichero("archivos","usuarios.txt","a");
        $pathFoto = guardarFoto($foto,$email);
        $usuario = new Usuario($nombre, $apellido, $email, $pathFoto);
        fwrite($archivo, $usuario->toString().PHP_EOL);
        fclose($archivo);
    }else{
        echo "El email ingresado ya existe";
    }
    
}

function modificarUsuario($nombre, $apellido, $email,$foto){

    
    $usuarios = getUsuarios();
    for($i = 0; $i<Count($usuarios); $i++){
        if(strcmp($email, $usuarios[$i]->getEmail()) === 0){
            $archivo = abrirOCrearFichero("archivos","usuarios.txt","w");
            guardarBkp($usuarios[$i]);
            $pathFoto = guardarFoto($foto,$email);
            $usuarios[$i]->setNombre($nombre);
            $usuarios[$i]->setApellido($apellido);
            $usuarios[$i]->setPathFoto($pathFoto);
        }
    }

    for($i = 0; $i<Count($usuarios); $i++){
        fwrite($archivo, $usuarios[$i]->toString());
    }
    
    fclose($archivo);
}

function corroborarEmail($email, $usuarios){
    
    $existe = true;
    if($usuarios!=null){
        for ($i = 0; $i<Count($usuarios); $i++){
            if(strcmp($usuarios[$i]->email, $email)=== 0) {
                $existe = false;
                break;
            }
        }
    }
    
    return $existe;
}

function getUsuarios(){
    if(file_exists("archivos/usuarios.txt")){
        $file = fopen("archivos/usuarios.txt", "r") or exit("El archivo no existe!");
        $listaUsuarios = [];
        
        while(!feof($file))
        {
            $usuarioTemp = fgets($file);
            $usuario = explode("-",$usuarioTemp);
            if(!$usuario[0] == ""){
                $usuario = new Usuario($usuario[0],$usuario[1],$usuario[2],$usuario[3]);
                array_push($listaUsuarios, $usuario);
            }
           
        }
        fclose($file);
        
        return $listaUsuarios;
    }else{
        return null;
    }
}

function getTHead(){
    $grilla = '<table class="table">
					<thead style="background:rgb(14, 26, 112);color:#fff;">
						<tr>
							<th> NOMBRE </th>
							<th>  APELLIDO     </th>
							<th>  EMAIL       </th>
							<th>  FOTO     </th>
						</tr> 
                    </thead>';
    return $grilla;
}

function guardarFoto($foto, $nombre){
    crearFichero("fotos");
    $dir_subida = 'fotos/';
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

function guardarBkp($usuario){
    crearFichero("backUpFotos");
    $pathAnterior = $usuario->pathFoto;
    $extTemp = explode(".", $pathAnterior);
    $extension = end($extTemp);
    $pathNuevo = "backUpFotos/".$usuario->apellido."-".date('Y-m-d').".".$extension;
    if (copy($pathAnterior, $pathNuevo)) {
        echo "La foto es valida y se subió con éxito.\n";
    } else {
        echo "¡No se pudo cargar la foto!\n";
    }
}

?>