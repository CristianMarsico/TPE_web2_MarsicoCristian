<?php
require_once 'models/music.model.php';
require_once 'views/music.views.php';

//-------------------------CREAMOS LA CLASE: es llamada por el router
class MusicController{
    
    //todolist hacer privadas models y views
    //todolist crear constructor 

    public function showHome(){
       
        $views = new MusicViews();
        $views-> home();
    }

    public function showGenres(){
      
        $model = new MusicModel();
        $generos= $model -> getGenres();//pido los generos

        $views = new MusicViews();
        $views-> showAllGenres($generos);//muestro los generos
    }

    public function bandsForGenres($id){
        //var_dump($id); die('erwrwerwer');
       $model = new MusicModel();
       $generos = $model-> getBandsForGenres($id);
       
       $views = new MusicViews();
       $views-> showBandsForGenres($generos);
    }

   //ESTA FUNCION TRAE LOS DETALLES DE TODOS LOS ALBUMS (LISTA COMPLETA->DETALLES)
    public function details($id_detalles){
      
        $model = new MusicModel();
        $detalles = $model-> getDetails($id_detalles);
       
        $views = new MusicViews();
        $views-> showDetails($detalles);
    }
  //HASTA ACA TODO LO DE GENEROS 

  //ACA LISTA COMPLETA
    public function showBands(){

        $model = new MusicModel();
        $bandas = $model-> getAllBands();//hacemos un inner join mezclando el contenido de las tablas y retornamos el valor

        $views = new MusicViews();
        $views-> showAllBands($bandas);
    }

 
  

}