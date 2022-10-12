<?php 
    class ControladorSesion{

        public function iniciarSesion($admin){
            session_start();
            $_SESSION["admin"] = $admin;
            $_SESSION["logueado"] = true;
        }

        public function cerrarSesion(){
            session_start();
            session_destroy();
        }

        public function esAdmin(){
            session_start();
            return isset($_SESSION["admin"]) and $_SESSION["admin"];
        }
    }