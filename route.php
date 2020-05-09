<?php
require_once 'controllers/music.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = $_GET ['action'];

if ($action == ''){
    $action = 'home';
}

$parametro = explode('/', $action);

//print_r($GLOBALS);
//echo (PHP_EOL);
//die (__FILE__);

switch ($parametro[0]){
                                                                                                            
   
    case 'home':  
  //----CREO UN OBJETO Y LO INSTANCIO EN LA CLASE MUSICCONTROLLER             
        $controller = new MusicController();//------>llamo del controlador a la clase especifica donde van a estar las funciones
        $controller-> showHome();//----> accedo a lo que tiene la funcion
    break;

    case 'generos':
        $controller = new MusicController();
        $controller-> showGenres();
    break;

    
    default: echo 'operacion desconocida'; break;
}

