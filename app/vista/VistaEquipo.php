<?php
    
    require_once "./libs/smarty/Smarty.class.php";

    class vistaEquipo{
        private $smarty;

        public function __construct(){
            $this->smarty = new Smarty();
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

        public function mostrarEquipo($equipo){                                                                         //tiene que mostrar el grupo?
            $this->smarty->assign("titulo",$equipo->pais);
            //$this->smarty->assign("equipo",$this->crearArregloParaMostrar($equipo));
            $this->smarty->assign("admin",true);
            $this->smarty->assign("equipo",$equipo);
            $this->smarty->display("./templates/mostrarEquipo.tpl");
        }

        public function equipoNoEncontrado(){
            echo "el equipo con esa id no existe";
        }

        public function idEquipoNoValido(){
            echo "no se ingreso un id valido";
        }

        public function listarEquipos($equipos){
            $arregloEquipos = [];

            /*foreach ($equipos as $equipo) {
                array_push($arregloEquipos,$this->crearArregloParaMostrar($equipo));
            }
            $this->smarty->assign("equipos",$arregloEquipos);*/

            $this->smarty->assign("equipos",$equipos);
            $this->smarty->assign("admin",true);
            $this->smarty->display("./templates/mostrarEquipos.tpl");
        }
        public function mostrarEquiposGrupo($equipos){
            var_dump($equipos);
            
        }

        public function formularioNuevoEquipo(){
            require_once "./templates/formEquipo.php";
        }
    }