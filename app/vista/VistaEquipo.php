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


        private function crearArregloParaMostrar($equipo){
            return array(
                "pais" => $equipo->pais,
                "puntos" => $equipo->puntos,
                "pg" => $equipo->pg,
                "pj" => $equipo->pj,
                "pe" => $equipo->pe,
                "pp" => $equipo->pp,
                "gf" => $equipo->gf,
                "gc" => $equipo->gc,
                "dif" => $equipo->dif,
            );
        }

        public function mostrarEquipo($equipo, $admin, $grupos){                                                                      
            $this->smarty->assign("titulo",$equipo->pais);
            $this->smarty->assign("admin",$admin);
            $this->smarty->assign("equipo",$equipo);
            $this->smarty->assign("grupos",$grupos);
            $this->smarty->display("./templates/mostrarEquipo.tpl");
        }

        public function equipoNoEncontrado(){
            echo "el equipo con esa id no existe";
        }

        public function idEquipoNoValido(){
            echo "no se ingreso un id valido";
        }

        public function listarEquipos($equipos,$admin,$grupos){
            $this->smarty->assign("equipos",$equipos);
            $this->smarty->assign("admin",$admin);
            $this->smarty->assign("grupos",$grupos);
            $this->smarty->display("./templates/equipos.tpl");
        }
        public function mostrarEquiposGrupo($equipos,$grupo,$admin,$grupos){
            $this->smarty->assign("equipos",$equipos);
            $this->smarty->assign("grupo",$grupo);
            $this->smarty->assign("admin",$admin);                                               // TODO preguntar hago asi para reutilizar el mostrar equipos?
            $this->smarty->assign("grupos",$grupos);
            $this->smarty->display("./templates/equiposGrupo.tpl");
        }
        public function imprimirFormulario($error = null, $grupos,$equipo){

            $this->smarty->assign("valuePais",$equipo->pais);
            $this->smarty->assign("valuePuntos",$equipo->puntos);
            $this->smarty->assign("valuePj",$equipo->pj);
            $this->smarty->assign("valuePg",$equipo->pg);
            $this->smarty->assign("valuePe",$equipo->pe);
            $this->smarty->assign("valuePp",$equipo->pp);
            $this->smarty->assign("valueGf",$equipo->gf);
            $this->smarty->assign("valueGc",$equipo->gc);
            $this->smarty->assign("valueDif",$equipo->dif);

            $this->smarty->assign("grupos",$grupos);
            if($error){                                                                         // TODO con smarty
                echo $error;
            }
            $this->smarty->display("./templates/modificarEquipo.tpl");
        }

        public function mostrarError($error){
            $this->smarty->assign("error",$error);
            $this->smarty->display("./templates/error.tpl");
        }
    }