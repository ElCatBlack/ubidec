<?php
include "../conexion.php";

$original_contra = $_POST["ori-contrasena"];
    $nueva_contra = $_POST["new-contrasena"];
    $confirmar_contra = $_POST["new2-contrasena"];

    // Realiza la validación de las contraseñas aquí
    if ($nueva_contra == $confirmar_contra) {
        $sql ="UPDATE";
        $con->$sql;
        
        echo "Contraseña actualizada correctamente.";
    } else {
        echo "Las contraseñas no coinciden.";
    }