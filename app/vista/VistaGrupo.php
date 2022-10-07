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
        public function idGrupoNoValido(){
            echo "no se ingreso un id valido";
        }
        public function formularioNuevoGrupo(){
            echo"dsadsadsa";
            require_once "./templates/formGrupos.php";
        }
        public function formularioModificarGrupo(){
            require_once "./templates/formModificarGrupo.php";
        }
    }