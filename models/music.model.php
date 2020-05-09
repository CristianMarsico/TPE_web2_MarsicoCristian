<?php

class MusicModel{

    private function createConexion(){

         //$db = new PDO ('mysql:host=localhost;'.'dbname=db_music;charset=utf8', 'root', '');
        //                                    'db_music' nombre que le doy a la carpeta raiz de MySQL
        $host = 'localhost';
        $userName = "root";
        $password = '';
        $dataBase = 'db_music';
        try {
            $db = new PDO("mysql:host=$host;dbname=$dataBase;charset=utf8", $userName, $password);
        } catch (Exception  $e){
            var_dump($e);
        }
        return $db;

    }
    
    //ÉSTA FUNCION OBTIENE TODOS LOS GENEROS MUSICALES
    public function getGenres(){
       
        $db= $this->createConexion();
        $sentencia = $db->prepare("SELECT * FROM db_genres");
        $sentencia->execute();
        $generos = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $generos;
    }


}
