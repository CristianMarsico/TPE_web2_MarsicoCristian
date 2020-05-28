<?php
require_once 'models/genres.model.php';
require_once 'views/all.views.php';

//-------------------------CREAMOS LA CLASE: es llamada por el router
class GenresController{
    
    private $model;
    private $views;
    
    public function __construct(){
        $this->model = new GenresModel();
        $this->views = new AllViews();
    }
    public function showHome(){
       
        $this->views-> home();
    }

    public function showGenres(){
      
        //model = new MusicModel();
        $generos= $this->model -> getGenres();//pido los generos
       
        //$views = new MusicViews();
        $this->views-> showAllGenres($generos);//muestro los generos
    }

    public function cdsByGenres($id){
      
       $generos = $this->model-> getCdsByGenres($id);
       //var_dump($generos);die;
       if(empty($generos)){
            $this->views->error();die;
        }
    $this->views-> showBandsForGenres($generos);
    }

   //ESTA FUNCION TRAE LOS DETALLES DE TODOS LOS ALBUMS (LISTA COMPLETA->DETALLES)
    public function details($id_detalles){
    
        $detalles = $this->model-> getDetails($id_detalles);
    
        $this->views-> showDetails($detalles);
    }
}