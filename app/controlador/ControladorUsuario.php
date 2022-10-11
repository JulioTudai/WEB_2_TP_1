<?php 
    require_once "./ModeloUsuario.php";

    class ControladorUsuario{
        private $modelo;
        private $vista;

        public function __construct(){
            $this->modelo = new ModeloUsuario();
            $this->vista = new VistaUsuario();
            $this->controladorSesion = new ControladorSesion();
        }

        public function iniciarSesion(){
            if($this->verificarFormUsuario()){
                $usuario = $this->modelo->obtenerUsuario($_POST["email"]);
                if($usuario and password_verify($_POST["contrasenia"],($usuario->contrasenia))){
                    
                    $this->controladorSesion->iniciarSesion($usuario->admin);
                    header(location:"home");
                }
            }
            $this->vistaUsuario->mostrarLogin();
        }

       /* public function cerrarSesion(){
            $this->controladorSesion->cerrarSesion();
            $this->vistaUsuario->mostrarLogin();
        }*/

        public function registrarse(){
            if($this->verificarFormUsuario()){
                //if($usuariosExistentes=$this->modelo->listaUsuariosDB() and $this->verificarUsuarioExistente($usuariosExistentes)){
                if($this->modelo->obtenerUsuario($_POST['email']))
                    $nuevoUsuario=[
                        "email"=>$_POST['email'],
                        "contrasenia"=>password_hash($_POST['contrasenia'],PASSWORD_BCRYPT),
                        "admin"=>false;                     //nuevos usuarios no son admin
                    ];
                    $usuarioCreado=$this->modelo->registrarUsuario($nuevoUsuario);  //esto esta bien exepto el nombre de la variable $loguearUsuarioCreado
                    $this->controladorSesion->iniciarSesion($usuarioCreado);
                }
            }else{
                echo "verifique el formilario";
            }
            $this->vistaUsuario->mostrarLogin();
          /*  vista registro                                                                                                                    //faltoesto
            verificar form
            encriptar contraseña
            modelo agregar usuario
            login ese usuario*/
        }
        
        /*public function verificarUsuarioExistente($usuariosExistentes){                       no es necesario
            foreach ($usuariosExistentes as $usuario) {
                if($usuario == $_POST['email']){
                    return false;
                }
            }
        }*/

        public function verificarFormUsuario(){
            return  isset($_POST["email"]) and !empty($_POST["email"]) and filter_var($_POST["email"],FILTER_VALIDATE_EMAIL) and
                    isset($_POST["contrasenia"]) and !empty($_POST["contrasenia"]);
        }
    }