<?php

require_once 'libs/Smarty.class.php';

class AdminViews{

    private $smarty;

    
    public function __construct(){
        $this->smarty = new Smarty();
    }
    
    public function header(){
        $this->smarty->display('templates/header.tpl'); 
    }
    //ACA SE MUESTRA EL FORM DE ACCESO
    public function viewForm ($error=null){
      // var_dump($error);die;
       $this->smarty->assign('error', $error);

        $this->smarty->display('templates/viewForm.tpl');
    }
    public function accessGranted($user){
       // var_dump($msg);die;
       $this->smarty->assign('user', $user);
       $this->smarty->display('templates/accessGranted.tpl');
    }
    //ACA LAS OPCIONES DE ABM   
    public function choseTask(){
       $this->smarty->display('templates/choseTask.tpl');
    }
    //MOSTRAMOS LA TABLA CON LOS BOTONES
    public function showOptionsBands($bandas){
        $this->smarty->assign('bandas', $bandas);   
        $this->smarty->display('templates/showOptionsBands.tpl');
    }
    
    //ACA MUESTRO EL FORM PARA AGREGAR
    public function showFormBand($bandas, $error=null){ //mejorar
        $this->smarty->assign('bandas', $bandas);
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/showFormBand.tpl');
    }
    //MOSTRAMOS EL FORM PARA EDITAR BANDA    
    public function showFormEditForBands($id){
        $this->smarty->assign('id', $id);
        $this->smarty->display('templates/showFormEditForBands.tpl');
     }
    //SE MUESTRA LAS OPCIONES EN LA TABLA DE GENEROS
    public function showOptionsGenres($generos){
        $this->smarty->assign('generos', $generos);
        $this->smarty->display('templates/showOptionsGenres.tpl');
    }
    //ACCEDEMOS AL AGREGAR DE LA TABLA GENEROS
    public function showAddGenres($error=null){
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/showAddGenres.tpl');
    }

    public function showFormEditForGenres($id){
        $this->smarty->assign('id', $id);
        $this->smarty->display('templates/showFormEditForGenres.tpl');
    }

    public function showOptionsUsers($admin){
      //  var_dump($admin);die;
        $this->smarty->assign('admin', $admin);
        $this->smarty->display('templates/showOptionsUsers.tpl');
    }

    public function showAddAdmin($error=null){
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/showAddAdmin.tpl');
    }
}