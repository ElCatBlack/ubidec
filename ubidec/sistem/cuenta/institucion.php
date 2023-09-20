<?php
include "../conexion.php";
session_start();
$user = $_SESSION['user']['id'];

$sql = "SELECT institutos.id, provincias.provincia AS provi, institutos.provincia, localidades.localidad AS locas, institutos.localidad,nom_instu, tipo, niveles, direccion, telefono
 FROM institutos
 INNER JOIN provincias ON provincias.id=institutos.provincia
 INNER JOIN localidades ON localidades.id=institutos.localidad
 WHERE id_secretario = $user LIMIT 1";
$r = $con->query($sql);
$output = "";
if($r->num_rows==0){
    $output .= '<main class="edit-institucion">
    <header class="header-edit"><div class="edit-title"><h1>Editar institucion</h2></div></header>
     <div class="edit-content"><h2>Ningún instituto cargado</h2><p>:(</p><a href="regisinstitucion.php">Registra tu institucion</a></div>
    </main>';
}elseif($r->num_rows>0){
    while($insti = mysqli_fetch_array($r)){
        $provin = $insti['provi'];
        $loca = $insti['locas'];
        $output .= '<main class="edit-institucion">
        <header class="header-edit"><div class="edit-title"><h1>Editar institucion</h2></div></header>
            <article class="content-escuelas">
            <div class="foto-escuela"><a href="institucion.php" class="image-direccion" data-id="'.$insti['id'].'"><img src="img/escuela-reference.jpg" alt=""></a></div>
            <div class="info-escuela">
                <div class="name-school"><a href="institucion.php" class="title-direccion" data-id="'.$insti['id'].'"><h1>'.$insti['nom_instu'].'</h1></a>
                        <div class="edit-menu">
                            <a href="updateinstitucion.php" class="btn-edit" data-id="'.$insti['id'].'"><img src="icons/lapiz.png" alt=""></a>
                        </div>
                </div>
            <div class="datos-school">
            <div class="date1"><span>- '.$insti['tipo'].'</span></div>
            <div class="date1"><span>- Nivel:</span><p>'.$insti['niveles'].'</p></div>
            <div class="date2"><span><a href="#"><img src="icons/marcador.png" alt="">'.$provin.', '.$loca.'</a></span></div>
            <div class="date3"><span>- Direccion: <a href="#">'.$insti['direccion'].'</a></span></div>
            <div class="date4"><span>- Télefono: <a href="#">'.$insti['telefono'].'</a></span></div>
            </div>
            </div>
            </article>
        </main>';
    }
}
echo $output;