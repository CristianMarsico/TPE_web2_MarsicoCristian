<?php
require_once 'models/public.model.php';
require_once 'views/public.views.php';

Class PublicController{
    private $model;
    private $views;

    public function __construct(){
        $this->model = new PublicModel();
        $this->views = new PublicViews();
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

     public function details($id_detalles){
    
        $detalles = $this->model-> getDetails($id_detalles);
        
        $canciones = $detalles[0]->songs; //en una variable meto las canciones
        $temas = explode(",", $canciones);//hago un array de todas las canciones
        $this->views-> showDetails($detalles, $temas);
    }

     //MUESTRA LA LISTA DE TODAS LAS BANDAS
     public function showBands(){
       
        $bandas = $this->model-> getAllBands();//hacemos un inner join mezclando el contenido de las tablas y retornamos el valor

        $this->views-> showAllBands($bandas);
    }


    

}