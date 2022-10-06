<?php

    require_once "./libs/smarty/Smarty.class.php";

    class vistaEquipo{
        private $smarty;

        public function __construct(){
            $this->smarty = new Smarty();
            $this->smarty->assign("baseURL", BASE_URL); //o algo asi
        }

        public function mostrarEquipo($equipo){
            var_dump($equipo);
        }

        public function equipoNoEncontrado(){
            echo "el equipo con esa id no existe";
        }

        public function idEquipoNoValido(){
            echo "no se ingreso un id valido";
        }

        public function listarEquipos($equipos){
            var_dump($equipos);
        }

        public function mostrarEquiposGrupo($equipos){
            var_dump($equipos);
        }
    }