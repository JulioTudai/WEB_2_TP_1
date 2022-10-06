<?php

    require_once "./libs/smarty/Smarty.class.php";

    class vistaEquipo{
        private $smarty;

        public function __construct(){
            $this->smarty = new Smarty();
            $smarty->assign("baseURL",BASE_URL); //o algo asi
        }
    }