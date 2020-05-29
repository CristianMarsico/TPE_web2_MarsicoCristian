<?php

require_once 'libs/Smarty.class.php';

class AdminViews
{

    private $smarty;


    public function __construct()
    {
        $this->smarty = new Smarty();
    }

    public function header()
    {
        $this->smarty->display('templates/header.tpl');
    }
    //ACA SE MUESTRA EL FORM DE ACCESO
    public function viewForm($error = null)
    {
        // var_dump($error);die;
        $this->smarty->assign('error', $error);

        $this->smarty->display('templates/viewForm.tpl');
    }
    public function accessGranted($user)
    {
        // var_dump($user);die;
        $this->smarty->assign('user', $user);
        $this->smarty->display('templates/accessGranted.tpl');
    }
    //ACA LAS OPCIONES DE ABM   
    public function choseTask($user)
    {
        $this->smarty->assign('user', $user);
        $this->smarty->display('templates/choseTask.tpl');
    }
    //MOSTRAMOS LA TABLA CON LOS BOTONES
    public function showOptionsBands($bandas, $user)
    {
        $this->smarty->assign('bandas', $bandas);
        $this->smarty->assign('user', $user);
        $this->smarty->display('templates/showOptionsBands.tpl');
    }

    //ACA MUESTRO EL FORM PARA AGREGAR
    public function showFormBand($bandas, $user, $error = null)
    {
        // var_dump($user); die;
        $this->smarty->assign('bandas', $bandas);
        $this->smarty->assign('user', $user);
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/showFormBand.tpl');
    }
    //MOSTRAMOS EL FORM PARA EDITAR BANDA    
    public function showFormEditForBands($id)
    {
        $this->smarty->assign('id', $id);
        $this->smarty->display('templates/showFormEditForBands.tpl');
    }
    //SE MUESTRA LAS OPCIONES EN LA TABLA DE GENEROS
    public function showOptionsGenres($generos, $user)
    {
        $this->smarty->assign('user', $user);
        $this->smarty->assign('generos', $generos);
        $this->smarty->display('templates/showOptionsGenres.tpl');
    }
    //ACCEDEMOS AL AGREGAR DE LA TABLA GENEROS
    public function showAddGenres($error = null)
    {
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/showAddGenres.tpl');
    }

    public function showFormEditForGenres($id, $error = null)
    {
        $this->smarty->assign('id', $id);
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/showFormEditForGenres.tpl');
    }

    public function showOptionsUsers($admin, $user)
    {
        //  var_dump($admin);die;
        $this->smarty->assign('user', $user);
        $this->smarty->assign('admin', $admin);
        $this->smarty->display('templates/showOptionsUsers.tpl');
    }

    public function showAddAdmin($error = null)
    {

        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/showAddAdmin.tpl');
    }

    public function showFormEditForAdmin($id, $error = null)
    {
        // var_dump($id);die;
        $this->smarty->assign('id', $id);
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/showFormEditForAdmin.tpl');
    }
}
