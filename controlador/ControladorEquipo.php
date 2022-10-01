<?php 

    require_once "./modelo/ModeloEquipo.php";
    class ControladorEquipo{
        private $modelo;
        private $vista;

        public function __construct(){
            $this->modelo = new ModeloEquipo();
           // $this->vista = new Vista();
        }

        public function listaEquipos(){
            $equipos = $this->modelo->obtenerEquipos();
            var_dump($equipos);
        }
    }