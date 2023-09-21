<?php
require_once("clsMySQLPDO.php");

class Clientes
{
 
    public $objMysql;
 
    public function __construct(){
        //$this->conn = $db;
        $this->objMysql = new clsMysql();
    }
 
    // regresa todos los clientes activos (status = 1)
    public function getClientes($MQ=false){
        //select all data       
        return $this->objMysql->ejecutaSPSafe('getClientes',null,$MQ);   
    }
    
    // Elimina el cliente que cumpla con el id recibido
    public function deleteClientes($idCliente, $MQ=false){
        //select all data       
        return $this->objMysql->ejecutaSPSafe('sp_deleteCliente',array($idCliente),$MQ);   
    }

    // Insert o Update los datos de un cliente
    public function insertCliente($idCliente, $nombre, $rfc, $telefono, $MQ=false){
        return $this->objMysql->ejecutaSPSafe('sp_saveCliente',array($idCliente, $nombre, $rfc, $telefono),$MQ);   
    }

    // Regresa la informacion del cliente que cumpla con el ID recibido
    public function getInfoClientes($idCliente, $MQ=false){
        return $this->objMysql->ejecutaSPSafe('sp_getInfoCliente',array($idCliente),$MQ);   
    }
    
}
?>