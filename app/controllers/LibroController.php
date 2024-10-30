<?php
class LibroController extends BaseController {
    private $libroModel;

    public function __construct() {
        $this->libroModel = $this->model('LibroModel');
    }

    // Listar todos los libros
    public function index() {
        try {
            $libros = $this->libroModel->obtenerTodos();
            $data = [
                'libros' => $libros,
                'vista' => 'index',
                'action' => 'index' // Agregar esta línea
            ];
            $this->view('pages/libro/layout', $data);
        } catch (Exception $e) {
            error_log("Error en index: " . $e->getMessage());
            $data = [
                'error' => "Hubo un error al obtener los libros.",
                'vista' => 'index',
                'action' => 'index' // Agregar esta línea
            ];
            $this->view('pages/libro/layout', $data);
        }
    }

    // Mostrar formulario de creación de libros
    public function crear() {
        // Verificar si el usuario está autenticado
        if (!isset($_SESSION['usuario_id'])) {
            // Redirigir al landing si no está autenticado
            header('Location: ' . RUTA_URL . '/landing');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->validarDatos($_POST);
            $data['vista'] = 'crear';
            $data['action'] = 'crear'; // Agregar esta línea
            if ($data['error']) {
                $this->view('pages/libro/layout', $data);
            } else {
                if ($this->libroModel->crear($data)) {
                    $this->redireccionar('/libros');
                } else {
                    $data['error'] = "Hubo un error al crear el libro. Inténtalo de nuevo.";
                    $this->view('pages/libro/layout', $data);
                }
            }
        } else {
            $data = [
                'vista' => 'crear',
                'action' => 'crear' // Agregar esta línea
            ];
            $this->view('pages/libro/layout', $data);
        }
    }

    // Actualizar un libro
    public function actualizar($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->validarDatos($_POST);
            $data['vista'] = 'editar';
            $data['libro'] = $this->libroModel->obtenerPorId($id);
            $data['action'] = 'editar'; // Agregar esta línea
            if ($data['error']) {
                $this->view('pages/libro/layout', $data);
            } else {
                if ($this->libroModel->actualizar($id, $data)) {
                    $this->redireccionar('/libros');
                } else {
                    $data['error'] = "Hubo un error al actualizar el libro.";
                    $this->view('pages/libro/layout', $data);
                }
            }
        } else {
            $data = [
                'libro' => $this->libroModel->obtenerPorId($id),
                'vista' => 'editar',
                'action' => 'editar' // Agregar esta línea
            ];
            $this->view('pages/libro/layout', $data);
        }
    }

    // Ver detalles de un libro
    public function detalles($id) {
        $data = [
            'libro' => $this->libroModel->obtenerPorId($id),
            'vista' => 'detalles',
            'action' => 'detalle' // Agregar esta línea
        ];
        $this->view('pages/libro/layout', $data);
    }

    // Eliminar un libro
    public function eliminar($id) {
        if ($this->libroModel->eliminar($id)) {
            $this->redireccionar('/libros');
        } else {
            $data = [
                'error' => "Hubo un error al eliminar el libro.",
                'libros' => $this->libroModel->obtenerTodos(),
                'vista' => 'eliminar',
                'action' => 'eliminar' // Agregar esta línea
            ];
            $this->view('pages/libro/layout', $data);
        }
    }

    // Redirección
    private function redireccionar($url) {
        header("Location: " . RUTA_URL . $url);
        exit;
    }

    // Validación de datos
    private function validarDatos($datos) {
        $result = [
            'Titulo' => trim($datos['Titulo']),
            'Editorial' => trim($datos['Editorial']),
            'AñoEdicion' => trim($datos['AñoEdicion']),
            'Cantidad' => trim($datos['Cantidad']),
            'categoria_id' => trim($datos['categoria_id']),
            'usuario_id' => trim($datos['usuario_id']),
            'error' => ''
        ];
        if (empty($result['Titulo']) || empty($result['Editorial']) || empty($result['AñoEdicion'])) {
            $result['error'] = "Por favor, completa todos los campos requeridos.";
        }
        return $result;
    }
}