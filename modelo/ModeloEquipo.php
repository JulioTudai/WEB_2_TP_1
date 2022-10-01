<?php
    class ModeloEquipo{
        private $db;

        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=db_catar;charset=utf8', 'root', '');
        }
   
        public function obtenerEquipos(){
            $sentencia = $this->db->prepare("SELECT * FROM equipos");
            $sentencia->execute();
            $equipos = $sentencia->fetchALL(PDO::FETCH_OBJ);
            return $equipos;
        }

    }