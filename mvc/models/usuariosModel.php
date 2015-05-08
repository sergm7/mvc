<?php

class  usuariosModel extends Model
{
	
    public function __construct() {
        parent::__construct();
		
    }
    
    public function getUsuarios()
    {
        $usuarios = $this->_db->query("select * from usuarios");
        return $usuarios->fetchall();
    }
	
	
    public function getUsuario($id)
    {
        $id = (int) $id;
        $usuario = $this->_db->query("select * from usuarios where id_user = $id");
        return $usuario->fetch();
    }
    
    public function insertarUsuario($nombre, $apellidos,$usuario,$email,$password)
    {
        
		$user = Session::get('id_user');	
		$this->_db->prepare("INSERT INTO usuarios VALUES
							(null, :nombre, :apellidos,:email,:usuario,:password,'1','1')")
                ->execute(
                        array(
                           ':nombre' => $nombre,
                           ':apellidos' => $apellidos,
						   ':email'=>$email,
						   ':usuario'=>$usuario,
						   ':password'=>$password
						  
                        ));
									
    }
    
    public function editarUsuario($id, $nom, $apellidos,$usuario,$email, $password)
    {
		$id = (int) $id;	
        $this->_db->prepare("UPDATE usuarios SET nombre = :nombre, apellidos = :apellidos, usuario = :usuario,email = :email, password = password, WHERE id_user = :id")
                ->execute(
                        array(
                           ':id' => $id,
                           ':nombre' => $nombre,
                           ':apellidos' => $apellidos,
						   ':usuario'=>$usuario,
						   ':email'=>$email,
						   ':password' => $password
                        ));
    }
    
    public function eliminarUsuario($id)
    {
        $id = (int) $id;
        $this->_db->query("DELETE FROM usuarios WHERE id_user = $id");
    }
    
}

?>
