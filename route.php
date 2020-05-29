   <?php
require_once 'controllers/public.controller.php';
require_once 'controllers/admin.controller.php';
require_once 'controllers/user.controller.php';


define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = $_GET['action'];

if ($action == '') {
    $action = 'home';
}

$parametro = explode('/', $action);

//print_r($GLOBALS);
//echo (PHP_EOL);
//die (__FILE__);

switch ($parametro[0]) {


    case 'home':
        //----CREO UN OBJETO Y LO INSTANCIO EN LA CLASE GETCONTROLLER             
        $controller = new PublicController();//------>llamo del controlador a la clase especifica donde van a estar las funciones
        $controller->showHome();//----> accedo a lo que tiene la función
        break;

    case 'generos':
        $controller = new PublicController();
        $controller->showGenres();
        break;

    case 'generosmusicales'://------> Muestro lista solo por género musical
        $controller = new PublicController();
        $controller->CdsByGenres($parametro[1]);
        break;

    case 'detalles':
        $controller = new PublicController();
        $controller->details($parametro[1]);
        break;

    case 'bandas':
        $controller = new PublicController();
        $controller->showBands(); //---->pido todas las bandas/artístas
        break;

        //---------------->PARTE ADMIN
    case 'admin':
        $controller = new AdminController();
        $controller->showForm(); //---->verificamos el form
        break;

    case 'logging':
        $controller = new UserController();
        $controller->logging();
        break;

    case 'cerrar_sesion':
        $controller = new UserController();
        $controller->logout();
        break;

    case 'tareas': //recien estamos en bandas. falta generos
        $controller = new AdminController();
        $controller->adminOption();
        break;

    case 'ABMbandas':
        $controller = new AdminController();
        $controller->show_A_B_M_Bands();
        break;

    case 'agregar_banda':
        $controller = new AdminController();
        $controller->addBand();
        break;

    case 'guardar_banda':
        $controller = new AdminController();
        $controller->saveBand();
        break;

    case 'eliminar_banda':
        $controller = new AdminController();
        $controller->removeBand($parametro[1]);
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

    case 'eliminar_genero';
        $controller = new AdminController();
        $controller->deleteGenre($parametro[1]);
        break;

    case 'editar_genero';
        $controller = new AdminController();
        $controller->editGenre($parametro[1]);
        break;

    case 'guardar_edicion_genero';
        $controller = new AdminController();
        $controller->save_edit_genre();
        break;

    case 'ABMuser';
        $controller = new AdminController();
        $controller->show_A_B_M_Users();
        break;

    case 'agregar_usuario';
        $controller = new AdminController();
        $controller->addUsers();
        break;

    case 'guardar_user';
        $controller = new AdminController();
        $controller->saveUser();
        break;

    case 'eliminar_usuario';
        $controller = new AdminController();
        $controller->deleteUser($parametro[1]);
        break;

    case 'editar_usuario';
        $controller = new AdminController();
        $controller->editUser($parametro[1]);
        break;

    case 'guardar_edicion_user';
        $controller = new AdminController();
        $controller->save_edit_user();
        break;


    default: {
            $controller = new PublicController();
            $controller->showError("operacion desconocida", "images/cds/error.jpg");
            break;
        }
}
