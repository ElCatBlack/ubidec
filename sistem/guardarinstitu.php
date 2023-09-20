<?php
include "conexion.php";
session_start();
$user = $_SESSION['user']['id'];

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

$stmt = $con->prepare("INSERT INTO institutos (id_secretario, coordenadas, direccion, provincia, localidad, telefono, correo, pagina, nom_instu, tipo, cue, niveles, horarios, descripcion, director, subdirector, secretario, requisitos, f_actualizacion) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now())");
$stmt->bind_param("issiisssssssssssss", $user, $coor, $direc, $provin, $local, $tel, $email, $web, $nom_ins, $tipo, $cue, $niv, $horCon, $desc, $director, $subdirec, $secre, $reque);

if ($stmt->execute()) {
    $id_institucion = $con->insert_id;
    echo "ok";
} else {
    echo "Error al guardar los datos: " . $stmt->error;
}

// $stmt->close();
// $con->close();

//GUARDAR REDES SOCIALES
$face = $_POST['facebook'];
$insta = $_POST['instagram'];
$whats = $_POST['whatsapp'];
$twit = $_POST['twitter'];
$you = $_POST['youtube'];
//facebook
if (!empty($face)) {
    $sql = "INSERT INTO redes (icon,tipo, link, color,id_institucion) VALUES ('icons/facebook.png','facebook', '$face', 'background:#1877f2',$id_institucion)";
    $con->query($sql);
}
//instagram
if (!empty($insta)) {
    $sql = "INSERT INTO redes (icon,tipo, link, color,id_institucion) VALUES ('icons/instagram.png','instagram', '$insta', 'background:linear-gradient(30deg,#f78331,#da2e7d 50.39%,#6b54c6)',$id_institucion)";
    $con->query($sql);
}
//whatsapp
if (!empty($whats)) {
    $sql = "INSERT INTO redes (icon,tipo, link, color,id_institucion) VALUES ('icons/whatsapp.png','whatsapp', '$whats', 'background:#10bb10',$id_institucion)";
    $con->query($sql);
}
//twitter
if (!empty($twit)) {
    $sql = "INSERT INTO redes (icon,tipo, link, color,id_institucion) VALUES ('icons/twitter.png','twitter', '$twit', 'background:#55acee',$id_institucion)";
    $con->query($sql);
}
//youtube
if (!empty($you)) {
    $sql = "INSERT INTO redes (icon,tipo, link, color,id_institucion) VALUES ('icons/youtube.png','youtube', '$you', 'background:#f50022',$id_institucion)";
    $con->query($sql);
}

//GUARDAR MODALIDADES
$titulos = $_POST['titulos'];

foreach ($titulos as $mod) {
    if ($mod >= 1) {
        $stmt = $con->prepare("INSERT INTO mod_insti (id_modalidad, id_institucion) VALUES (?, ?)");
        $stmt->bind_param("ii", $mod, $id_institucion);

        if ($stmt->execute()) {
        } else {
            echo "Error al guardar los datos en mod_insti: " . $stmt->error;
        }

        $stmt->close();
    }
}


//GUARDAR LO QUE CUENTA
$eq_orientacion = $_POST['eq_orientacion'] ? 1 : 0;
$centro_es = $_POST['centro_es'] ? 1 : 0;
$biblioteca = $_POST['biblioteca'] ? 1 : 0;
$patio = $_POST['patio'] ? 1 : 0;
$comedor = $_POST['comedor'] ? 1 : 0;
$sr_alimen =$_POST['sr_alimen'] ? 1 : 0;

$sql = "INSERT INTO ins_cuenta (eq_orientacion, centro_es, biblioteca, patio, comedor, sr_alimen, id_institucion) VALUES ($eq_orientacion, $centro_es, $biblioteca, $patio, $comedor, $sr_alimen, $id_institucion)";
$con->query($sql);

// <?php
// include "conexion.php";
// session_start();
// $user = $_SESSION['user']['id'];

// //PRIMERA COLUMNA
// $coor = $_POST['coordenadas'];
// $direc = $_POST['direccion'];
// $provin = $_POST['provincia'];
// $local = $_POST['localidad'];
// $tel = $_POST['telefono'];
// $email = $_POST['correo'];
// $web = $_POST['pagina'];

