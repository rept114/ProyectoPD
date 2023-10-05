<?php
require_once("clsMySQLPDO.php");

class Articulos
{
 
    public $objMysql;
 
    public function __construct(){
        //$this->conn = $db;
        $this->objMysql = new clsMysql();
    }
 
    // regresa todos los clientes activos (status = 1)
    public function getArticulos($MQ=false){
        //select all data       
        return $this->objMysql->ejecutaSPSafe('sp_getArticulos_erik',null,$MQ);   
    }
    
    // Elimina el cliente que cumpla con el id recibido
    public function deleteArticulos($codigo, $MQ=false){
        //select all data       
        return $this->objMysql->ejecutaSPSafe('sp_delete_erik',array($codigo),$MQ);   
    }

    // Insert o Update los datos de un cliente
    public function insertArticulos($codigo, $descripcion, $precio, $categoria, $imagen, $MQ=false){
        return $this->objMysql->ejecutaSPSafe('sp_insert_Articulo',array($codigo, $descripcion, $precio, $categoria, $imagen),$MQ);   
    }

    // Regresa la informacion del cliente que cumpla con el ID recibido
    public function getInfoArticulos($codigo, $MQ=false){
        return $this->objMysql->ejecutaSPSafe('sp_getInfoArticulo_erik',array($codigo),$MQ);   
    }
    
    //actualiza el articulo
    public function updateArticulo ($codigo, $descripcion, $precio, $categoria, $MQ=false){
        return $this->objMysql->ejecutaSPSafe('sp_update_articulo', array($codigo, $descripcion, $precio, $categoria), $MQ);
    }
}
?>