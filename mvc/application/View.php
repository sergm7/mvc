<?php




class View
{
    private $_controlador;
    private $_js;
    
    public function __construct(Request $peticion) {
        $this->_controlador = $peticion->getControlador();
        $this->_js = array();
    }
    		
			//este metodo llama a las vistas
    public function renderizar($vista, $item = false)
    {	
		//creamos el array de nuestro menu
        $menu = array(
		
		//Este sera un campo comun
            array(
                'id' => 'inicio',
                'titulo' => 'Inicio',
                'enlace' => BASE_URL
                ),
        );
        
			// Estos solo saldran si estoy logeado
        if(Session::get('autenticado')){
	
				
			$menu[] = array(
                'id' => 'Usuarios',
                'titulo' => 'Usuarios',
                'enlace' => BASE_URL . 'Usuarios'
                );
			
			$menu[] = array(
                'id' => 'logout',
                'titulo' => 'LOGOUT',
                'enlace' => BASE_URL . 'login/cerrar'
                );
				
		//Si no estoy logeado/registrado 
        }else{
			
            $menu[] = array(
                'id' => 'login',
                'titulo' => 'Login',
                'enlace' => BASE_URL . 'login'
                );
            
            $menu[] = array(
                'id' => 'registro',
                'titulo' => 'Registro',
                'enlace' => BASE_URL . 'registro'
                );
        }
        
        	
			//le pasamos las rutas de las carpetas css, img , js y el menu creado anteriormente para nuestro framework
        $_layoutParams = array(
            'ruta_css' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/css/',
            'ruta_img' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/img/',
            'ruta_js' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/js/',
            'menu' => $menu,
         
        );
        
		//pasamos las rutas de las vistas
        $rutaView = ROOT . 'views' . DS . $this->_controlador . DS . $vista . '.php';
        
			//Si existe cargaremos los php de nuestra template
        if(is_readable($rutaView)){
            include_once ROOT . 'views'. DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'header.php';
            include_once $rutaView;
            include_once ROOT . 'views'. DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'footer.php';
        } 
        else { //Si no existe daremos un error
            throw new Exception('Error de vista');
        }
    }
    

}

?>
