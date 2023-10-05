<?php
    $criterioBusqueda = $_POST["criterioBusqueda"];
    /*Acceso a datos*/
    include '../../appCode/clsArticulos.php';
    $articulos = new Articulos();
    $result = $articulos->getBuscarArticulos($criterioBusqueda);
?>