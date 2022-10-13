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
        //private $controladorHome;

        public function __construct(){
            $this->modelo = new ModeloEquipo();
            $this->vista = new VistaEquipo();
            $this->controladorGrupo = new ControladorGrupo();
            $this->controladorSesion = new ControladorSesion();
            $this->modeloGrupo = new ModeloGrupo();
            //$this->controladorHome = new ControladorHome();
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
                    $this->vista->equipoNoEncontrado();
                }
            }
            else{
                $this->vista->idEquipoNoValido();
            }
        }

        public function equiposDeGrupo($idGrupo){

            $equiposGrupo = $this->modelo->obtenerEquiposGrupo($idGrupo);
            if($equiposGrupo){
                $nombreGrupo = $equiposGrupo[0]->grupo;
            }
            $admin = $this->controladorSesion->esAdmin();
            $grupos = $this->modeloGrupo->obtenerGrupo();
            $this->vista->mostrarEquiposGrupo($equiposGrupo,$nombreGrupo,$admin,$grupos);
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
                    echo "datos no validos";
                }
            }else{
                echo"permisos no validos";
            }
            
        }


        public function eliminarEquipoController($idEquipo){
            if(is_numeric($idEquipo)){
                if($this->modelo->eliminarEquipo($idEquipo)){
                    echo"equipo Eliminado";          
                }
                else{
                    echo"no existe ese equipo";
                }
            
            }else{
                    $this->vista->idEquipoNoValido();
            } 
            
        }

        public function modificarEquipo(){
           if($this->verificarDatosEquipo()){
               if($this->controladorGrupo->obtenerGrupo($_POST["grupo"])){
                   $equipo = array(
                   ":id_equipo"=>$_POST["id_equipo"],
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
                   if($this->modelo->modificarEquipo($equipo)){
                       echo "equipo modificado";
                   }else{
                       echo "no existe ese equipo";
                   }
               }else{
                   echo "este grupo no existe";
               }
           }
        }
        private function verificarDatosEquipo(){
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
    