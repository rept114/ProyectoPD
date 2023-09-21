<?php
    /*Se guarda el valor del parametro recibido por post*/
    $idCliente = $_POST["id"];
    
    /*Se inicializan las variables*/
    $titulo = "";
    $nombre = "";
    $rfc = "";
    $telefono = "";

    /*Se verifica el valor de la variable $idCliente (= 0 es una alta o nuevo cliente, > 0 es update)*/
    if ($idCliente == "0"){
        $titulo = "Alta de cliente.";
    }
    else{
        $titulo = "Actualizacipon datos de cliente.";
        
        /*Se consulta los datos del cliente segun el $idCliente recibido*/
        include '../../appCode/clsClientes.php';   
       
        $clientes = new Clientes();
        $result = $clientes->getInfoClientes($idCliente);

        /*Se actualizan las variables, estas se asignan a los inputs en el atributo value*/
        $nombre = $result[0]["nombre"];
        $rfc = $result[0]["rfc"];
        $telefono = $result[0]["telefono"];
    }
?>

<div class="row text-center">
    
    <div class="row">
        <div class="col text-start">
            <button class="btn btn-primary btn-sm" onclick="getCliente();"><i class="fa-solid fa-left-long"></i></button>
        </div>
        <div class="col">
            <h1><?=$titulo?></h1>
        </div>
        <div class="col text-end">    
            <button class="btn btn-primary btn-sm" onclick="saveCliente('<?=$idCliente?>');"><i class="fa-solid fa-save"></i></button>    
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="txtNombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="txtNombre" placeholder="Nombre del cliente" value="<?=$nombre?>">
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="txtRfc" class="form-label">RFC</label>
                <input type="text" class="form-control" id="txtRfc" placeholder="RFC" value="<?=$rfc?>">
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="txtTelefono" class="form-label">Telefono</label>
                <input type="text" class="form-control" id="txtTelefono" placeholder="Telefono" value="<?=$telefono?>">
            </div>
        </div>
    </div>
    <hr>
</div>
    