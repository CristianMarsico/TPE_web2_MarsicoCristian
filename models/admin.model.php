<?php
require_once 'models/conection.db.model.php';

class AdminModel{
    
    private $conection;

    public function __construct(){
        $this->conection = new Conection_db_Model;
    }

    public function getAllAdmin(){
        $db = $this->conection->createConexion();
        $sentencia = $db->prepare("SELECT * FROM admin");
        $sentencia->execute();
        $administradores = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $administradores;
    }

    public function getAll(){
        $db = $this->conection->createConexion();
        $sentencia = $db->prepare("SELECT * FROM bands");
        $sentencia->execute();
        $bandas = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $bandas;
    }

    public function get ($album){
        $db = $this->conection->createConexion();
        $sentencia = $db->prepare ("SELECT * FROM bands WHERE album = ?");
        $sentencia->execute([$album]);
        $nombreCD = $sentencia->fetch(PDO::FETCH_OBJ);

        return $nombreCD;
        
    }

    public function insert ($nombre, $album, $canciones, $año, $generos){
        $db = $this->conection->createConexion();
        $sentencia = $db->prepare ('INSERT INTO bands (name, album, songs, year, id_g_fk) VALUES (?,?,?,?,?)');
       return $sentencia->execute([$nombre, $album, $canciones, $año, $generos]);
      //  $sentencia->fetchAll(PDO::FETCH_OBJ);

        
       
    }
    
        
    



}