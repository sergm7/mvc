<?php

class registroModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    
    public function verificarUsuario($usuario)
    {
        $id = $this->_db->query(
                "select id_user from usuarios where usuario = '$usuario'"
                );
        
        return $id->fetch();
    }
    
    public function verificarEmail($email)
    {
        $id = $this->_db->query(
                "select id_user from usuarios where email = '$email'"
                );
        
        if($id->fetch()){
            return true;
        }
        
        return false;
    }
    
    public function registrarUsuario($nombre,$apellido, $usuario, $password, $email)
    {
    	
		
        $this->_db->prepare(
                "insert into usuarios values" .
                "(null, :nombre, :apellido, :email, :usuario, :password,2,1)"
                )
                ->execute(array(
                    ':nombre' => $nombre,
					':apellido'=>$apellido,
                    ':usuario' => $usuario,
                    ':password' =>$password,
                    ':email' => $email
                    
                ));
    }
    
    public function getUsuario($id)
	{
		$usuario = $this->_db->query(
					"select * from usuarios where id_user = $id "
					);
					
		return $usuario->fetch();
	}
	
	
}

?>
