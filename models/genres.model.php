<?php
require_once 'models/conection.db.model.php';

class GenresModel
{

    private $conection;

    public function __construct()
    {
        $this->conection = new Conection_db_Model();
    }

    //ÉSTA FUNCION OBTIENE SOLAMENTE GENEROS MUSICALES
    public function getGenres()
    {

        $db = $this->conection->createConexion();
        $sentencia = $db->prepare("SELECT * FROM genres");
        $sentencia->execute();
        $generos = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $generos;
    }

    //OBTENGO LOS CD'S POR GENEROS
    public function getCdsByGenres($id)
    {
        //var_dump($id); die;
        $db = $this->conection->createConexion();
        $sentencia = $db->prepare("SELECT Ge.genres, Ba.id_b, Ba.name, Ba.album, Ba.songs, Ba.year, Ba.image
                                    FROM bands Ba
                                    INNER JOIN genres Ge
                                    ON Ba.id_g_fk = Ge.id_g 
                                    WHERE Ge.id_g = ?");
        $sentencia->execute([$id]);
        $generos = $sentencia->fetchAll(PDO::FETCH_OBJ);


        return $generos;
    }

    //TRAIGO DE LA BASE DE DATOS PARA "LISTA COMPLETA-->DETALLES"
    function getDetails($id_detalles)
    {

        $db = $this->conection->createConexion();
        $sentencia = $db->prepare("SELECT Ge.genres, Ba.id_b, Ba.name, Ba.album, Ba.songs, Ba.year, Ba.image
                                    FROM bands Ba
                                    INNER JOIN genres Ge
                                    ON Ba.id_g_fk = Ge.id_g
                                    WHERE Ba.id_b = ?");
        $sentencia->execute([$id_detalles]);
        $detalles = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $detalles;
    }
    public function insert($genero)
    {
        $db = $this->conection->createConexion();
        $sentencia = $db->prepare("INSERT INTO genres (genres) VALUES (?)");
        return $sentencia->execute([$genero]);
    }

    public function delete($id)
    {
        $db = $this->conection->createConexion();
        $sentencia = $db->prepare("DELETE FROM genres WHERE id_g = ?");
        $sentencia->execute([$id]);
    }

    public function get($id)
    {
        $db = $this->conection->createConexion();
        $sentencia = $db->prepare("SELECT * FROM genres WHERE id_g = ?");
        $sentencia->execute([$id]);
        $obtenerId = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $obtenerId;
    }

    public function update($id, $nombre)
    {
        $db = $this->conection->createConexion();
        $sentencia = $db->prepare("UPDATE `genres` SET `genres` = ? WHERE `id_g` = ?");
        $sentencia->execute([$nombre, $id]);
    }
}
