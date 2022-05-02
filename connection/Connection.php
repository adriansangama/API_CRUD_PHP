<?php 
    class Connection extends Mysqli{ 
        function __construct(){
            parent::__construct('127.0.0.1','root','','api_crud');
            $this->set_charset('utf8');
            $this->connect_error==NULL ? 'Conexion existosa': die('Error conexion');
        }//end constructor            
    }//end class
?>