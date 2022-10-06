<?php

    require_once "./libs/smarty/Smarty.class.php";

    class vistaGrupo{
        private $smarty;

        public function __construct(){
            $this->smarty = new Smarty();
            $this->smarty->assign("baseURL", BASE_URL); //o algo asi
        }

        public function mostrarGrupos($grupos){
            var_dump($grupos);
        }
    }