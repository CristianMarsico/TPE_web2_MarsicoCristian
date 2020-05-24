<?php
require_once 'controllers/genres.controller.php';
require_once 'controllers/list.controller.php';
require_once 'controllers/admin.controller.php';

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
  //----CREO UN OBJETO Y LO INSTANCIO EN LA CLASE GETCONTROLLER             
        $controller = new GenresController();//------>llamo del controlador a la clase especifica donde van a estar las funciones
        $controller-> showHome();//----> accedo a lo que tiene la función
    break;

    case 'generos':
        $controller = new GenresController();
        $controller-> showGenres();
    break;

    case 'generosmusicales'://------> Muestro lista solo por género musical
        $controller = new GenresController();
        $controller-> CdsByGenres($parametro[1]); 
    break;

    case 'detalles':
        $controller = new GenresController();
        $controller-> details($parametro[1]); 
    break;

    case 'bandas':
        $controller = new ListController();
        $controller-> showBands(); //---->pido todas las bandas/artístas
    break;

    //---------------->PARTE ADMIN
    case 'admin':
        $controller = new AdminController();
        $controller-> showForm(); //---->verificamos el form
    break;

    case 'logging':
        $controller = new AdminController();
        $controller-> loggin();
    break;    

    case 'tareas': //recien estamos en bandas. falta generos
        $controller = new AdminController();
        $controller-> adminOption();
    break;    

    case 'ABMbandas':
        $controller = new AdminController();
        $controller-> show_A_B_M_Bands();
    break;  

    case 'agregar_banda':
        $controller = new AdminController();
        $controller-> addBand();
    break;  

    case 'guardar_banda':
        $controller = new AdminController();
        $controller-> saveBand();
    break;  

    case 'eliminar_banda':
        $controller = new AdminController();
        $controller-> removeBand($parametro[1]);
    break;  

    case 'editar_banda';
        $controller = new AdminController();
        $controller->edit_Band($parametro[1]);
    break;    

    case 'guardar_edicion_banda';
        $controller = new AdminController();
        $controller->save_edit_band();
    break;   
    
    case 'ABMgeneros';
        $controller = new AdminController();
        $controller->show_A_B_M_Genres();
    break;   

    case 'agregar_genero';
        $controller = new AdminController();
        $controller->addGenres();
    break;   
    
    case 'guardar_genero';
        $controller = new AdminController();
        $controller->saveGenre();
    break; 
    

   
    

    


    
   
   
   
    default: echo 'operacion desconocida'; break;
}

