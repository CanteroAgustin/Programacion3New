<?php

  use \Psr\Http\Message\ServerRequestInterface as Request;
  use \Psr\Http\Message\ResponseInterface as Response;

  require_once 'composer/vendor/autoload.php';

  require_once 'EmpleadoApi.php';
  require_once 'MWparaCORS.php';
  require_once 'MWparaAutentificar.php';
  require_once 'AutentificadorJWT.php';
  require_once 'Login.php';
  
  $config['displayErrorDetails'] = true;
  $config['addContentLengthHeader'] = false;

  $app = new \Slim\App(["settings" => $config]);
  
  $app->post('/login', \Login::class . ':loguear');

  $app->group('/empleados', function () {
    
    $this->get('[/]', \EmpleadoApi::class . ':traerTodos');
    
    $this->get('/{id}', \EmpleadoApi::class . ':traerUno');
    
    $this->post('[/]', \EmpleadoApi::class . ':CargarUno');
    
    $this->delete('/', \EmpleadoApi::class . ':BorrarUno');
    
    $this->put('/', \EmpleadoApi::class . ':ModificarUno');
        
  })->add(MWparaAutentificar::class . ':VerificarUsuario')->add(\MWparaCORS::class . ':HabilitarCORS8080');

$app->run();
?>