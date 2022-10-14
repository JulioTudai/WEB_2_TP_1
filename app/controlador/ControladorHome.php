<?php
require_once "./app/vista/VistaHome.php";

class ControladorHome{
    private $vista;

    public function __construct(){

        $this->vista= new vistaHome();
        
    }

    public function llamarHome(){
        $this->vista->mostrarHome();
    }
    public function redireccionarHome(){
        header("Location: ".BASE_URL."home");
    }
}