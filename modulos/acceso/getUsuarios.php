<?php
/*
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
*/
    include '../../appCode/clsAcceso.php';   
       
    $acceso = new Acceso();
    $result = $acceso->getUsuarios();
    
    foreach($result as $row)
    {
        echo $row["email"] . 
        ' es el correo de: ' . 
        $row["nombre"] . 
        ' ' . 
        $row["apellido"] . '<br>';        
    }
?>