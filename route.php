<?php
require_once 'controllers/genres.controller.php';
require_once 'controllers/list.controller.php';




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
        $controller = new genresController();//------>llamo del controlador a la clase especifica donde van a estar las funciones
        $controller-> showHome();//----> accedo a lo que tiene la función
    break;

    case 'generos':
        $controller = new genresController();
        $controller-> showGenres();
    break;

    case 'generosmusicales'://------> Muestro lista solo por género musical
        $controller = new genresController();
        $controller-> CdsByGenres($parametro[1]); 
    break;

    case 'detalles';
        $controller = new genresController();
        $controller-> details($parametro[1]); 
    break;

    case 'bandas';
        $controller = new listController();
        $controller-> showBands(); //---->pido todas las bandas/artístas
    break;

    //---------------->PARTE ADMIN
  /* case 'admin';
        $controller = new AdminController();
        $controller-> loginAdmin(); //---->pido todas las bandas/artístas
    break;
*/
    
   
   
   
    default: echo 'operacion desconocida'; break;
}

