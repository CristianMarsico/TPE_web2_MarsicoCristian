<?php

class UserModel{

    private $userConection;

    public function __construct(){
        $this->userConection= new Conection_db_Model();
    }

    public function getUser($username){
        $db= $this->userConection->createConexion();
        $sentencia = $db->prepare("SELECT * FROM admin WHERE user_name = ?");
        $sentencia->execute([$username]);
        $user = $sentencia->fetch(PDO::FETCH_OBJ);

        return $user;
    }
}