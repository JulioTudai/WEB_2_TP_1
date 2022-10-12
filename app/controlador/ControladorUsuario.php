<?php 
    require_once "./app/modelo/ModeloUsuario.php";
    require_once "./app/vista/VistaUsuario.php";
    require_once "./app/controlador/ControladorSesion.php";

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

                var_dump($usuario);
                var_dump($_POST["contrasenia"]);
                var_dump(password_verify($_POST["contrasenia"],($usuario->contrasenia)));

                if($usuario and password_verify($_POST["contrasenia"],($usuario->contrasenia))){
                    
                    $this->controladorSesion->iniciarSesion($usuario->administrador);
                    
                }else{
                    echo "no existe";
                }
            }else{
                echo "formulario no valido";
            }
            $this->vista->mostrarLogin("Iniciar Sesion");
        }

       public function cerrarSesion(){
            $this->controladorSesion->cerrarSesion();
            header("Location: home");
        }

        public function registrarse(){
            if($this->verificarFormUsuario()){
                //if($usuariosExistentes=$this->modelo->listaUsuariosDB() and $this->verificarUsuarioExistente($usuariosExistentes)){
                if(!$this->modelo->obtenerUsuario($_POST['email'])){
                    $nuevoUsuario=[
                        ":email"=>$_POST['email'],
                        ":contrasenia"=>password_hash($_POST['contrasenia'],PASSWORD_BCRYPT),
                        ":administrador"=>false                   //nuevos usuarios no son admin
                    ];
                    $usuarioCreado=$this->modelo->registrarUsuario($nuevoUsuario);  //esto esta bien exepto el nombre de la variable $loguearUsuarioCreado
                    $this->controladorSesion->iniciarSesion($usuarioCreado);
                }
            }else{
                echo "Error al crear usuario";
            }
            $this->vista->mostrarLogin("Registrarse");
          /*  vista registro                                                                                                                    
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