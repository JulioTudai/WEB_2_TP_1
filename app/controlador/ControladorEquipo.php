<?php 

    require_once "./app/modelo/ModeloEquipo.php";
    require_once "./app/vista/VistaEquipo.php";
    
    class ControladorEquipo{
        private $modelo;
        private $vista;

        public function __construct(){
            $this->modelo = new ModeloEquipo();
            $this->vista = new VistaEquipo();
        }

        public function listaEquipos(){
            $equipos = $this->modelo->obtenerEquipos();
            $this->vista->listarEquipos($equipos);
        }

        public function equipo($id){
            if(is_numeric($id)){

                $equipo = $this->modelo->obtenerEquipos($id);
                if($equipo){
                    $this->vista->mostrarEquipo($equipo);
                }else{
                    $this->vista->equipoNoEncontrado();
                }
            }
            else{
                $this->vista->idEquipoNoValido();
            }
        }

        public function equiposDeGrupo($grupo){

            //$equiposGrupo = $this->modelo->obtenerEquiposGrupo($_GET["grupo"]);

            $equiposGrupo = $this->modelo->obtenerEquiposGrupo($grupo);
            $this->vista->mostrarEquiposGrupo($equiposGrupo);
        }

        public function agregarEquipo(){
            if(verificarDatosNuevoEquipo()){
                $equipo = array(
                    ":pp" => $_POST["pp"],
                    ":puntos" => $_POST["puntos"],
                    ":pj" => $_POST["pj"],
                    ":pe" => $_POST["pe"],
                    ":pais" => $_POST["pais"],
                    ":gc" => $_POST["gc"],
                    ":fk_id_grupo" => $_POST["grupo"],
                    ":pg" => $_POST["pg"],
                    ":dif" => $_POST["dif"],
                    ":gf" => $_POST["gf"],
                );
                $this->modelo->agregarEquipo($equipo);
            }
        }

        public function pedirEquipo(){
            $this->vista->formularioNuevoEquipo();
        }

        private function verificarDatosNuevoEquipo(){
            return (
                isset($_POST["pp"]) and !empty($_POST["pp"]) and is_numeric($_POST["pp"]) and
                isset($_POST["puntos"]) and !empty($_POST["puntos"]) and is_numeric($_POST["puntos"]) and
                isset($_POST["pj"]) and !empty($_POST["pj"]) and is_numeric($_POST["pj"]) and
                isset($_POST["pe"]) and !empty($_POST["pe"]) and is_numeric($_POST["pe"]) and
                isset($_POST["gc"]) and !empty($_POST["gc"]) and is_numeric($_POST["gc"]) and
                isset($_POST["grupo"]) and !empty($_POST["grupo"]) and is_numeric($_POST["grupo"]) and
                isset($_POST["pg"]) and !empty($_POST["pg"]) and is_numeric($_POST["pg"]) and
                isset($_POST["dif"]) and !empty($_POST["dif"]) and is_numeric($_POST["dif"]) and
                isset($_POST["gf"]) and !empty($_POST["gf"]) and is_numeric($_POST["gf"]) and
                isset($_POST["pais"]) and !empty($_POST["pais"])
            );
        }
    }