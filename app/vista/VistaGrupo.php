<?php
    require_once './app/controlador/ControladorSesion.php';
    require_once "./libs/smarty/Smarty.class.php";

    class vistaGrupo{
        private $smarty;
        private $controladorSesion;

        public function __construct(){
            $this->smarty = new Smarty();
            $this->controladorSesion= new ControladorSesion();
            $this->smarty->assign('logueado',$this->controladorSesion->usuarioLogueado());
            $this->smarty->assign("BASE_URL", BASE_URL); //o algo asi
        }
        public function mostrarGrupos($grupos){
            $this->smarty->assign("grupos",$grupos);
            $this->smarty->display("./templates/grupos.tpl");
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
    //crear smartys lindos para  grupos