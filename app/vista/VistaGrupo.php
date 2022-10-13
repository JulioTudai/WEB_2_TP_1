<?php
    require_once './app/controlador/ControladorSesion.php';
    require_once "./libs/smarty/Smarty.class.php";

    class vistaGrupo{
        private $smarty;
        private $controladorSesion;

        public function __construct(){
            $this->smarty = new Smarty();
<<<<<<< HEAD
=======
            $this->controladorSesion= new ControladorSesion();
            $this->smarty->assign('logueado',$this->controladorSesion->usuarioLogueado());
>>>>>>> 079cd17e3a528355bc87a4065a82fd2ad820e0c1
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