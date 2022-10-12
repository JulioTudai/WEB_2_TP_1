<?php

    require_once "./libs/smarty/Smarty.class.php";

    class VistaUsuario{

        private $smarty;

        public function __construct(){
            $this->smarty = new Smarty();
            $this->smarty->assign("BASE_URL", BASE_URL); //o algo asi
        }

        public function mostrarLogin($boton){
            $this->smarty->assign("boton", $boton);
            $this->smarty->display("./templates/usuario.tpl");
        }
    }