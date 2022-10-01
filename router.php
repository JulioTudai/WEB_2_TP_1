<?php

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

require_once("./controlador/ControladorEquipo.php");


if(!empty($_GET["action"])){
    $action = $_GET["action"];
}else{
    $action = "home";
}

$params = explode("/" , $action);

$controlador = new ControladorEquipo();


switch($params[0]){
    case "equipos":{
        {
            $controlador->listaEquipos();
        }
        break;
    }
    case "home":{
        echo "este es el home";
        break;    
    }
    default:{
        echo "No se encontro la pagina";
    } 
}