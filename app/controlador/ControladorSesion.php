<?php 
    class ControladorSesion{

        public function iniciarSesion($usuario){
            if (session_status() != PHP_SESSION_ACTIVE){
                session_start();
            }
            $_SESSION["admin"] = $usuario->administrador;
            $_SESSION["logueado"] = true;
        }
        public function usuarioLogueado(){
            if (session_status() != PHP_SESSION_ACTIVE){
                session_start();
            }                 
            if(isset($_SESSION["logueado"]) and $_SESSION["logueado"]){              
                return true;   
            }else{              
                return false;
            }
        }
        public function cerrarSesion(){
            session_destroy();
        }
        public function esAdmin(){
            if (session_status() != PHP_SESSION_ACTIVE){
                session_start();
            }
            return isset($_SESSION["admin"]) and $_SESSION["admin"];
        }
    }