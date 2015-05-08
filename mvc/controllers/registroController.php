<?php

class registroController extends Controller
{
    private $_registro;
    
    public function __construct() {
        parent::__construct();
        
        $this->_registro = $this->loadModel('registro');
    }
    
    public function index()
    {
        if(Session::get('autenticado')){
            $this->redireccionar();
        }
        
        $this->_view->titulo = 'Registro';
        
        if($this->getInt('enviar') == 1){
            $this->_view->datos = $_POST;
            
            if(!$this->getSql('nombre')){
                $this->_view->_error = 'Introduir el Nombre';
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            
            if(!$this->getAlphaNum('usuario')){
                $this->_view->_error = 'Introduce el nombre';
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            
            if($this->_registro->verificarUsuario($this->getAlphaNum('usuario'))){
                $this->_view->_error = 'El usuario ' . $this->getAlphaNum('usuario') . ' ya existe';
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            

            
            if(!$this->getSql('pass')){
                $this->_view->_error = 'Introducir la contraseña';
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            
            
			$this->getLibrary('class.phpmailer');
			$mail = new PHPMailer();
			
            $this->_registro->registrarUsuario(
                    $this->getSql('nombre'),
					$this->getSql('apellido'),
                    $this->getAlphaNum('usuario'),
                    $this->getSql('pass'),
                    $this->getPostParam('email')
                    );
            
			$this->redireccionar('index');
			
        }        
        
        $this->_view->renderizar('index', 'registro');
		
		
    }

}

?>
