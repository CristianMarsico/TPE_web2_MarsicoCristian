<?php
require_once 'models/user.model.php';
require_once 'views/admin.views.php';

class UserController{

    private $userModel;
    private $userView;

    public function __construct(){
       
        $this->userModel = new UserModel();
        $this->userView = new AdminViews();
    }
    public function logging(){

        $username = $_POST['username'];
        $pass= $_POST['pass'];
        
        //traigo usuario solamente despues verifico el password.
        $user = $this->userModel->getUser($username);
      // var_dump($user);die;
       //$user si tiene objeto adentro da TRUE, sinó FALSE. 
        if($user && ($pass == password_verify($pass, $user->pass))){
            //abro session y guardo al usuario
            session_start();
            
            //guardo datos
            $_SESSION['ID_USER'] = $user->id_admin;
            $_SESSION['USERNAME'] = $user->name_admin;
            
           // $this->userView->accessGranted($user);  
           header('Location: ' . BASE_URL . 'tareas');   
        }else{
            $this->userView->viewForm("datos invalidos");
        }       
    }

    public function logout(){
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL . 'home');
    }
}