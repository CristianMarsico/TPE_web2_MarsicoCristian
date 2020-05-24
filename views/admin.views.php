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
    public function viewForm (){
        $this->smarty->display('templates/viewForm.tpl');
    }
    public function accessGranted($name){
       $this->smarty->assign('name', $name);
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
    public function showFormBand($bandas){ //mejorar
        $this->smarty->assign('bandas', $bandas);
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
    public function showAddGenres(){
        $this->smarty->display('templates/showAddGenres.tpl');
    }


}