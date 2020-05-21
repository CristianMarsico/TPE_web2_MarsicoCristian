<?php

require_once "models/conection.db.model.php";

class ListModel{

    private $conection;
    
    public function __construct(){
        $this->conection = new Conection_db_Model();
    }

    public function getAllBands(){

        $db= $this->conection->createConexion();
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