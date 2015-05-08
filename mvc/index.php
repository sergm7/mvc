<?php

ini_set('display_errors', 'on');

define('DS', DIRECTORY_SEPARATOR); //definimos la variable con la que separaremos los directorios para que la ruta sea compatible en cualquier sistema
define('ROOT', realpath(dirname(__FILE__)) . DS); //definimos en root la ruta de nuestra aplicacion seguido del separador
define('APP_PATH', ROOT . 'application' . DS); // definimos la ruta de nuestro directorio application


//hacemos el require_once para solo indicarlo en el index.php y cargarlos.
try{
    require_once APP_PATH . 'Config.php';
    require_once APP_PATH . 'Request.php';
    require_once APP_PATH . 'bootstrap.php';
    require_once APP_PATH . 'core.php';
    require_once APP_PATH . 'Model.php';
    require_once APP_PATH . 'View.php';
    require_once APP_PATH . 'Database.php';
    require_once APP_PATH . 'Session.php';
    

    
    Session::init();
	
    bootstrap::run(new Request);
}
catch(Exception $e){ //Hacemos el try catch para evitar errores de servidor y dar un mensaje
    echo $e->getMessage();
}

?>