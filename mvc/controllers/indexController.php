<?php

class indexController extends Controller
{
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {		//llamaremos al modelo
        $index = $this->loadModel('usuarios');
        
		
        $this->_view->usuarios = $index->getUsuarios();
        
			// en esta variable metemos el titulo de nuestra aplicacion que utilizaremos en el header
        $this->_view->titulo = 'Mini Framework';
		
			//utilizaremos nuestra vista index
        $this->_view->renderizar('index', 'inicio');
    }
}

?>