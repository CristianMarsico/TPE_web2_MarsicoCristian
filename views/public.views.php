<?php
require_once 'libs/Smarty.class.php';

class PublicViews
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
    }

    public function header()
    {
        $this->smarty->display('templates/headerHome.tpl');
    }

    public function home()
    {
        $this->smarty->display('templates/showHome.tpl');
    }

    public function show_Error($msg)
    {
        $this->smarty->assign('msg', $msg);
        $this->smarty->display('templates/show_Error.tpl');
    }

    //MUESTROS "GENEROS"
    public function showAllGenres($detalles, $error = null)
    {
        // var_dump($detalles) ;die;
        $this->smarty->assign('detalles', $detalles);
        // $this->smarty->assign('error', $detalles);
        $this->smarty->display('templates/showAllGenres.tpl');
    }

    //MUESTRO QUE TIENE EL "VER" DE "GENEROS" (GENEROS -> VER)
    public function showBandsForGenres($detalles)
    {
        $this->smarty->assign('detalles', $detalles);
        $this->smarty->display('templates/showBandsForGenres.tpl');
    }


    //MUESTRO "LISTA COMPLETA" ($bandas--> id_b, genero, album, nombre, canciones, año)
    public function showAllBands($bandas)
    {
        $this->smarty->assign('bandas', $bandas);
        $this->smarty->display('templates/showAllBands.tpl');
    }

    //MUESTRO EL "DETALLES" DE "LISTA COMPLETA"
    public function showDetails($valor, $temas)
    {
        $this->smarty->assign('valor', $valor);
        $this->smarty->assign('temas', $temas);
        $this->smarty->display('templates/details.tpl');
    }
    public function error()
    {
        echo 'falta cd';
    }
}
