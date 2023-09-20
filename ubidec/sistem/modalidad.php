<?php
include "conexion.php";



$sql = "SELECT * FROM  modalidades";
$r = $con->query($sql);

    $output = "";
    if($r->num_rows==0){//si en la base de dato hay 0 filas ingresados se ejecuta lo siguente
        $output .= '<li class="option"><span class="option-text">NO HAY NINGUNA MODALIDAD CARGADA</span></li>';
    }elseif($r->num_rows>0){
while($fila = mysqli_fetch_array($r)){//genero un ciclo que trae filas asociativas y me los guarde los datos en la variable user
        $output .= '            <li class="option" value="'.$fila['id'].'" data-img="'.$fila['icon'].'">
        <img src="'.$fila['icon'].'" alt="" class="opimg">
        <span class="option-text">'.$fila['modalidad'].'</span>
    </li>';
    }
}
echo $output;