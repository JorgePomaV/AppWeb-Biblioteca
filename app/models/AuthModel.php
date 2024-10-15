<?php

class AuthModel {
	private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    /* Create: Función para dar de alta al usuario.
        Tener en cuenta que para los campos TIMESTAMP, no se usa la función bind.
    */
    public function crear_usuario($data)//$data: contiene todos los datos del usuario que se va a crear
	{
		
		$keyw = "keyword"; //Define una variable $keyw y le asigna el valor de la cadena "keyword", que se utilizará como clave para encriptar la contraseña.
		$this->db->query("INSERT INTO usuario
                          (Nombre, Apellido, Avatar, Email, Celular, created_at) 
						  VALUES 
						  (:nombre, :apellido, :avatar, :email, :numero, aes_encrypt(:pass,:keyword), CURRENT_TIMESTAMP);
						  INSERT INTO autenticasion
						  (Contraseña,Dni) VALUES 
						  (:pass,:dni)");
        $this->db->bind('nombre', $data['nombre']);
        $this->db->bind('apellido', $data['apellido']);
        $this->db->bind('avatar', $data['avatar']);                  
		$this->db->bind('email', $data['email']);
		$this->db->bind('pass', $data['pass']);
		$this->db->bind('dni', $data['dni']);
		$this->db->bind('numero', $data['numero']);
		$this->db->bind('keyword', $keyw);
		//
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

    	/* Método para buscar el mail y la contraseña para comprobar si existe y poder loguear*/

	public function buscar_por_mail($data)
	{
		//Se ejecuta una consulta SQL en la base de datos utilizando el objeto $db
		//La contraseña (pass) es desencriptada usando la función aes_decrypt con una clave ('keyword'), y se le da un alias pass en el resultado.
		$this->db->query("SELECT id_usuario, Nombre, Email, avatar, aes_decrypt(pass, 'keyword') AS pass 
							  FROM usuario
							  WHERE usuario.email =:email
							  AND deleted_at IS NULL");//Añade otra condición para asegurar que solo se seleccionen usuarios que no han sido eliminados (es decir, aquellos cuyo campo deleted_at es nulo).
		// Vincula el valor del correo electrónico del arreglo $data a la consulta preparada, reemplazando :email con el valor correspondiente. Esto es una medida de seguridad para prevenir inyecciones SQL.
		$this->db->bind('email', $data['email']);
		
		$result = $this->db->register();//Ejecuta la consulta y guarda el resultado en la variable $result.
		return $result;
	}

	public function change_pass($pass, $email)
	{
		
		$keyw = 'keyword';
		$this->db->query("UPDATE usuario SET
								pass = aes_encrypt(:new_pass,:keyword),
								updated_at=CURRENT_TIMESTAMP
							 WHERE email=:mail");
		$this->db->bind('new_pass', $pass);
		$this->db->bind('keyword', $keyw);
		$this->db->bind('mail', $email);
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	
}
?>