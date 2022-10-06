<?php

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

require_once "./app/controlador/ControladorEquipo.php";


if(!empty($_GET["action"])){
    $action = $_GET["action"];
}else{
    $action = "home";
}

$params = explode("/" , $action);

$controladorEquipo = new ControladorEquipo();


switch($params[0]){
    case "equipos":{
        {
            if(isset($params[1]) and !empty($params[1])){
                $controladorEquipo->mostrarEquipo($params[1]);
            }else{
                $controladorEquipo->listaEquipos();
            }
        }
        break;
    }
    case "home":{
        echo "este es el home asd";
        break;    
    }
    default:{
        echo "No se encontro la pagina";
    } 
}