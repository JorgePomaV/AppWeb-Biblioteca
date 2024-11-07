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
    public function crear($data) {
        //var_dump($data);die;
      //  try {
            $this->db->query("INSERT INTO libro (Titulo, Editorial, AnoEdicion, Cantidad, categoria_id, usuario_id) 
                              VALUES (:Titulo, :Editorial, :AnoEdicion, :Cantidad, :categoria_id, :usuario_id)");
            //$this->bindDatos($datos);
            $this->db->bind('Titulo', $data['Titulo']);
            $this->db->bind('Editorial', $data['Editorial']);
            $this->db->bind('AnoEdicion', $data['AnoEdicion']);                  
            $this->db->bind('Cantidad', $data['Cantidad']);
            $this->db->bind('categoria_id', $data['categoria_id']);
            $this->db->bind('usuario_id', null);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
    
            // $this->db->execute();
          //  return true;
       //   echo $this->db->execute();
      //  } catch (Exception $e) {
      //      error_log("Error en crear: " . $e->getMessage());
        //    return false;
        //}
      
        }

    // Actualizar un libro existente por su ID
    public function actualizar($id, $datos) {
    
            $this->db->query('UPDATE libro SET Titulo = :Titulo, Editorial = :Editorial, AñoEdicion = :AñoEdicion, Cantidad = :Cantidad, 
                              categoria_id = :categoria_id, WHERE id_libro = :id');
            //$this->bindDatos($datos);
            $this->db->bind('Titulo', $datos['titulo']);
            $this->db->bind('Editorial', $datos['editorial']);
            $this->db->bind('AñoEdicion', $datos['anioEdicion']);                  
            $this->db->bind('Cantidad', $datos['cantidad']);
            $this->db->bind('categoria_id', $datos['categoria_id']);
            $this->db->bind(':id', $id);
           /* return $this->db->execute();
        } catch (Exception $e) {
            error_log("Error en actualizar: " . $e->getMessage());
            return false;
        }*/
        if ($this->db->execute()) {
			return true;
		} else {
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
        $this->db->bind(':Titulo', $datos['titulo']);
        $this->db->bind(':Editorial', $datos['editorial']);
        $this->db->bind(':AñoEdicion', $datos['anioEdicion']);
        $this->db->bind(':Cantidad', $datos['cantidad']);
        $this->db->bind(':categoria_id', $datos['categoria_id']);
    }
}
