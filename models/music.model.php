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
        $sentencia = $db->prepare("SELECT * FROM genres");
        $sentencia->execute();
        $generos = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $generos;
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
