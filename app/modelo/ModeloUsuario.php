<?php

class ModeloUsuario{
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_catar;charset=utf8', 'root', '');
    }

    public function listaUsuariosDB(){
        $sentencia=$this->db->prepare("SELECT email FROM usuarios");
        $sentencia->execute();
        return $usuariosDB = $sentencia->fetch(PDO::FETCH_OBJ);
    }
    public function registrarUsuario($nuevoUsuario){
        $sentencia=$this->db->prepare("INSERT INTO usuarios(email,contrasenia,administrador) VALUES (:email,:contrasenia,:administrador)");               //necesita los dos puntos?   :email,:contrasenia
        return $sentencia->execute($nuevoUsuario);

    }
    public function obtenerUsuario($email = null){
        if($email){
            $sentencia= $this->db->prepare("SELECT * FROM usuarios WHERE email = ?");
            $sentencia->execute([$email]);
            return $sentencia->fetch(PDO::FETCH_OBJ);
        }else{                                                                                                              
            return false;
        }
    }
}