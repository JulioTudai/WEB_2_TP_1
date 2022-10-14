<?php

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

require_once "./app/controlador/ControladorEquipo.php";
require_once "./app/controlador/ControladorGrupo.php";
require_once "./app/controlador/ControladorUsuario.php";
require_once "./app/controlador/ControladorHome.php";

if(!empty($_GET["action"])){
    $action = $_GET["action"];
}else{
    $action = "home";
}

$params = explode("/" , $action);

$controladorEquipo = new ControladorEquipo();
$controladorGrupo = new ControladorGrupo();
$controladorUsuario = new ControladorUsuario();
$controladorHome = new ControladorHome();
var_dump($_SESSION);
var_dump($params);
switch($params[0]){
    case "equipos":{ 
           
        if(isset($params[1]) and !empty($params[1])){         
            switch($params[1]){
                case"agregar":{
                   
                    if(!empty($_POST)){
                        $controladorEquipo->agregarEquipo();
                    }
                    break;
                }  
                case "modificar":{
                    if(isset($params[2]) and !empty($params[2])){
                        $controladorEquipo->modificarEquipo($params[2]);
                    }else{
                        $controladorHome->redireccionarHome();
                    }
                    break;
                }
                case "eliminar":{
                    if(isset($params[2]) and !empty($params[2])){
                        $controladorEquipo->eliminarEquipoController($params[2]); 
                    }else{
                        $controladorHome->redireccionarHome();
                    }
                    break;
                }
                default:{
                    $controladorEquipo->equipo($params[1]);
                }
            }

            /*if ($params[1] == "agregar"){
                $controladorEquipo->pedirEquipo();
                if(!empty($_POST)){
                    $controladorEquipo->agregarEquipo();
                }
            }else if($params[1]=="eliminar"){
                $controladorEquipo->eliminarEquipoController($params[2]); 
            }
            else if($params[1]=="modificar"){
                $controladorEquipo->mostrarEquipoModificar($params[1]);
                if(!empty($_POST)){
                    $controladorEquipo->modificarEquipo();
                }  
            }else{
                $controladorEquipo->equipo($params[1]);
            }*/
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
        if(isset($params[1]) and !empty($params[1])){         
            switch($params[1]){
                case"agregar":{
                    if(!empty($_POST)){
                        echo"asdasdas";
                        $controladorGrupo->agregarGrupo();
                    }
                    break;
                }  
                case "modificar":{
                    if(isset($params[2]) and !empty($params[2])){
                        $controladorGrupo->modificarGrupo($params[2]);
                    }else{
                        $controladorHome->redireccionarHome();
                    }
                    break;
                }
                case "eliminar":{
                    $controladorGrupo->eliminarGrupoController(isset($params[2]) ? $params[2] : null); 
                    break;
                }
                default:{
                    echo"llego al default";
                }
            }
        }
        else{ 
             $controladorGrupo->listarGrupos();
        }
        break;
    }
    case "iniciarSesion":{
        $controladorUsuario->iniciarSesion();
        break;
    }
    case "cerrarSesion":{
        $controladorUsuario->cerrarSesion();
        break;
    }
    case "registrarse":{
        $controladorUsuario->registrarse();
        break;
    }
    case "home":{
        $controladorHome->llamarHome();
        break;    
    }
    default:{
        echo "No se encontro la pagina";
    } 
}