<?php
    require_once './app/controlador/ControladorSesion.php';
    require_once "./libs/smarty/Smarty.class.php";

    class vistaEquipo{
        private $smarty;
        private $controladorSesion;

        public function __construct(){
            $this->smarty = new Smarty();
            $this->controladorSesion= new ControladorSesion();
            $this->smarty->assign('logueado',$this->controladorSesion->usuarioLogueado());
            $this->smarty->assign("BASE_URL", BASE_URL); //o algo asi
        }

        public function mostrarEquipo($equipo, $admin, $grupos){                                                                      
            $this->smarty->assign("titulo",$equipo->pais);
            $this->smarty->assign("admin",$admin);
            $this->smarty->assign("equipo",$equipo);
            $this->smarty->assign("grupos",$grupos);
            $this->smarty->display("./templates/mostrarEquipo.tpl");
        }

        public function listarEquipos($equipos,$admin,$grupos){
            $this->smarty->assign("titulo","equipos");
            $this->smarty->assign("equipos",$equipos);
            $this->smarty->assign("admin",$admin);
            $this->smarty->assign("grupos",$grupos);
            $this->smarty->display("./templates/equipos.tpl");
        }
        public function mostrarEquiposGrupo($equipos,$grupo,$admin,$grupos){
            $this->smarty->assign("titulo","Equipos de grupo ".$grupo);
            $this->smarty->assign("equipos",$equipos);
            $this->smarty->assign("grupo",$grupo);
            $this->smarty->assign("admin",$admin);                
            $this->smarty->assign("grupos",$grupos);
            $this->smarty->display("./templates/equiposGrupo.tpl");
        }
        public function imprimirFormulario($grupos,$equipo){

            $this->smarty->assign("titulo","Modificar equipo");
            $this->smarty->assign("valuePais",$equipo->pais);
            $this->smarty->assign("valuePuntos",$equipo->puntos);
            $this->smarty->assign("valuePj",$equipo->pj);
            $this->smarty->assign("valuePg",$equipo->pg);
            $this->smarty->assign("valuePe",$equipo->pe);
            $this->smarty->assign("valuePp",$equipo->pp);
            $this->smarty->assign("valueGf",$equipo->gf);
            $this->smarty->assign("valueGc",$equipo->gc);
            $this->smarty->assign("valueDif",$equipo->dif);
            $this->smarty->assign("valueGrupo",$equipo->grupo);
            $this->smarty->assign("grupos",$grupos);
            $this->smarty->display("./templates/modificarEquipo.tpl");
        }

        public function mostrarError($error){
            $this->smarty->assign("titulo", "Error");
            $this->smarty->assign("error",$error);
            $this->smarty->display("./templates/error.tpl");
        }
    }