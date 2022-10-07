<?php

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

require_once "./app/controlador/ControladorEquipo.php";
require_once "./app/controlador/ControladorGrupo.php";


if(!empty($_GET["action"])){
    $action = $_GET["action"];
}else{
    $action = "home";
}

$params = explode("/" , $action);

$controladorEquipo = new ControladorEquipo();
$controladorGrupo = new ControladorGrupo();

switch($params[0]){
    case "equipos":{

        if(isset($params[1]) and !empty($params[1])){
            if ($params[1] == "agregar"){
                $controladorEquipo->pedirEquipo();
                if(!empty($_POST)){
                    $controladorEquipo->agregarEquipo();
                }
            }else{
                $controladorEquipo->equipo($params[1]);
            }

        }else{
            if(isset($_GET["grupo"])){
                $controladorEquipo->equiposDeGrupo($_GET["grupo"]);
            }else{
                $controladorEquipo->listaEquipos();
            }
        }
        break;
    }

    case "grupos":{

        $controladorGrupo->listaGrupos();

        break;
    }
    case "home":{
        echo "este es el home asd";
        break;    
    }
    default:{
        $controladorEquipo->agregarEquipo();
        echo "No se encontro la pagina";
    } 
}