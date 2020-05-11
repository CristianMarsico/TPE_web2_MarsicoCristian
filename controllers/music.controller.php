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

    public function showBands(){

        $model = new MusicModel();
        $bandas = $model-> getAllBands();//hacemos un inner join mezclando el contenido de las tablas y retornamos el valor

        $views = new MusicViews();
        $views-> showAllBands($bandas);
    }
}