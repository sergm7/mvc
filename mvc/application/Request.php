<?php //recibe y procesa las peticiones del bootstrap

class Request
{					// definimos las variables privadas para la clase request
    private $_controlador;
    private $_metodo;
    private $_argumentos;
    
    public function __construct() {  //revisa si existe la variable url por metodo get
        if(isset($_GET['url'])){
            $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
            $url = explode('/', $url);  //divide la url en metodo, controlador y argumentos
            $url = array_filter($url); //elimina los elementos de la url que no sean validos
            
			//extraemos el elemento de la url y lo asigna a controlador, metodo y argumentos
            $this->_controlador = strtolower(array_shift($url)); 
            $this->_metodo = strtolower(array_shift($url));
            $this->_argumentos = $url;
        }       
        						// Si no le asignamos un controlador cogera el definido por defecto en config.php
        if(!$this->_controlador){
            $this->_controlador = DEFAULT_CONTROLLER;
        }
        					   // el metodo por defecto sera index.php
        if(!$this->_metodo){
            $this->_metodo = 'index';
        }
        
        if(!isset($this->_argumentos)){
            $this->_argumentos = array();
        }
    }
    
				//obtenemos los valores de las variables privadas
				
    public function getControlador()
    {
        return $this->_controlador;
    }
    
    public function getMetodo()
    {
        return $this->_metodo;
    }
    
    public function getArgs()
    {
        return $this->_argumentos;
    }
}

?>