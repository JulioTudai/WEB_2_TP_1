<?php 

    require_once "./app/modelo/ModeloEquipo.php";
    require_once "./app/vista/VistaEquipo.php";
    require_once "./app/controlador/ControladorGrupo.php";
    require_once "./app/controlador/controladorSesion.php";
    require_once "./app/modelo/ModeloGrupo.php";
    require_once "./app/controlador/ControladorHome.php";
    
    class ControladorEquipo{
        private $modelo;
        private $vista;
        private $controladorGrupo;
        private $controladorSesion;
        private $modeloGrupo;

        public function __construct(){
            $this->modelo = new ModeloEquipo();
            $this->vista = new VistaEquipo();
            $this->controladorGrupo = new ControladorGrupo();
            $this->controladorSesion = new ControladorSesion();
            $this->modeloGrupo = new ModeloGrupo();
        }

        public function listaEquipos(){
            $equipos = $this->modelo->obtenerEquipos();
            $admin = $this->controladorSesion->esAdmin();
            $grupos = $this->modeloGrupo->obtenerGrupo();
            $this->vista->listarEquipos($equipos, $admin, $grupos);
        }

        public function equipo($id){
            if(is_numeric($id)){
                $equipo = $this->modelo->obtenerEquipos($id);
                if($equipo){
                    $admin = $this->controladorSesion->esAdmin();
                    $grupos = $this->modeloGrupo->obtenerGrupo();
                    $this->vista->mostrarEquipo($equipo,$admin,$grupos);
                }else{
                    $this->vista->mostrarError("El equipo no existe");
                }
            }
            else{
                $this->vista->mostrarError("Id invalido");
            }
        }

        public function equiposDeGrupo($idGrupo){
            $grupo = $this->modeloGrupo->obtenerGrupo($idGrupo);
            if(!empty($grupo)){
                $equiposGrupo = $this->modelo->obtenerEquiposGrupo($idGrupo);
                $nombreGrupo = $grupo->nombre;
                $admin = $this->controladorSesion->esAdmin();
                $grupos = $this->modeloGrupo->obtenerGrupo();
    
                $this->vista->mostrarEquiposGrupo($equiposGrupo,$nombreGrupo,$admin,$grupos);
            }else{
                $this->vista->mostrarError("el grupo no existe");
            }

        }
        
        public function agregarEquipo(){
            if($this->controladorSesion->esAdmin()){
                if($this->verificarDatosEquipo() and $this->controladorGrupo->obtenerGrupo($_POST["grupo"]) ) {
                    $equipo = array(
                        ":pp" => $_POST["pp"],
                        ":puntos" => $_POST["puntos"],
                        ":pj" => $_POST["pj"],
                        ":pe" => $_POST["pe"],
                        ":pais" => $_POST["pais"],
                        ":gc" => $_POST["gc"],
                        ":pg" => $_POST["pg"],
                        ":dif" => $_POST["dif"],
                        ":gf" => $_POST["gf"],
                        ":fk_id_grupo" => $_POST["grupo"],
                    );
                    $this->modelo->agregarEquipo($equipo);
                    header('Location:'.BASE_URL.'equipos');           
                }else{
                    $this->vista->mostrarError("datos no validos");
                }
            }else{
                header("Location: ". BASE_URL. "iniciarSesion");
            }
            
        }


        public function eliminarEquipoController($idEquipo){
            if($this->controladorSesion->esAdmin()){
                if(is_numeric($idEquipo)){
                    if($this->modelo->eliminarEquipo($idEquipo)){
                        $this->vista->mostrarError("equipo Eliminado");          
                    }
                    else{
                        $this->vista->mostrarError("no existe ese equipo");
                    }
                
                }else{
                        $this->vista->idEquipoNoValido();
                } 
            }else{
                header("Location: ". BASE_URL. "iniciarSesion");
            }
            
        }

        public function modificarEquipo($idEquipo){
            if($this->controladorSesion->esAdmin()){
                if(!empty($_POST)){
                    if($this->verificarDatosEquipo()){
                        if($this->controladorGrupo->obtenerGrupo($_POST["grupo"])){
                            $equipo = array(
                            ":id_equipo"=>$idEquipo,
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
        
                            $this->modelo->modificarEquipo($equipo);
                            header("Location: ". BASE_URL. "equipos");
                            
                        }else{
                            $this->vista->mostrarError("este grupo no existe");
                        }
                    }else{
                        $this->vista->mostrarError("formulario incorrecto");
                    }
                }
                $grupos = $this->modeloGrupo->obtenerGrupo();
                $equipoDB= $this->modelo->obtenerEquipos($idEquipo);
                if($equipoDB){
                    $this->vista->imprimirFormulario($grupos,$equipoDB);
                }
                else{
                    $this->vista->mostrarError("El equipo no existe");
                }

            }else{
                header("Location: ". BASE_URL. "iniciarSesion");
            }
            
        }

        private function verificarDatosEquipo(){
                return (
                    isset($_POST["pp"]) and (!empty($_POST["pp"]) or $_POST["pp"] == "0") and is_numeric($_POST["pp"]) and
                    isset($_POST["puntos"]) and (!empty($_POST["puntos"]) or $_POST["puntos"] == "0") and is_numeric($_POST["puntos"]) and
                    isset($_POST["pj"]) and (!empty($_POST["pj"]) or $_POST["pj"] == "0") and is_numeric($_POST["pj"]) and
                    isset($_POST["pe"]) and (!empty($_POST["pe"]) or $_POST["pe"] == "0") and is_numeric($_POST["pe"]) and
                    isset($_POST["gc"]) and (!empty($_POST["gc"]) or $_POST["gc"] == "0") and is_numeric($_POST["gc"]) and
                    isset($_POST["grupo"]) and (!empty($_POST["grupo"]) or $_POST["grupo"] == "0") and is_numeric($_POST["grupo"]) and
                    isset($_POST["pg"]) and (!empty($_POST["pg"]) or $_POST["pg"] == "0") and is_numeric($_POST["pg"]) and
                    isset($_POST["dif"]) and (!empty($_POST["dif"]) or $_POST["dif"] == "0") and is_numeric($_POST["dif"]) and
                    isset($_POST["gf"]) and (!empty($_POST["gf"]) or $_POST["gf"] == "0") and is_numeric($_POST["gf"]) and
                    isset($_POST["pais"]) and !empty($_POST["pais"])
                );
            }
    }
    