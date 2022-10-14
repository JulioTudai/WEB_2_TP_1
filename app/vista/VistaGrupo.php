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
        public function mostrarGrupos($grupos,$admin){
            $this->smarty->assign("grupos",$grupos);
            $this->smarty->assign("admin",$admin);
            $this->smarty->display("./templates/grupos.tpl");
                     
        }
        public function idGrupoNoValido(){
            echo "no se ingreso un id valido";
        }

        public function formularioModificarGrupo(){
            $this->smarty->display("./templates/modificarGrupo.tpl");
        }
    }
    //crear smartys lindos para  grupos