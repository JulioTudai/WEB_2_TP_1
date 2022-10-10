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
                if($usuariosExistentes=$this->modelo->listaUsuariosDB() and $this->verificarUsuarioExistente($usuariosExistentes)){
                    $nuevoUsuario=[
                        "email"=>$_POST['email'],
                        "contrasenia"=>password_hash($_POST['contrasenia'],PASSWORD_BCRYPT)
                    ];
                    $logearUsuarioCreado=$this->modelo->registrarUsuario($nuevoUsuario);
                    $this->controladorSesion->iniciarSesion($logearUsuarioCreado);
                }
            }else{
                echo "verifique el formilario";
            }
          /*  vista registro
            verificar form
            encriptar contraseña
            modelo agregar usuario
            login ese usuario*/
        }
        public function verificarUsuarioExistente($usuariosExistentes){
            foreach ($usuariosExistentes as $usuario) {
                if($usuario == $_POST['email']){
                    return false;
                }
            }
        }

        public function verificarFormUsuario(){
            return  isset($_POST["email"]) and !empty($_POST["email"]) and filter_var($_POST["email"],FILTER_VALIDATE_EMAIL) and
                    isset($_POST["contrasenia"]) and !empty($_POST["contrasenia"]);
        }
    }