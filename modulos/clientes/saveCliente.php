<?php
    include '../../appCode/clsClientes.php';   
       
    /*Se guarda los parametro recibido por POST*/
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $rfc = $_POST["rfc"];
    $telefono = $_POST["telefono"];

    
    $clientes = new Clientes();    
    
    try{
        /*Se intenta insertar el cliente, se pasan los parametro ID, Nombre, RFC y Telefono*/
        if ($clientes->insertCliente($id, $nombre, $rfc, $telefono)){
            echo "Éxito";      
        }
        else{
            throw new Exception('Error: No se encontró informacion del cliente para eliminar');                    
        }
    }
    catch(Exception $e){                
       echo "Error"; 
    }  
?>