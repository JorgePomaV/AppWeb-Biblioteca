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
    public function index() {
        try {
            $libros = $this->libroModel->obtenerTodos();
            $data = [
                'libros' => $libros,
                'vista' => 'index',
                'action' => 'index'
            ];
            $this->view('pages/libro/layout', $data);
        } catch (Exception $e) {
            error_log("Error en index: " . $e->getMessage());
            $data = [
                'error' => "Hubo un error al obtener los libros.",
                'vista' => 'index',
                'action' => 'index'
            ];
            $this->view('pages/libro/layout', $data);
        }
    }

    // Crear libro
    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->validarDatos($_POST);
            $data['vista'] = 'crear';
            $data['action'] = 'crear';
            if ($data['error']) {
                $this->view('pages/libro/layout', $data);
            } else {
                if ($this->libroModel->crear($data)) {
                    $this->redireccionar('/libro');
                } else {
                    $data['error'] = "Hubo un error al crear el libro. Inténtalo de nuevo.";
                    $this->view('pages/libro/layout', $data);
                }
            }
        } else {
            $data = [
                'vista' => 'crear',
                'action' => 'crear'
            ];
            $this->view('pages/libro/layout', $data);
        }
    }

    // Actualizar libro
    public function actualizar($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->validarDatos($_POST);
            $data['libro'] = $this->libroModel->obtenerPorId($id);
            $data['vista'] = 'editar';
            $data['action'] = 'editar';
            if ($data['error']) {
                $this->view('pages/libro/layout', $data);
            } else {
                if ($this->libroModel->actualizar($id, $data)) {
                    $this->redireccionar('/libro');
                } else {
                    $data['error'] = "Hubo un error al actualizar el libro.";
                    $this->view('pages/libro/layout', $data);
                }
            }
        } else {
            $data = [
                'libro' => $this->libroModel->obtenerPorId($id),
                'vista' => 'editar',
                'action' => 'editar'
            ];
            $this->view('pages/libro/layout', $data);
        }
    }

    // Detalles del libro
    public function detalles($id) {
        $data = [
            'libro' => $this->libroModel->obtenerPorId($id),
            'vista' => 'detalles',
            'action' => 'detalle'
        ];
        $this->view('pages/libro/layout', $data);
    }

    // Eliminar libro
    public function eliminar($id) {
        if ($this->libroModel->eliminar($id)) {
            $this->redireccionar('/libro');
        } else {
            $data = [
                'error' => "Hubo un error al eliminar el libro.",
                'libros' => $this->libroModel->obtenerTodos(),
                'vista' => 'index',
                'action' => 'index'
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
            'error' => ''
        ];
        if (empty($result['Titulo']) || empty($result['Editorial']) || empty($result['AñoEdicion'])) {
            $result['error'] = "Por favor, completa todos los campos requeridos.";
        }
        return $result;
    }
}