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
            var_dump($_POST);
            if($this->controladorSesion->esAdmin()){  
                if($this->verificarDatosNuevoGrupo()){
                    $this->modelo->agregarGrupo($this->crearArregloGrupo());
                    header("Location: ".BASE_URL."grupos");
                }else{
                    echo "datos no validos";
                }
            }else{
                header("Location: ".BASE_URL."grupos");
            }
        }

        public function eliminarGrupoController($idGrupo){
            if($this->controladorSesion->esAdmin()){
                if(is_numeric($idGrupo)){
                    if($this->sePuedeEliminar($idGrupo)){

                        if($this->modelo->eliminarGrupo($idGrupo)){
                            echo "equipo Eliminado";
                        }
                        else{
                            echo "no existe ese equipo";
                        }
                    }else{
                        echo "el grupo debe estar vacio";
                    }    
                }else{
                    $this->vista->idGrupoNoValido();
                }
            }else{
                header("Location: ".BASE_URL."grupos");
            }
        }

        public function mostrarGrupoModificar(){
            $this->obtenerGrupo();
            $this->vista->formularioModificarGrupo();
        }

        public function modificarGrupo($idGrupo){  

            if($this->controladorSesion->esAdmin()){
                $error = null;
                if(!empty($_POST)){
                    if($this->verificarDatosNuevoGrupo()){
                        if($this->modelo->obtenerGrupo($idGrupo)){
                            $equipo = array(
                            ":id_grupo"=>$idGrupo,
                            ":nombre"=>$_POST["nombre"],
                            ":finalizado" => $_POST["finalizado"],
                            );
        
                            if($this->modelo->modificarGrupo($equipo)){
                                header("Location: ". BASE_URL. "equipos");
                            }else{
                                $error= "error generico";
                            }
                        }else{
                            $error= "este grupo no existe";
                        }
                    }else{
                        $error="formulario incorrecto";
                    }
                }
                $this->vista->formularioModificarGrupo();
                echo "asdasdasd";

            }else{
                header("Location: ". BASE_URL. "grupos");
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

    