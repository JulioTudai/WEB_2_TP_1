<?php

    require_once "./app/modelo/ModeloGrupo.php";
    require_once "./app/vista/VistaGrupo.php";

    class ControladorGrupo{
        private $modelo;
        private $vista;

        public function __construct(){
            $this->modelo = new ModeloGrupo();
            $this->vista = new VistaGrupo();
        }
        public function crearArregloGrupo(){
            $grupo = array(
                ":nombre" => $_POST["nombre"],
                ":finalizado" => $_POST["finalizado"]     
            );
            return $grupo;
        }

        public function listaGrupos(){
            $grupos = $this->modelo->obtenerGrupo();
            $this->vista->mostrarGrupos($grupos);
        }
        public function agregarGrupo(){
            var_dump($_POST);
            if($this->verificarDatosNuevoGrupo()){
                
                $this->modelo->agregarGrupo($this->crearArregloGrupo());
            }
        }
        public function pedirGrupo(){
            $this->vista->formularioNuevoGrupo();
        }

        public function eliminarGrupoController($idGrupo){
            if(is_numeric($idGrupo)){ //falta comprobar si el id pertenece a algu numero de los Grupo creo
                if($this->modelo->eliminarGrupo($idGrupo)){
                    echo"equipo Eliminado";          
                }
                else{
                    echo"no existe ese equipo";
                }
            }else{
                    $this->vista->idGrupoNoValido();
            }    
        }
        public function mostrarGrupoModificar(){
            $this->listaGrupos();
            $this->vista->formularioModificarGrupo();
        }
        public function modificarGrupo(){  
            $grupo = array(
                ":id_grupo"=>$_POST["id_grupo"],
                ":nombre" => $_POST["nombre"],
                ":finalizado" => $_POST["finalizado"]     
            );           
            $this->modelo->modificarGrupo($grupo);
           var_dump($_POST);
        }
        private function verificarDatosNuevoGrupo(){      
            return (
                isset($_POST["nombre"]) and !empty($_POST["nombre"]) and 
                isset($_POST["finalizado"])              
            );
        }
    }

    