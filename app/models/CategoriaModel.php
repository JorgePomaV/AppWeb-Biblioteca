<?php
class CategoriaModel {
    private $db;

    public function __construct() {
        // Instancia de la base de datos (asegúrate de que el objeto $this->db esté configurado correctamente en tu BaseModel)
        $this->db = new database;
    }

    // Obtener todas las categorías
    public function obtenerCategorias() {
        $this->db->query("SELECT * FROM categoria ORDER BY NombreCategoria ASC"); // Ajusta el nombre de la tabla si es diferente
        return $this->db->register();
    }

    // Obtener una categoría por su ID
    public function obtenerCategoriaPorId($id) {
        $this->db->query("SELECT * FROM categoria WHERE id_categoria = :id"); // Cambia el nombre del campo ID si es necesario
        $this->db->bind(':id', $id);
        return $this->db->register();
    }

    // Crear una nueva categoría
    public function crearCategoria($data) {
        $this->db->query("INSERT INTO categoria (NombreCategoria) VALUES (:NombreCategoria)");
        $this->db->bind(':nombre', $data['NombreCategoria']);
        
        return $this->db->execute();
    }

    // Actualizar una categoría existente
    public function actualizarCategoria($data) {
        $this->db->query("UPDATE categoria SET NombreCategoria = :NombreCategoria WHERE id_categoria = :id");
        $this->db->bind(':NombreCategoria', $data['NombreCategoria']);
        $this->db->bind(':id', $data['id_categoria']);
        
        return $this->db->execute();
    }

    // Eliminar una categoría
    public function eliminarCategoria($id) {
        $this->db->query("DELETE FROM categoria WHERE id_categoria = :id");
        $this->db->bind(':id', $id);
        
        return $this->db->execute();
    }
}
