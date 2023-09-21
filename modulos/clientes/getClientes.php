<div class="row text-center">
    <h1>Clientes</h1>
    <hr>
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">RFC</th>
                <th scope="col">Telefono</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
<?php
    include '../../appCode/clsClientes.php';   
       
    $clientes = new Clientes();
    $result = $clientes->getClientes();
    
    foreach($result as $row)
    {
?>
            <tr>
                <td scope="col">#</td>
                <td scope="col"><?=$row["id"]?></td>
                <td scope="col"><?=$row["nombre"]?></td>
                <td scope="col"><?=$row["rfc"]?></td>
                <td scope="col"><?=$row["telefono"]?></td>
                <td scope="col">
                    <button class="btn btn-success btn-sm" onclick="editCliente('<?=$row["id"]?>');"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="deleteCliente('<?=$row["id"]?>');"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
<?php       
    }
?>
            <tr>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col">
                    <button class="btn btn-primary btn-sm" onclick="editCliente(0);"><i class="fa-solid fa-plus"></i></button>                    
                </td>
            </tr>
        </tbody>
    </table>