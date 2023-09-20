<?php
include "conexion.php";
session_start();
$user = $_SESSION['user']['id'];

$institutoID = intval($_POST['instituto_id']); 

//PRIMERA COLUMNA
$coor = $_POST['coordenadas'];
$direc = $_POST['direccion'];
$provin = $_POST['provincia'];
$local = $_POST['localidad'];
$tel = $_POST['telefono'];
$email = $_POST['correo'];
$web = $_POST['pagina'];

//SEGUNDA COLUMNA
$nom_ins = $_POST['nom_instu'];
$tipo = $_POST['tipo'];
$cue = $_POST['cue'];
$niv = $_POST['niveles'];
$hor = $_POST['horarios'];
$desc = $_POST['descripcion'];
$director = $_POST['director'];
$subdirec = $_POST['subdirector'];
$secre = $_POST['secretario'];
$reque = $_POST['requisitos'];

$horCon = implode('/', $hor);

$sql = "UPDATE institutos SET 
        coordenadas = '$coor',
        direccion = '$direc',
        provincia = $provin,
        localidad = $local,
        telefono = '$tel',
        correo = '$email',
        pagina = '$web',
        nom_instu = '$nom_ins',
        tipo = '$tipo',
        cue = '$cue',
        niveles = '$niv',
        horarios = '$horCon',
        descripcion = '$desc',
        director = '$director',
        subdirector = '$subdirec',
        secretario = '$secre',
        requisitos = '$reque',
        f_actualizacion = NOW()
        WHERE id = $institutoID AND id_secretario = $user";

if ($con->query($sql) === TRUE) {
    // Actualización exitosa
} else {
    echo "Error al actualizar los datos del instituto: " . $con->error;
}