// //SEGUNDA COLUMNA
// $nom_ins = $_POST['nom_instu'];
// $tipo = $_POST['tipo'];
// $cue = $_POST['cue'];
// $niv = $_POST['niveles'];
// $hor = $_POST['horarios'];
// $desc = $_POST['descripcion'];
// $director = $_POST['director'];
// $subdirec = $_POST['subdirector'];
// $secre = $_POST['secretario'];
// $reque = $_POST['requisitos'];

// $horCon = implode('/', $hor);

// $sql = "INSERT INTO institutos (id_secretario, coordenadas, direccion, provincia, localidad, telefono, correo, pagina, nom_instu, tipo, cue, niveles, horarios, descripcion, director, subdirector, secretario, requisitos, f_actualizacion) VALUES($user, '$coor', '$direc', $provin, $local, '$tel', '$email', '$web', '$nom_ins', '$tipo', '$cue', '$niv', '$horCon', '$desc', '$director', '$subdirec', '$secre', '$reque', now())";



// if ($con->query($sql) === TRUE) {
//     $id_institucion = $con->insert_id;
// }else {
//     echo "Error al guardar los datos: " . $con->error;
// }

// //GUARDAR REDES SOCIALES
// $face = $_POST['facebook'];
// $insta = $_POST['instagram'];
// $whats = $_POST['whatsapp'];
// $twit = $_POST['twitter'];
// $you = $_POST['youtube'];
// //facebook
// if (!empty($face)) {
//     $sql = "INSERT INTO redes (icon,tipo, link, color,id_institucion) VALUES ('icons/facebook.png','facebook', '$face', 'background:#1877f2',$id_institucion)";
//     $con->query($sql);
// }
// //instagram
// if (!empty($insta)) {
//     $sql = "INSERT INTO redes (icon,tipo, link, color,id_institucion) VALUES ('icons/instagram.png','instagram', '$insta', 'background:linear-gradient(30deg,#f78331,#da2e7d 50.39%,#6b54c6)',$id_institucion)";
//     $con->query($sql);
// }
// //whatsapp
// if (!empty($whats)) {
//     $sql = "INSERT INTO redes (icon,tipo, link, color,id_institucion) VALUES ('icons/whatsapp.png','whatsapp', '$whats', 'background:#10bb10',$id_institucion)";
//     $con->query($sql);
// }
// //twitter
// if (!empty($twit)) {
//     $sql = "INSERT INTO redes (icon,tipo, link, color,id_institucion) VALUES ('icons/twitter.png','twitter', '$twit', 'background:#55acee',$id_institucion)";
//     $con->query($sql);
// }
// //youtube
// if (!empty($you)) {
//     $sql = "INSERT INTO redes (icon,tipo, link, color,id_institucion) VALUES ('icons/youtube.png','youtube', '$you', 'background:#f50022',$id_institucion)";
//     $con->query($sql);
// }

// //GUARDAR MODALIDADES
// $titulos = $_POST['titulos'];

// foreach($titulos as $mod){
//     if($mod >= 1){
//         $sql = "INSERT INTO mod_insti (id_modalidad, id_institucion) VALUES ($mod, $id_institucion)";
//         $con->query($sql);
//     }
// }

// //GUARDAR LO QUE CUENTA
// $eq_orientacion = $_POST['eq_orientacion'] ? 1 : 0;
// $centro_es = $_POST['centro_es'] ? 1 : 0;
// $biblioteca = $_POST['biblioteca'] ? 1 : 0;
// $patio = $_POST['patio'] ? 1 : 0;
// $comedor = $_POST['comedor'] ? 1 : 0;
// $sr_alimen =$_POST['sr_alimen'] ? 1 : 0;

// $sql = "INSERT INTO ins_cuenta (eq_orientacion, centro_es, biblioteca, patio, comedor, sr_alimen, id_institucion) VALUES ($eq_orientacion, $centro_es, $biblioteca, $patio, $comedor, $sr_alimen, $id_institucion)";
// $con->query($sql);