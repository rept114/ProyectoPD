<div class="row text-center">
    <h1>Clientes</h1>
    <hr>
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Codigo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Precio</th>
                <th scope="col">Categoria</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
<?php
    include '../../appCode/clsArticulos.php';   
       
    $articulos = new Articulos();
    $result = $articulos->getArticulos();
    
    foreach($result as $row)
    {
?>
            <tr>
                <td scope="col">#</td>
                <td scope="col"><?=$row["ID"]?></td>
                <td scope="col"><?=$row["codigo"]?></td>
                <td scope="col"><?=$row["descripcion"]?></td>
                <td scope="col"><?=$row["precio"]?></td>
                <td scope="col"><?=$row["categoria"]?></td>
                <td scope="col">
                    <button class="btn btn-success btn-sm" onclick="updateArticulo('<?=$row["codigo"]?>');"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="deleteArticulos('<?=$row["codigo"]?>');"><i class="fa-solid fa-trash"></i></button>
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
                <td scope="col"></td>
                <td scope="col">
                    <button class="btn btn-primary btn-sm" onclick="editCliente(0);"><i class="fa-solid fa-plus"></i></button>                    
                </td>
            </tr>
        </tbody>
    </table>