<?php


// todos los modelos extenderan de esta clase

class Model
{
    protected $_db;
    
    public function __construct() {
        $this->_db = new Database();
    }
}

?>
