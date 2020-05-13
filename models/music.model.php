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
    
    //ÉSTA FUNCION OBTIENE SOLAMENTE GENEROS MUSICALES
    public function getGenres(){
       
        $db= $this->createConexion();
        $sentencia = $db->prepare("SELECT * FROM genres");
        $sentencia->execute();
        $generos = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $generos;
    }

    public function getBandsForGenres($id){
        //var_dump($id); die;
        $db= $this-> createConexion();
        $sentencia = $db->prepare("SELECT Ge.genres, Ba.id_b, Ba.name, Ba.album, Ba.songs, Ba.year
                                    FROM bands Ba
                                    INNER JOIN genres Ge
                                    ON Ba.id_g_fk = Ge.id_g 
                                    WHERE Ba.id_b = ?");
        $sentencia->execute([$id]);
        $generos = $sentencia-> fetchAll(PDO::FETCH_OBJ);
        
        return $generos;
    }

    //TRAIGO DE LA BASE DE DATOS PARA "LISTA COMPLETA-->DETALLES"
    function getDetails($id_detalles){
        
        $db = $this-> createConexion();
        $sentencia = $db->prepare("SELECT Ge.genres, Ba.id_b, Ba.name, Ba.album, Ba.songs, Ba.year
                                    FROM bands Ba
                                    INNER JOIN genres Ge
                                    ON Ba.id_g_fk = Ge.id_g
                                    WHERE Ba.id_b = ?");
        $sentencia->execute([$id_detalles]);
        $detalles = $sentencia-> fetchAll(PDO::FETCH_OBJ);

        return $detalles;
    }

    public function getAllBands(){

        $db= $this->createConexion();
        $sentencia = $db->prepare ("SELECT Ba.id_b, Ba.name, Ba.album, Ba.songs, Ba.year, Ge.genres 
                                   FROM bands Ba
                                   INNER JOIN genres Ge
                                   ON Ba.id_g_fk = Ge.id_g ");
          //SELECT --> DE CADA TABLA AGARRO LO QUIERO TRAER Y LE ASIGNO UN PREFIJO
          //FROM --> DE LA TABLA "BANDS" QUE LE ASIGNE PREFIJO "BA"(QUE TIENE EL FORANIO)
          //INNER JOIN --> UNIDO A LA TABLA "GENRES" QUE LE DI PREFIJO "GE"
          //ON --> DONDE LA TABLA BANDS(USO PREFIJO)CON EL NOMBRE DEL FORANIO (ID_G_FK) SEA IGUAL A LA TABLA GENRES(USO PREFIJO) CON EL NOMBRE DEL ID(ID_G)                        
        $sentencia->execute();
        $bandas = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $bandas;
    }
    

}
