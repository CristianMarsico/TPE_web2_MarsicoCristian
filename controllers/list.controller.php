<?php
require_once 'models/list.model.php';
require_once 'views/all.views.php';

class ListController{

    private $model;

    public function __construct(){
        $this->model = new ListModel();
        $this->views = new AllViews();
    }

    //MUESTRA LA LISTA DE TODAS LAS BANDAS
    public function showBands(){

        $bandas = $this->model-> getAllBands();//hacemos un inner join mezclando el contenido de las tablas y retornamos el valor

        $this->views-> showAllBands($bandas);
    }
}