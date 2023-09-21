<?php
require_once("clsMySQLPDO.php");

class Acceso
{
 
    public $objMysql;
 
    public function __construct(){
        //$this->conn = $db;
        $this->objMysql = new clsMysql();
    }
 
    // used by select drop-down list
    public function getUsuarios($MQ=false){
        //select all data       
        return $this->objMysql->ejecutaSPSafe('sp_getUsuarios',null,$MQ);   
    }     
    
}
?>