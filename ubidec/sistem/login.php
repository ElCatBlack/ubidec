<?php
include "conexion.php";
session_start();

$correo=$_POST['correo'];
$contrasena= md5($_POST['contrasena']);

if (empty($correo) || empty($contrasena)) {
    echo "COMPLETA TODOS LOS DATOS";
    exit();
}
//evita inserccion sqsl
$stmt = $con->prepare("SELECT * FROM user WHERE correo = ? AND contrasena = ?");
$stmt->bind_param("ss", $correo, $contrasena);
$stmt->execute();
$r = $stmt->get_result();

if ($r->num_rows > 0) {
  $_SESSION['user'] = $r->fetch_assoc();
  
  $cookie_value = $_SESSION['user']['id']; 
  setcookie("sesion", $cookie_value, time() + 3600, "/");
  
  echo "ok";
} else {
  echo "NO EXISTE EL USUARIO O DATOS MAL PUESTOS";
  exit();
}

$stmt->close();