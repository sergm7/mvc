<?php



		//todos los controladores heredan de la clase controler que sera el core de nuestra aplicacion
abstract class Controller
{
    protected $_view;
    
    public function __construct() {
        $this->_view = new View(new Request);
    }
	
    			//todas las clases que hereden de controller tendran un metodo index
    abstract public function index();
    
				// enviamos el modelo
    protected function loadModel($modelo)
    {
        $modelo = $modelo . 'Model';
        $rutaModelo = ROOT . 'models' . DS . $modelo . '.php';
        
				//si la puede leer coge el modelo que hemos cargado
        if(is_readable($rutaModelo)){
            require_once $rutaModelo;
            $modelo = new $modelo;
            return $modelo;
        }
        else {		//Si no, devolvemos un error
            throw new Exception('Error de modelo');
        }
    }
    
    protected function getLibrary($libreria)
    {
        $rutaLibreria = ROOT . 'libs' . DS . $libreria . '.php';
        
        if(is_readable($rutaLibreria)){
            require_once $rutaLibreria;
        }
        else{
            throw new Exception('Error de libreria');
        }
    }
    
    protected function getTexto($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = htmlspecialchars($_POST[$clave], ENT_QUOTES);
            return $_POST[$clave];
        }
        
        return '';
    }
    
    protected function getInt($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = filter_input(INPUT_POST, $clave, FILTER_VALIDATE_INT);
            return $_POST[$clave];
        }
        
        return 0;
    }
    
    protected function redireccionar($ruta = false)
    {
        if($ruta){
            header('location:' . BASE_URL . $ruta);
            exit;
        }
        else{
            header('location:' . BASE_URL);
            exit;
        }
    }

    protected function filtrarInt($int)
    {
        $int = (int) $int;
        
        if(is_int($int)){
            return $int;
        }
        else{
            return 0;
        }
    }
    
    protected function getPostParam($clave)
    {
        if(isset($_POST[$clave])){
            return $_POST[$clave];
        }
    }
    
    protected function getSql($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = strip_tags($_POST[$clave]);
            
            if(!get_magic_quotes_gpc()){
                $_POST[$clave] = mysql_escape_string($_POST[$clave]);
            }
            
            return trim($_POST[$clave]);
        }
    }
    
    protected function getAlphaNum($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = (string) preg_replace('/[^A-Z0-9_]/i', '', $_POST[$clave]);
            return trim($_POST[$clave]);
        }
        
    }
    
 
    
}

?>
