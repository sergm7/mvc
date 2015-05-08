<?php

class  usuariosController extends Controller
{
    private $_usuario;
    
    public function __construct() {
        parent::__construct();
        $this->_usuario = $this->loadModel('usuarios');
    }
    
    public function index()
    {
		if(Session::get('autenticado')){
        
			$this->_view->usuarios = $this->_usuario->getUsuarios();
			$this->_view->titulo = 'Usuarios';
			$this->_view->renderizar('index', 'usuarios');
		
		}
    }
    
    public function nuevo()
    {
        
        $this->_view->titulo = 'Nuevo usuario';
      
        
        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST;
            
            if(!$this->getTexto('nombre')){
                $this->_view->_error = 'nombre';
                $this->_view->renderizar('nuevo', 'usuarios');
                exit;
            }
            
            if(!$this->getTexto('apellidos')){
                $this->_view->_error = 'apellidos';
                $this->_view->renderizar('nuevo', 'usuarios');
                exit;
            }
			
			if(!$this->getTexto('usuario')){
                $this->_view->_error = 'usuario';
                $this->_view->renderizar('nuevo', 'usuarios');
                exit;
            }
            
            if(!$this->getTexto('email')){
                $this->_view->_error = 'email';
                $this->_view->renderizar('nuevo', 'usuarios');
                exit;
            }
			if(!$this->getTexto('password')){
                $this->_view->_error = 'contraseña';
                $this->_view->renderizar('nuevo', 'usuarios');
                exit;
            }
			
            
            $this->_usuario->insertarUsuario(
                    $this->getTexto('nombre'),
                    $this->getTexto('apellidos'),
					$this->getTexto('usuario'),
					$this->getTexto('email'),
					$this->getTexto('password')
                    );
            
            $this->redireccionar('usuarios');
        }       
        
        $this->_view->renderizar('nuevo', 'usuarios');
    }
    
    public function editar($id){
        
		if(!$this->filtrarInt($id)){
            $this->redireccionar('usuarios');
        }
        
        if(!$this->_usuario->getUsuario($this->filtrarInt($id))){
            $this->redireccionar('usuarios');
        }
        
        $this->_view->titulo = 'Editar';
        
        
        if($this->getInt('guardar') == 1){
           
		    $this->_view->datos = $_POST;
            
            
            $this->_usuario->editarUsuario(
                    
					$this->filtrarInt($id),
                    $this->getTexto('Nombree'),
                    $this->getTexto('Apellidoss'),
					$this->getTexto('Usuarioo'),
					$this->getTexto('Emaill'),
					$this->getTexto('Passwordd')
					
                    );
            
            $this->redireccionar('usuarios');
        }
        
        $this->_view->datos = $this->_usuario->getUsuario($this->filtrarInt($id));
        $this->_view->renderizar('editar', 'usuarios');
    }
    
    public function eliminar($id)
    {
       
        if(!$this->filtrarInt($id)){
            $this->redireccionar('usuarios');
        }
        
        $this->_usuario->eliminarUsuario(
			$this->filtrarInt($id)
		
		);
		
        $this->redireccionar('usuarios');
    }
}

?>
