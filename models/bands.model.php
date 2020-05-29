<?php

require_once 'models/conection.db.model.php';

class BandsModel
{

    private $conection;

    public function __construct()
    {
        $this->conection = new Conection_db_Model();
    }

    public function detele_band($id)
    {
        $db = $this->conection->createConexion();
        $sentencia = $db->prepare("DELETE FROM bands WHERE id_b = ? ");
        $sentencia->execute([$id]);
    }

    public function get($id)
    {
        $db = $this->conection->createConexion();
        $sentencia = $db->prepare("SELECT * FROM bands WHERE id_b = ?");
        $sentencia->execute([$id]);
        $obtenerId = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $obtenerId;
    }

    public function update($nombre, $album, $cancion, $anio, $id)
    {
        //  var_dump($id, $nombre, $album, $cancion, $anio );
        $db = $this->conection->createConexion();
        $sentencia = $db->prepare("UPDATE  `bands` SET  `name` = ?, 
                                 `album` = ?,  `songs` = ?, `year` = ? WHERE `id_b` = ?");
        $sentencia->execute([$nombre, $album, $cancion, $anio, $id]);
    }
}
