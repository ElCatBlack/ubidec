<?php

include "conexion.php";

echo '<main class="profile-content">
<div class="foto-profile">
    <img src="img/'. $user['foto_perfil'].'" alt="">
</div>

<div class="username-profile">
    <div class="info-edit">
        <h1>Informacion de la cuenta</h1>
        <button>editar perfil</button>
    </div>
    <div class="data-profile">
        <div class="data">
            <span>Nombre:</span>
            <p>'. $user['name'] .'</p>
        </div>
        <div class="data">
            <span>Apellido:</span>
            <p>'.$user['apellido'].'</p>
        </div>
        <div class="data">
            <span>Telefono:</span>
            <p>'.$user['telefono'].'</p>
        </div>
        <div class="data">
            <span>Correo:</span>
            <p>'.$user['correo'].'</p>
        </div>
    </div>
</div>

<div class="Info-escuela">
     <h1>Informacion de la escuela</h1>
    <div class="data-escuela">
        <div class="data">
            <span>Escuela perteneciente:</span>
            <p>Padre mario</p>
        </div>
        <div class="data">
            <span>CUE:</span>
            <p>606754532</p>
        </div>
        <div class="data">
            <span>Telefono de la escuela:</span>
            <p>112323423</p>
        </div>
        <div class="data">
            <span>Correo de la escuela:</span>
            <p>padremario@escuela.gov.ar</p>
        </div>
    </div>
<!-- MODAL EDITAR PERFIL -->
<div class="modal">
<div class="modal-target">
<div class="modal-header">
    <div class="cerrar-btn"><button>X</button></div>
    <h2>Editar perfil</h2>
</div>
<form class="modal-content">
    <div class="perfil-photo">
        <div class="old-photo"><img src="img/'. $user['foto_perfil'].'" alt=""></div>
        <div class="new-photo"><img src="icons/camarafalse.png" alt=""></div>
    </div>
    <div class="form-edit">
        <div class="error"></div>
        <input type="text" name="" id="nom" autocomplete="off" placeholder="'.$user['name'].'">
        <input type="text" name="" id="apellido" autocomplete="off" placeholder="'.$user['apellido'].'">
        <input type="text" name="" id="telefono" autocomplete="off" placeholder="'. $user['telefono'].'">
        <input type="submit" value="Guardar">
    </div>
</form>
</div>
</div>

</main>';