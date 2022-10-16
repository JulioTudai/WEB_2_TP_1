<?php 
    require_once "./app/modelo/ModeloUsuario.php";
    require_once "./app/vista/VistaUsuario.php";
    require_once "./app/controlador/ControladorSesion.php";
   

    class ControladorUsuario{
        private $modelo;
        private $vista;
        private $controladorSesion;
       

        public function __construct(){
            $this->modelo = new ModeloUsuario();
            $this->vista = new VistaUsuario();
            $this->controladorSesion = new ControladorSesion();
            
        }

        public function iniciarSesion(){
            if(!$this->controladorSesion->usuarioLogueado()){
                if(!empty($_POST)){
                    if($this->verificarFormUsuario()){
                        $usuario = $this->modelo->obtenerUsuario($_POST["email"]);
    
                        if($usuario and password_verify($_POST["contrasenia"],($usuario->contrasenia))){
                            
                            $this->controladorSesion->iniciarSesion($usuario);
                            header("Location: home");
                            
                        }else{
                            $this->vista->mostrarError("mail o contraseña no validos");
                        }
                    }else{
                        $this->vista->mostrarError( "formulario no valido");
                    }
                }
                $this->vista->mostrarLogin("Iniciar Sesion");
            }else{
                header("Location:home");
            }
        }

       public function cerrarSesion(){
            $this->controladorSesion->cerrarSesion();
            header("Location: home");
        }

        public function registrarse(){
            if(!$this->controladorSesion->usuarioLogueado()){
                if(!empty($_POST)){
                    if($this->verificarFormUsuario()){
                        //if($usuariosExistentes=$this->modelo->listaUsuariosDB() and $this->verificarUsuarioExistente($usuariosExistentes)){
                        if(!$this->modelo->obtenerUsuario($_POST['email'])){

                            $nuevoUsuario=[
                                ":email"=>$_POST['email'],
                                ":contrasenia"=>password_hash($_POST['contrasenia'],PASSWORD_BCRYPT),
                                ":administrador"=>false                   //nuevos usuarios no son admin
                            ];
                            $usuarioCreado = $this->modelo->registrarUsuario($nuevoUsuario);
                            $this->controladorSesion->iniciarSesion($usuarioCreado);
                            header("Location: home");
                            
                        }else{
                            $this->vista->mostrarError("el usuario ya existe");
                        }

                    }else{
                        $this->vista->mostrarError( "Error al crear usuario"); 
                    }
                }
                $this->vista->mostrarRegistro("Registrarse");
            }else{
                header('Location: home');
            }  
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