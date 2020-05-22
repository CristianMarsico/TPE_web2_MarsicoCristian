<?php

require_once 'models/conection.db.model.php';

class BandsModel{

    private $conection;

    public function __construct(){
        $this->conection = new Conection_db_Model();
    }

    public function detele_band($id){
        $db = $this->conection->createConexion();
        $sentencia = $db->prepare ("DELETE FROM bands WHERE id_b = ? ");
        $sentencia-> execute([$id]);
    }
}