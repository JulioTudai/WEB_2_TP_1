<?php 
    class ControladorSesion{

        public function iniciarSesion($admin){
            session_start();
            $_SESSION["admin"] = $admin;
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
            session_start();
            session_destroy();
        }
        public function esAdmin(){
            if (session_status() != PHP_SESSION_ACTIVE){
                session_start();
            }
            return isset($_SESSION["admin"]) and $_SESSION["admin"];
        }
    }