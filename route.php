<?php
require_once 'controllers/task.controller.php';

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
        
    break;

    case '': 
    
    break;

    
    default: echo 'operacion desconocida'; break;
}

