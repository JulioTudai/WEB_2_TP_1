<?php

    require_once "./app/modelo/ModeloGrupo.php";
    require_once "./app/vista/VistaGrupo.php";

    class ControladorGrupo{
        private $modelo;
        private $vista;

        public function __construct(){
            $this->modelo = new ModeloGrupo();
            $this->vista = new VistaGrupo();
        }

        public function listaGrupos(){
            $grupos = $this->modelo->obtenerGrupo();
            $this->vista->mostrarGrupos($grupos);
        }
    }