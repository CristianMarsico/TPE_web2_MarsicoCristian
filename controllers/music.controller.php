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
}