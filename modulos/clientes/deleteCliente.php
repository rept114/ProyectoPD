<?php       
    /*Se guarda el parametro recibido por POST*/
    $idCliente = $_POST["id"];     
    
    include '../../appCode/clsClientes.php';          
    $clientes = new Clientes();
       
    try{
        /*Se intenta eliminar el cliente, se pasa por parametro el ID*/
        if ($clientes->deleteClientes($idCliente)){
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