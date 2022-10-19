<?php
    require_once './app/controlador/ControladorSesion.php';
    require_once "./libs/smarty/Smarty.class.php";

    class VistaUsuario{

        private $smarty;
        private $controladorSesion;

        public function __construct(){
            $this->smarty = new Smarty();
            $this->controladorSesion= new ControladorSesion();
            $this->smarty->assign('logueado',$this->controladorSesion->usuarioLogueado());
            $this->smarty->assign("BASE_URL", BASE_URL); //o algo asi
        }

        public function mostrarLogin($boton){
            $this->smarty->assign("titulo","Iniciar Sesion");
            $this->smarty->assign("boton", $boton);
            $this->smarty->display("./templates/usuario.tpl");
        }

        public function mostrarRegistro($boton){
            $this->smarty->assign("titulo","Registro");
            $this->smarty->assign("boton", $boton);
            $this->smarty->display("./templates/usuario.tpl");
        }

        public function mostrarError($error){
            $this->smarty->assign("titulo", "ERROR");
            $this->smarty->assign("error",$error);
            $this->smarty->display("./templates/error.tpl");
        }
    }