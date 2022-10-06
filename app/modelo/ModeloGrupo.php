<?php
    class ModeloGrupo{
        private $db;

        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=db_catar;charset=utf8', 'root', '');
        }

        public function obtenerGrupo(){
            $sentencia = $this->db->prepare("SELECT * FROM grupos");
            $sentencia->execute();
            return $sentencia->fetchALL(PDO::FETCH_OBJ);
        }
    }