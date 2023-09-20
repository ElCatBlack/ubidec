<?php

include "conexion.php";

$name=$_POST['name'];
$ape=$_POST['apellido'];
$num=$_POST['telefono'];
$correo=$_POST['correo'];
$contrasena= md5($_POST['contrasena']);
$foto_perfil= 'user.png';

$name = htmlspecialchars($name);
$ape = htmlspecialchars($ape);
$num = htmlspecialchars($num);
$correo = htmlspecialchars($correo);
$contrasena = htmlspecialchars($contrasena);

if (empty($name) || empty($ape) || empty($correo) || empty($contrasena)) {
    // Manejo de campos vacíos
    echo "COMPLETA TODOS LOS DATOS";
    exit();
}

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    echo "CORREO NO VALIDO";
    exit();
}

if(empty($num)){
        $num="Número de teléfono no ingresado";
}

$stmt = $con->prepare("INSERT INTO user VALUES (null, ?, ?, ?, ?, ?, ?, default, now())");//prepara la culta para la inserccion, los ? son las pocisiones
$stmt->bind_param("ssssss", $name, $ape, $num, $correo, $contrasena, $foto_perfil);//bind_param evita inserccion de codigo sql y tambien vincula las pociones de las variables
// s = string (cadena)
// i = integer (entero)
// d = double (número con decimales)
// b = blob (dato binario, como imágenes)
$sql = "SELECT * FROM user WHERE correo = ?";
$stmt_check = $con->prepare($sql);
$stmt_check->bind_param("s", $correo);
$stmt_check->execute();//ejecuta la consulta
$r = $stmt_check->get_result();//trae los resultados

if ($r->num_rows > 0) {
    echo "YA ESTA REGISTRADO EL CORREO";
    exit();
} else {
    if ($stmt->execute()) {
        echo "ok";
    } else {
        echo "Error al registrar usuario";
    }
}

$stmt->close();
$stmt_check->close();
$con->close();