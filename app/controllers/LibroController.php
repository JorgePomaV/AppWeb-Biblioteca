<?php
class LibroController extends BaseController {
    private $libroModel;

    public function __construct() {
        // Carga el modelo de libro
        $this->libroModel = $this->model('LibroModel');
        
        // Verifica que el usuario esté autenticado
        if (!isset($_SESSION['id'])) {
            header('Location: ' . RUTA_URL . '/auth/login');
            exit;
        }
    }

    /* Muestra la vista index de libros */
    public function index() {
        $data = [
            'libros' => $this->libroModel->obtenerLibros(),
        ];
        $this->view('pages/libro/index', $data);
    }

    /* Muestra el formulario para crear un nuevo libro */
    public function crear() {
        $data = [
            'titulo' => '',
            'editorial' => '',
            'añoEdicion' => '',
            'cantidad' => '',
            'categoria_id' => '',
            'usuario_id' => $_SESSION['id'],
            'error' => ''
        ];
        $this->view('pages/libro/crear', $data);
    }

    /* Procesa el formulario de creación de un nuevo libro */
    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanear y asignar datos del formulario
            $data = [
                'titulo' => htmlspecialchars(trim($_POST['titulo'])),
                'editorial' => htmlspecialchars(trim($_POST['editorial'])),
                'añoEdicion' => htmlspecialchars(trim($_POST['añoEdicion'])),
                'cantidad' => htmlspecialchars(trim($_POST['cantidad'])),
                'categoria_id' => htmlspecialchars(trim($_POST['categoria_id'])),
                'usuario_id' => $_SESSION['id'],
                'error' => ''
            ];

            // Verifica campos obligatorios
            if (empty($data['titulo']) || empty($data['editorial']) || empty($data['añoEdicion']) || empty($data['cantidad'])) {
                $data['error'] = '<div class="alert alert-danger">Por favor, complete todos los campos requeridos.</div>';
                $this->view('pages/libro/crear', $data);
                return;
            }

            // Intenta guardar el libro
            if ($this->libroModel->agregarLibro($data)) {
                header('Location: ' . RUTA_URL . '/libro/index');
                exit;
            } else {
                die('Error al guardar el libro');
            }
        } else {
            $this->crear();
        }
    }

    /* Muestra los detalles de un libro */
    public function detalles($id) {
        $libro = $this->libroModel->obtenerLibroPorId($id);
        if ($libro) {
            $data = [
                'libro' => $libro,
            ];
            $this->view('pages/libro/detalles', $data);
        } else {
            die('Libro no encontrado');
        }
    }

    /* Muestra el formulario de edición de un libro */
    public function editar($id) {
        $libro = $this->libroModel->obtenerLibroPorId($id);
        if ($libro) {
            $data = [
                'id_libro' => $libro->id_libro,
                'titulo' => $libro->Titulo,
                'editorial' => $libro->Editorial,
                'añoEdicion' => $libro->AñoEdicion,
                'cantidad' => $libro->Cantidad,
                'categoria_id' => $libro->categoria_id,
                'usuario_id' => $libro->usuario_id,
                'error' => ''
            ];
            $this->view('pages/libro/editar', $data);
        } else {
            die('Libro no encontrado');
        }
    }

    /* Procesa la actualización de un libro */
    public function actualizar($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanear y asignar datos del formulario
            $data = [
                'id_libro' => $id,
                'titulo' => htmlspecialchars(trim($_POST['titulo'])),
                'editorial' => htmlspecialchars(trim($_POST['editorial'])),
                'añoEdicion' => htmlspecialchars(trim($_POST['añoEdicion'])),
                'cantidad' => htmlspecialchars(trim($_POST['cantidad'])),
                'categoria_id' => htmlspecialchars(trim($_POST['categoria_id'])),
                'usuario_id' => $_SESSION['id'],
                'error' => ''
            ];

            // Verifica campos obligatorios
            if (empty($data['titulo']) || empty($data['editorial']) || empty($data['añoEdicion']) || empty($data['cantidad'])) {
                $data['error'] = '<div class="alert alert-danger">Por favor, complete todos los campos requeridos.</div>';
                $this->view('pages/libro/editar', $data);
                return;
            }

            // Intenta actualizar el libro
            if ($this->libroModel->actualizarLibro($data)) {
                header('Location: ' . RUTA_URL . '/libro/index');
                exit;
            } else {
                die('Error al actualizar el libro');
            }
        } else {
            $this->editar($id);
        }
    }

    /* Elimina un libro */
    public function eliminar($id) {
        if ($this->libroModel->eliminarLibro($id)) {
            header('Location: ' . RUTA_URL . '/libro/index');
            exit;
        } else {
            die('Error al eliminar el libro');
        }
    }
}
?>