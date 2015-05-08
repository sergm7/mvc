<?php




class Bootstrap
{
    public static function run(Request $peticion)
    {
        $controller = $peticion->getControlador() . 'Controller';
        $rutaControlador = ROOT . 'controllers' . DS . $controller . '.php';
        $metodo = $peticion->getMetodo();
        $args = $peticion->getArgs();
        		//si el php existe y se puede leer lo importa
        if(is_readable($rutaControlador)){
            require_once $rutaControlador;
            $controller = new $controller;
			
            		//comprobamos que el metodo es valido y si no utilizaremos el metodo index
            if(is_callable(array($controller, $metodo))){
                $metodo = $peticion->getMetodo();
            }
            else{
                $metodo = 'index';
            }

				// envia al array el nombre de la clase y el metodo y los paremotros del metodo
            if(isset($args)){
                call_user_func_array(array($controller, $metodo), $args);
            }
            else{  //si no hay solo pasamos el controlador y el metodo
                call_user_func(array($controller, $metodo));
            }
            
        } else { //Si el controlador no es valido daremos una excepcion
            throw new Exception('no encontrado');
        }
    }
}

?>