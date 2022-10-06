<?php 

    require_once "./app/modelo/ModeloEquipo.php";
    require_once "./app/vista/VistaEquipo.php";
    
    class ControladorEquipo{
        private $modelo;
        private $vista;

        public function __construct(){
            $this->modelo = new ModeloEquipo();
           // $this->vista = new Vista();
        }

        public function listaEquipos(){
            $equipos = $this->modelo->obtenerEquipos();
            var_dump($equipos);
        }

        public function mostrarEquipo($id){
            if(is_numeric($id)){
                $equipo = $this->modelo->obtenerEquipos($id);
                if($equipo){
                    var_dump($equipo);
                }else{
                    echo "no se encontro el equipo";
                }
            }
            else{
                echo "no es id valido";
            }
        }
    }