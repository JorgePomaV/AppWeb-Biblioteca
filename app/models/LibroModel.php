<?php
class libroModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Obtener todos los libros ordenados por título
    public function obtenerTodos() {
        try {
            $this->db->query('SELECT * FROM libro ORDER BY Titulo ASC');
            return $this->db->registers();
        } catch (Exception $e) {
            error_log("Error en obtenerTodos: " . $e->getMessage());
            return false;
        }
    }

    // Obtener un libro por su ID
    public function obtenerPorId($id) {
        try {
            $this->db->query('SELECT * FROM libro WHERE id_libro = :id');
            $this->db->bind(':id', $id);
            return $this->db->register();
        } catch (Exception $e) {
            error_log("Error en obtenerPorId: " . $e->getMessage());
            return false;
        }
    }

    // Crear un nuevo libro
    public function crear($datos) {
        try {
            $this->db->query('INSERT INTO libro (Titulo, Editorial, AñoEdicion, Cantidad, categoria_id) 
                              VALUES (:Titulo, :Editorial, :AñoEdicion, :Cantidad, :categoria_id)');
            $this->bindDatos($datos);
            return $this->db->execute();
        } catch (Exception $e) {
            error_log("Error en crear: " . $e->getMessage());
            return false;
        }
    }

    // Actualizar un libro existente por su ID
    public function actualizar($id, $datos) {
        try {
            $this->db->query('UPDATE libro SET Titulo = :Titulo, Editorial = :Editorial, AñoEdicion = :AñoEdicion, Cantidad = :Cantidad, 
                              categoria_id = :categoria_id, WHERE id_libro = :id');
            $this->bindDatos($datos);
            $this->db->bind(':id', $id);
            return $this->db->execute();
        } catch (Exception $e) {
            error_log("Error en actualizar: " . $e->getMessage());
            return false;
        }
    }

    // Eliminar un libro por su ID
    public function eliminar($id) {
        try {
            $this->db->query('DELETE FROM libro WHERE id_libro = :id');
            $this->db->bind(':id', $id);
            return $this->db->execute();
        } catch (Exception $e) {
            error_log("Error en eliminar: " . $e->getMessage());
            return false;
        }
    }

    // Método para asignar los datos recibidos a los parámetros de la consulta
    private function bindDatos($datos) {
        $this->db->bind(':Titulo', $datos['Titulo']);
        $this->db->bind(':Editorial', $datos['Editorial']);
        $this->db->bind(':AñoEdicion', $datos['AñoEdicion']);
        $this->db->bind(':Cantidad', $datos['Cantidad']);
        $this->db->bind(':categoria_id', $datos['categoria_id']);
    }
}