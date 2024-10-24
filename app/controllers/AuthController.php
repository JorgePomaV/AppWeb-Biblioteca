<?php
    class AuthController extends BaseController{
        private $authModel;
        private $tareaModel;
        private $estadoModel;
        public function __construct(){
            $this->authModel=$this->model('AuthModel');
            $this->tareaModel=$this->model('TareaModel');
            $this->estadoModel= $this->model('EstadoModel');
        }
        
        /* Función para llamar a la vista login con blanqueo de errores*/
        public function login(){


            $data = [
                'error_login'=>'',
            ]; 
            $this->view('pages/auth/login',$data);
            
        }


        public function loginUsuario(){
               // Sanitización de datos
               //Aquí se crea un arreglo $data que contiene el correo que el usuario ha enviado a través de un formulario. Se obtiene con $_POST['email'], que es el método que captura los datos enviados por el formulario a través de una solicitud POST.
                $data = [
                    'dni' => htmlspecialchars($_POST['dni'], ENT_QUOTES, 'UTF-8'),
                ];


            $usuario = $this->authModel->buscar_por_dni($data);
            if($usuario){
                if($_POST['password'] == $usuario->pass){
                    //falta agregar tareas,
                    //Es el array global que PHP usa para almacenar datos de la sesión del usuario. Puedes guardar cualquier dato en $_SESSION, como el ID de usuario, nombre, avatar, etc., después de que el usuario haya iniciado sesión.
                    $_SESSION['id']=$usuario->id;
                    $_SESSION['nombre']=$usuario->nombre;
                    $_SESSION['avatar']=$usuario->avatar;
                    $this->tareaModel->expirarTareas();
                    $data = [
                        'tareas' => $this->tareaModel->buscarTareas(0),
                        'estados' => $this->estadoModel->buscar_estados(),
                    ];
                    $this->view('pages/dashboard/dashboard',$data);
                }else{
                    $data = [
                        'error_login' => '<div class="alert alert-danger" role="alert">
                        Usuario o contraseña incorrectos paso.
                      </div>',
                    ];
                    $this->view('pages/auth/login',$data);
                }        
            }else{
                $data = [
                    'error_login' => '<div class="alert alert-danger" role="alert">
                    Usuario o contraseña incorrectos.
                  </div>',
                ];
                $this->view('pages/auth/login',$data);
            }
        }

        /* Función que verifica los datos del usuario y 
        redirige al panel del usuario*/
       /* public function loginUsuario(){
        //Aquí se crea un arreglo $data que contiene el correo que el usuario ha enviado a través de un formulario. Se obtiene con $_POST['email'], que es el método que captura los datos enviados por el formulario a través de una solicitud POST.
            $data = [
                'email' => $_POST['email'],
                
            ];
            $usuario = $this->authModel->buscar_por_mail($data);
            if($usuario){//Se verifica si la variable $usuario contiene información (lo que significa que se encontró un usuario con el correo proporcionado).
                if( $_POST['password']==$usuario->pass){
                    // se crean varias variables de sesión ($_SESSION) que contienen los datos del usuario:
                    //id: el identificador del usuario.
                    //nombre: el nombre del usuario.
                    //avatar: la imagen de perfil del usuario.
                    //Estas variables de sesión permiten que el usuario permanezca autenticado mientras navega por el sitio.
                    $_SESSION['id']=$usuario->id;
                    $_SESSION['nombre']=$usuario->nombre;
                    $_SESSION['avatar']=$usuario->avatar;
                    $this->tareaModel->expirarTareas();
                    $data = [
                        'tareas' => $this->tareaModel->buscarTareas(0),
                        'estados' => $this->estadoModel->buscar_estados(),
                    ];
                    $this->view('pages/dashboard/dashboard',$data);
                    
                }else{
                    $data = [
                        'error_login' => '<div class="alert alert-danger" role="alert">
                        Usuario o contraseña incorrectos.
                      </div>',
                    ];
                    $this->view('pages/auth/login',$data);
                }        
            }else{
                $data = [
                    'error_login' => '<div class="alert alert-danger" role="alert">
                    Usuario o contraseña incorrectos.
                  </div>',
                ];
                $this->view('pages/auth/login',$data);
            }
        }*/

        /* Función para llamar a la vista registro con blanqueo de errores*/
        public function register(){
                $data = [
                    'error_tipo'=>'',
                    'error_megas'=>'',
                    'error_pass'=>'',
                ];
            
            $this->view('pages/auth/register',$data);
        }

        /* Función que toma los datos del formulario, hace las verificaciones y los envía al modelo*/
        public function registrarUsuario(){
        //die('arranca la funcion registrar usuario');//serve para depurar el código, deteniéndose en este punto y mostrando el texto "arranca la función registrar usuario".
            if ($_SERVER['REQUEST_METHOD']=='POST'){//Verifica si el método de la solicitud HTTP es POST. Esto asegura que el formulario se haya enviado.
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $dni = $_POST['dni'];
                $celular = $_POST['celular'];
                $email = $_POST['email'];
                $usuario = $_POST['usuario'];
                $pass = $_POST['password'];
                $pass2 = $_POST['password2'];
                //$_FILES['avatar']: Captura la información del archivo subido (en este caso, el avatar del usuario), como el nombre del archivo, el tipo de imagen y el tamaño.
                $avatar = $_FILES['avatar']['name'];
                $image_type = $_FILES['avatar']['type'];
                $image_size = $_FILES['avatar']['size'];
                //$ubi: Guarda la ruta completa donde se almacenarán las imágenes de avatar, combinando la ruta raíz del servidor y la constante RUTA_AVATAR.
                $ubi = $_SERVER['DOCUMENT_ROOT'] . RUTA_AVATAR;

                //Verifica si se ha cargado un archivo de avatar.
                if ($avatar != ''){
                    if($image_size <= 10000000){//Verifica si el tamaño del archivo de imagen es menor o igual a 10MB (10,000,000 bytes).
                        if ($image_type == 'image/jpg' || $image_type == 'image/jpeg' || $image_type == 'image/png'){//Comprueba el tipo de imagen.
                        // Mueve el archivo subido a la ubicación especificada.
                            move_uploaded_file($_FILES['avatar']['tmp_name'], $ubi . $avatar);
                        }else{
                           // Crea un mensaje de error para el usuario indicando que solo se permiten imágenes de tipo jpg, jpeg o png, y se carga la vista de registro con esos datos.
                            $data = [
                                'error_tipo' => '<div class="alert alert-danger" role="alert">
                                El tipo de imagen debe ser jpg, jpeg o png.
                              </div>',
                              'error_pass' =>'',
                              'error_megas'=>'',
                            ];
                            $this->view('pages/auth/register',$data);
                        }
                    }else{
                        //Si el archivo excede el tamaño permitido (10MB), se genera un mensaje de error indicando que el archivo es demasiado grande.
                        $data = [
                            'error_megas' => '<div class="alert alert-danger" role="alert">
                            El tamaño de la imagen es demasiado grande
                          </div>',
                        ];
                        $this->view('pages/auth/register',$data);
                    }

                }else{
                    //Si no se ha cargado ningún avatar, se asigna una imagen por defecto (img_default.png).
                    $avatar ='img_default.png';
                  
                }

                //Verifica si las dos contraseñas ingresadas coinciden.
                if ($pass == $pass2){
                    //Si las contraseñas coinciden, crea un arreglo $data con los datos del usuario. Luego, llama al modelo authModel para buscar si ya existe un usuario con el mismo email.
                    $data= [
                        'nombre' => $nombre,
                        'apellido' =>$apellido,
                        'avatar' => $avatar,
                        'email' => $email,
                        'dni' => $dni,
                        'usuario'=> $usuario,
                        'celular' => $celular,
                        'pass' => $pass,
                        'pass2' => $pass2
                    ];
                    //llama al modelo authModel para buscar si ya existe un usuario con el mismo email.
                    $auth = $this->authModel->buscar_por_mail($data);
                    $auth2 = $this->authModel->buscar_por_dni($data);
                    
                    //empty():Esta función devuelve true si la variable es considerada vacía y false en caso contrario.
                    if (empty($auth)){
                        if(empty($auth2)){
                            if($this->authModel->crear_usuario($data)){//crear_usuario: retorna un bool
                                $data = [
                                    'error_login'=>'',
                                ];
                                //redirige al usuario a la vista de inicio de sesión. Si falla, detiene la ejecución y muestra un error.
                                $this->view('pages/auth/login',$data);
                            }else{
                                //La función die() en PHP se utiliza para detener la ejecución del script inmediatamente. Cuando se llama a die(), el programa termina en ese punto, y opcionalmente puedes enviar un mensaje de salida.
                                die("NO SE PUDO CREAR EL USUARIO");
                            }
                        }else{
                            die("Ya existe una cuenta creada con ese dni");
                        }
                        
                    }else{
                        die("Ya existe una cuenta creada con ese email");
                    }
                    
                }else{
                    $data = [
                        'error_pass' => '<div class="alert alert-danger" role="alert">
                                             Las contraseñas no coinciden
                                        </div>',
                        'error_tipo' =>'',
                        'error_megas'=>'',
                    ];
                    //Si las contraseñas no coinciden, se genera un mensaje de error y se muestra la vista de registro nuevamente.
                    $this->view('pages/auth/register',$data);
                }
        
            }
        }
    
        public function resetPassword(){
            
            $data = [
                'mail' => '',
                'error_mail' => '',
            ];      
            $this->view('pages/auth/forgot-password',$data);
        }

        public function enviar_password(){
            $email = $_POST['email'];
            $data = [
                'email' => $email,
            ];
            
            
            if (!empty($this->authModel->buscar_por_mail($data))) {
                $where = "new_pass";
                include(RUTA_APP . "/mails/mail_pass.php");
                
            
                
            } else {
                $data = [
                    "error_mail"=> "<div class='alert alert-danger' role='alert'>
                                <p class = 'text-center'>No es un email válido.</p>
                            </div>",
                    "mail"=>'',
                ];
                $this->view('pages/auth/forgot-password', $data);
            }
        }

        public function update_pass(){
            $data = [
                'mail' => '',
                'error_mail'=>'',
                'error_pass'=>'',
            ];
            $this->view('pages/auth/updated-password',$data);
        }

        public function actualizar_password(){
            $email = $_POST['email'];
            $passActual =$_POST['pass_actual'];
            $passNueva = $_POST['pass_nueva'];
            $passNueva2 = $_POST['pass_nueva2'];
            if ($passNueva != $passNueva2){
                $data = [
                    'mail' => '',
                    'error_mail'=>'',
                    'error_pass'=> "<div class='alert alert-danger' role='alert'>
                    <p class = 'text-center'>Las contraseñas no coinciden.</p>
                </div>",
                ];
                $this->view('pages/auth/updated-password',$data);
            }else{
                if($this->authModel->change_pass($passNueva, $email)){
                    $data = [
                        'mail' => '',
                        'error_mail'=>'',
                        'error_pass'=> "<div class='alert alert-success' role='alert'>
                        <p class = 'text-center'>La contraseña fue actualizada</p>
                    </div>",
                    ];
                    $this->view('pages/auth/updated-password',$data);
                }
            }

        }

        /* Método para cerrar la sesión */

        public function logout()
        {
            session_unset();
            session_destroy();
            
            $this->view('pages/index');
        }
    }
   
?>