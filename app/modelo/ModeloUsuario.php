<?php

class ModeloUsuario{
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=usuario;charset=utf8', 'root', '');
    }

    public function listaUsuariosDB(){
        $sentencia=$this->db->prepare("SELECT email FROM usuario");
        $sentencia->execute();
        return $usuariosDB = $sentencia->fetch(PDO::FETCH_OBJ);
    }
    public function registrarUsuario($nuevoUsuario){
        $sentencia=$this->db->prepare("INSERT INTO usuario(email,contrasenia) VALUES ('email,contrasenia')");               //necesita los dos puntos?   :email,:contrasenia
        return $sentencia->execute($nuevoUsuario);

    }
    public function obtenerUsuario($email = null){
        if($email){
            return $sentencia=$this->db->prepare("SELECT * FROM usuario WHERE email = ?");
        }else{                                                                                                              //hay que implementar traer TODOS los usuarios?
            return false;
        }
    }

    
}


/*?>                                                                                                                          no se cierra el tag php