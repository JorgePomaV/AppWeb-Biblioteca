<?php
class AuthController extends BaseController {
    private $authModel;
    private $libroModel;

    public function __construct() {
        $this->authModel = $this->model('AuthModel');
        $this->libroModel = $this->model('LibroModel');
    }

    /* Función para llamar a la vista login con blanqueo de errores */
    public function login() {
        $data = [
            'error_login' => '',
        ]; 
        $this->view('pages/auth/login', $data);
    }

    public function loginUsuario() {
        $data = [
            'dni' => htmlspecialchars($_POST['dni'], ENT_QUOTES, 'UTF-8'),
        ];

        $usuario = $this->authModel->buscar_por_dni($data);
        if ($usuario) {
            if ($_POST['password'] == $usuario->pass) {
                $_SESSION['id'] = $usuario->usuario_id;
                $_SESSION['nombre'] = $usuario->Nombre;
                $_SESSION['avatar'] = $usuario->Avatar;

                $this->view('pages/dashboard/dashboard', $data);
            } else {
                $data = [
                    'error_login' => '<div class="alert alert-danger" role="alert">
                        Usuario o contraseña incorrectos.
                    </div>',
                ];
                $this->view('pages/auth/login', $data);
            }
        } else {
            $data = [
                'error_login' => '<div class="alert alert-danger" role="alert">
                    Usuario o contraseña incorrectos.
                </div>',
            ];
            $this->view('pages/auth/login', $data);
        }
    }

    /* Función para llamar a la vista registro con blanqueo de errores */
    public function register() {
        $data = [
            'error_tipo' => '',
            'error_megas' => '',
            'error_pass' => '',
        ];
        $this->view('pages/auth/register', $data);
    }

    /* Función que toma los datos del formulario, hace las verificaciones y los envía al modelo */
    public function registrarUsuario() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $dni = $_POST['dni'];
            $celular = $_POST['celular'];
            $email = $_POST['email'];
            $usuario = $_POST['usuario'];
            $pass = $_POST['password'];
            $pass2 = $_POST['password2'];
            $avatar = $_FILES['avatar']['name'];
            $image_type = $_FILES['avatar']['type'];
            $image_size = $_FILES['avatar']['size'];
            $ubi = $_SERVER['DOCUMENT_ROOT'] . RUTA_AVATAR;

            if ($avatar != '') {
                if ($image_size <= 10000000) {
                    if ($image_type == 'image/jpg' || $image_type == 'image/jpeg' || $image_type == 'image/png') {
                        move_uploaded_file($_FILES['avatar']['tmp_name'], $ubi . $avatar);
                    } else {
                        $data = [
                            'error_tipo' => '<div class="alert alert-danger" role="alert">
                                El tipo de imagen debe ser jpg, jpeg o png.
                            </div>',
                            'error_pass' =>'',
                            'error_megas'=>'',
                        ];
                        $this->view('pages/auth/register', $data);
                    }
                } else {
                    $data = [
                        'error_megas' => '<div class="alert alert-danger" role="alert">
                            El tamaño de la imagen es demasiado grande.
                        </div>',
                    ];
                    $this->view('pages/auth/register', $data);
                }
            } else {
                $avatar = 'img_default.png';
            }

            if ($pass == $pass2) {
                $data = [
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'avatar' => $avatar,
                    'email' => $email,
                    'dni' => $dni,
                    'usuario' => $usuario,
                    'celular' => $celular,
                    'pass' => $pass,
                    'pass2' => $pass2
                ];
                $auth = $this->authModel->buscar_por_mail($data);
                $auth2 = $this->authModel->buscar_por_dni($data);

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
            } else {
                $data = [
                    'error_pass' => '<div class="alert alert-danger" role="alert">
                        Las contraseñas no coinciden.
                    </div>',
                    'error_tipo' =>'',
                    'error_megas'=>'',
                ];
                $this->view('pages/auth/register', $data);
            }
        }
    }

    public function resetPassword() {
        $data = [
            'mail' => '',
            'error_mail' => '',
        ];      
        $this->view('pages/auth/forgot-password', $data);
    }

    public function enviar_password() {
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

    public function update_pass() {
        $data = [
            'mail' => '',
            'error_mail' => '',
            'error_pass' => '',
        ];
        $this->view('pages/auth/updated-password', $data);
    }

    public function actualizar_password() {
        $email = $_POST['email'];
        $passActual = $_POST['pass_actual'];
        $passNueva = $_POST['pass_nueva'];
        $passNueva2 = $_POST['pass_nueva2'];
        
        if ($passNueva != $passNueva2) {
            $data = [
                'mail' => '',
                    'error_mail'=>'',
                    'error_pass'=> "<div class='alert alert-danger' role='alert'>
                    <p class = 'text-center'>Las contraseñas no coinciden.</p>
                </div>",
            ];
            $this->view('pages/auth/updated-password', $data);
        } else {
            if ($this->authModel->change_pass($passNueva, $email)) {
                $data = [
                    'mail' => '',
                    'error_mail'=>'',
                    'error_pass'=> "<div class='alert alert-success' role='alert'>
                    <p class = 'text-center'>La contraseña fue actualizada</p>
                    </div>",
                ];
                $this->view('pages/auth/updated-password', $data);
            }
        }
    }

    /* Método para cerrar la sesión */
    public function logout() {
        session_unset();
        session_destroy();
        $this->view('pages/index');
    }
}
?>