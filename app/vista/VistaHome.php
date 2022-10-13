<?php
    require_once './app/controlador/ControladorSesion.php';
    require_once "./libs/smarty/Smarty.class.php";

class VistaHome{
    private $smarty;
    private $controladorSesion;

    public function __construct(){
        $this->smarty= new smarty();
        $this->controladorSesion= new ControladorSesion();
        $this->smarty->assign('logueado',$this->controladorSesion->usuarioLogueado());
        $this->smarty->assign("BASE_URL", BASE_URL);
    }
    public function mostrarHome(){

        $this->smarty->display("./templates/home.tpl");
    }

    
}