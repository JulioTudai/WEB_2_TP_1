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

        public function confirmarBorrado($idGrupo){
            $this->smarty->assign("idGrupo",$idGrupo);
            $this->smarty->display("./templates/confirmarBorrarGrupo.tpl");
        }

        public function formularioModificarGrupo($grupo){
            $this->smarty->assign("valueNombre",$grupo->nombre);
            $this->smarty->assign("valueFinalizado",$grupo->finalizado);
            $this->smarty->display("./templates/modificarGrupo.tpl");
        }

        public function mostrarError($error){
            $this->smarty->assign("error",$error);
            $this->smarty->display("./templates/error.tpl");
        }
    }
    //crear smartys lindos para  grupos