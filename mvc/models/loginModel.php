<?php

class loginModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    	
		//Cogemos los datos del usuario que cumpla la condicion del registro con su usuario y password correspondiente
    public function getUsuario($usuario, $password)
    {
        $datos = $this->_db->query(
                "select * from usuarios " .
                "where usuario = '$usuario' " .
                "and password = '$password'"
                );
        
        return $datos->fetch();
    }
}

?>
