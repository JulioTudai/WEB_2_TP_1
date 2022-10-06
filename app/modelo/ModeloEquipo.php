<?php
    class ModeloEquipo{
        private $db;

        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=db_catar;charset=utf8', 'root', '');
        }
   
        public function obtenerEquipos($id = null){
            if (isset($id)){
                $sentencia = $this->db->prepare("SELECT * FROM equipos WHERE id_equipo = ?");
                $sentencia->execute([$id]);
                return $sentencia->fetch(PDO::FETCH_OBJ);
            }
            $sentencia = $this->db->prepare("SELECT * FROM equipos");
            $sentencia->execute();
            return $sentencia->fetchALL(PDO::FETCH_OBJ);
        }

    }