<?php
require_once 'models/genres.model.php';


//-------------------------CREAMOS LA CLASE: es llamada por el router
class GenresController{
    
    private $model;
    private $views;
    
    public function __construct(){
        $this->model = new GenresModel();
        $this->views = new PublicViews();
    }
    //public function showHome(){
       
      //  $this->views-> home();
    //}

   /* public function showGenres(){
      
        //model = new MusicModel();
        $generos= $this->model -> getGenres();//pido los generos
       
        //$views = new MusicViews();
        $this->views-> showAllGenres($generos);//muestro los generos
    }*/

   /*public function cdsByGenres($id){
      
       $generos = $this->model-> getCdsByGenres($id);
       //var_dump($generos);die;
       if(empty($generos)){
            $this->views->error();die;
        }
        $this->views-> showBandsForGenres($generos);
    }*/

   //ESTA FUNCION TRAE LOS DETALLES DE TODOS LOS ALBUMS (LISTA COMPLETA->DETALLES)
  
  
  
  
  
  //VER POR LAS DUDAS
  
   /*public function details($id_detalles){
    
        $detalles = $this->model-> getDetails($id_detalles);
        
        $canciones = $detalles[0]->songs; //en una variable meto las canciones
        $temas = explode(",", $canciones);//hago un array de todas las canciones
        $this->views-> showDetails($detalles, $temas);
    }*/
}