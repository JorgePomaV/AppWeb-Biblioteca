<?php
class LibroController extends BaseController {
    private $libroModel;
    private $categoriaModel;

    public function __construct() {
        // Carga el modelo de libro y categoría
        $this->libroModel = $this->model('LibroModel');
        $this->categoriaModel = $this->model('CategoriaModel');

        // Verifica que el usuario esté autenticado
        if (!isset($_SESSION['id'])) {
            header('Location: ' . RUTA_URL . '/auth/login');
            exit;
        }
    }

    // Método para mostrar la lista de libros con sus categorías
    public function index() {
        try {
            $libros = $this->libroModel->obtenerTodos();
            $categorias = $this->categoriaModel->obtenerCategorias();
            $data = [
                'titulo' => 'Lista de Libros',
                'viewContent' => 'indexLibro',
                'libros' => $libros,
                'categorias' => $categorias
            ];
            $this->view('pages/libro/layout', $data);
        } catch (Exception $e) {
            error_log("Error en index: " . $e->getMessage());
            $data = [
                'error' => "Hubo un error al obtener los libros.",
                'viewContent' => 'indexLibro'
            ];
            $this->view('pages/libro/layout', $data);
        }
    }

    // Método para crear un nuevo libro
    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           // $data = $this->validarDatos($_POST);
           $data = [
            'Titulo' => $_POST['titulo'],
            'Editorial' => $_POST['editorial'],
            'AnoEdicion' => $_POST['anioEdicion'],
            'Cantidad' => $_POST['cantidad'],
            'categoria_id' => $_POST['categoria_id'],
            ];
            $data['viewContent'] = 'crearLibro';

            /*if ($data['error']) {
                $this->view('pages/libro/layout', $data);
                //$this->view('pages/dashboard/dashboard',$data);
            } else {*/
                if ($this->libroModel->crear($data)) {
                    /*$this->redireccionar('/libro/indexLibro');*/
                    die("lo logramos!!");
                    $this->view('pages/dashboard/dashboard',$data);
                } else {
                    $data['error'] = "Hubo un problema al agregar el libro";
                    //$this->view('pages/libro/layout', $data);
                    $this->view('pages/dashboard/dashboard',$data);
                }
            //}
        } else {
            $categorias = $this->categoriaModel->obtenerCategorias();
            $data = [
                'titulo' => 'Agregar Libro',
                'viewContent' => 'crearLibro',
                'categorias' => $categorias
            ];
            $this->view('pages/libro/layout', $data);
        }
    }

    // Método para editar un libro existente
    public function editar($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->validarDatos($_POST);
            $data['id_libro'] = $id;
            $data['viewContent'] = 'editarLibro';

            if ($data['error']) {
                $this->view('pages/libro/layout', $data);
            } else {
                if ($this->libroModel->actualizarLibro($data)) {
                    $this->redireccionar('/libro/indexLibro');
                } else {
                    $data['error'] = "Hubo un problema al actualizar el libro.";
                    $this->view('pages/libro/layout', $data);
                }
            }
        } else {
            $libro = $this->libroModel->obtenerLibroPorId($id);
            $categorias = $this->categoriaModel->obtenerCategorias();
            if (!$libro) {
                $this->redireccionar('/libro/indexLibro');
            }

            $data = [
                'titulo' => 'Editar Libro',
                'viewContent' => 'editarLibro',
                'libro' => $libro,
                'categorias' => $categorias
            ];
            $this->view('pages/libro/layout', $data);
        }
    }

    // Método para eliminar un libro
    public function eliminar($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->libroModel->eliminarLibro($id)) {
                $this->redireccionar('/libro/indexLibro');
            } else {
                $data = [
                    'error' => "Hubo un problema al eliminar el libro.",
                    'viewContent' => 'indexLibro'
                ];
                $this->view('pages/libro/layout', $data);
            }
        } else {
            $this->redireccionar('/libro/indexLibro');
        }
    }

    // Método para validar los datos de entrada
   private function validarDatos($datos) {
        $result = [
            'titulo' => trim($datos['titulo']),
            'editorial' => trim($datos['editorial']),
            'anioEdicion' => trim($datos['anioEdicion']),
            'cantidad' => trim($datos['cantidad']),
            'categoria_id' => trim($datos['categoria_id']),
            'error' => ''
        ];

        if (empty($result['titulo']) || empty($result['editorial']) || empty($result['anioEdicion'])) {
            $result['error'] = "Por favor, completa todos los campos requeridos.";
        }

        return $result;
    }

    // Método de redirección
    private function redireccionar($url) {
        header("Location: " . RUTA_URL . $url);
        exit;
    }
}