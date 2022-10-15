<?php

    require_once "./app/modelo/ModeloGrupo.php";
    require_once "./app/vista/VistaGrupo.php";
    require_once "./app/controlador/controladorSesion.php";

    class ControladorGrupo{
        private $modelo;
        private $vista;
        private $controladorSesion;
        private $modeloEquipo;

        public function __construct(){
            $this->modelo = new ModeloGrupo();
            $this->vista = new VistaGrupo();
            $this->controladorSesion = new ControladorSesion();
            $this->modeloEquipo = new ModeloEquipo();
        }

        public function crearArregloGrupo(){
            $grupo = array(
                ":nombre" => $_POST["nombre"],
                ":finalizado" => $_POST["finalizado"]
            );
            return $grupo;
        }

        public function obtenerGrupo($id=null){
            $grupos = $this->modelo->obtenerGrupo($id);
            return $grupos;
        }

        public function listarGrupos($id=null){
            $grupos = $this->modelo->obtenerGrupo($id);
            $admin = $this->controladorSesion->esAdmin();
            $this->vista->mostrarGrupos($grupos,$admin);
        }

        public function agregarGrupo(){
            if($this->controladorSesion->esAdmin()){  
                if($this->verificarDatosNuevoGrupo()){
                    $this->modelo->agregarGrupo($this->crearArregloGrupo());
                    header("Location: ".BASE_URL."grupos");
                }else{
                    $this->vista->mostrarError("datos no validos");
                }
            }else{
                header("Location: ". BASE_URL. "iniciarSesion");
            }
        }

        public function eliminarGrupoController($idGrupo){
            if($this->controladorSesion->esAdmin()){
                if(is_numeric($idGrupo)){
                    if($this->sePuedeEliminar($idGrupo)){

                        if($this->modelo->eliminarGrupo($idGrupo)){
                            header("Location: ".BASE_URL."grupos");
                        }
                        else{
                            $this->vista->mostrarError("No existe ese equipo");
                        }
                    }else{
                        if(isset($_GET["borrarEquipos"]) and $_GET["borrarEquipos"]){
                            $this->modeloEquipo->eliminarEquiposGrupo($idGrupo);
                            $this->modelo->eliminarGrupo($idGrupo);
                            header("Location: ".BASE_URL."grupos");

                        }else{
                            $this->vista->confirmarBorrado($idGrupo);
                        }
                    }    
                }else{
                    $this->vista->mostrarError("Id no valido");
                }
            }else{
                header("Location: ". BASE_URL. "iniciarSesion");
            }
        }

        public function modificarGrupo($idGrupo){  

            if($this->controladorSesion->esAdmin()){
                if(!empty($_POST)){
                    if($this->verificarDatosNuevoGrupo()){
                        if($this->modelo->obtenerGrupo($idGrupo)){
                            $grupo = array(
                            ":id_grupo"=>$idGrupo,
                            ":nombre"=>$_POST["nombre"],
                            ":finalizado" => $_POST["finalizado"],
                            );
        
                            if($this->modelo->modificarGrupo($grupo)){
                                header("Location: ". BASE_URL. "grupos");
                            }else{
                                $this->vista->mostrarError("Error en la base de datos");
                            }
                        }else{
                            $this->vista->mostrarError("Este grupo no existe");
                        }
                    }else{
                        $this->vista->mostrarError("Formulario incorrecto");
                    }
                }else{
                    $grupoDb = $this->modelo->obtenerGrupo($idGrupo);
                    if($grupoDb){
                        $this->vista->formularioModificarGrupo($grupoDb);
                    }else{
                        $this->vista->mostrarError("Este grupo no existe");
                    }
                }

            }else{
                header("Location: ". BASE_URL. "iniciarSesion");;
            }
        }

        private function verificarDatosNuevoGrupo(){      
            return (
                isset($_POST["nombre"]) and !empty($_POST["nombre"]) and 
                isset($_POST["finalizado"])              
            );
        }

        private function sePuedeEliminar($idGrupo){
            return empty($this->modeloEquipo->obtenerEquiposGrupo($idGrupo));
        }
    }