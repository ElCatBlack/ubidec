<?php
include_once "conexion.php";


$searchterm = mysqli_real_escape_string($con, $_POST['searchterm']);
$output = "";
$sql ="SELECT institutos.id, provincias.provincia AS provi, institutos.provincia, localidades.localidad AS locas, institutos.localidad, nom_instu, tipo, niveles, direccion, telefono 
FROM institutos
INNER JOIN provincias ON provincias.id = institutos.provincia
INNER JOIN localidades ON localidades.id = institutos.localidad
WHERE nom_instu LIKE '%{$searchterm}%'";//like quiere decir que compara y busca el valor como si fuese un where, esto nos sirve para hacer la busqueda
$r =$con->query($sql);
//echo $searchterm;

$output = "";
if($r->num_rows==0){//si en la base de dato hay 0 filas ingresados se ejecuta lo siguente
    $output .= '<div class="error-insti"><h1>NINGUN INSTITUTO ENCONTRADO</h1></div>';
}elseif($r->num_rows>0){//en cambio si hay mas de una fila genera el siguiente html
    while($insti=$r->fetch_assoc()){//genero un ciclo que trae filas asociativas y me los guarde los datos en la variable user
        $provin = $insti['provi'];
        $loca = $insti['locas'];
        $output .= '<article class="content-escuelas">
        <div class="foto-escuela"><a href="institucion.php" class="image-direccion" data-id="'.$insti['id'].'"><img src="img/escuela-reference.jpg" alt=""></a></div>
        <div class="info-escuela">
            <div class="name-school"><a href="institucion.php" class="title-direccion" data-id="'.$insti['id'].'"><h1>'.$insti['nom_instu'].'</h1></a>
                <div class="confi-menu" style="position: relative;">
                    <button class="school-option"><img src="icons/puntos.png" alt=""></button>
                        <div class="dropdown1">
                        <!--aca se genera el compartir y denunciar-->
                        </div>
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
</article>';
    }
}
echo $output;