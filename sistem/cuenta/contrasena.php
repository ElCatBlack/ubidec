<?php

include "../conexion.php";
session_start();
$user = $_SESSION['user'];


echo '<form class="password-content">
<div class="password-original"><label for="">Ingresar contraseña actual</label>
<div class="eye-ori"><input type="password" id="password1" placeholder="ingresa la contraseña original" name="ori-contrasena"><img src="icons/ojo.png" alt="" class="eye" id="eye1"></div><p id="error1"></p><a href="">¿Te olvidaste la contraseña?</a></div>
<div class="password-new"><label for="">Ingresar nueva contraeña</label>
<div class="eye-new1"><input type="password" id="password2" placeholder="ingresa la nueva contraseña" name="new-contrasena"><img src="icons/ojo.png" alt="" class="eye" id="eye2"></div>
<div class="eye-new2"><input type="password" id="password3" placeholder="ingresa de vuelta la contraseña" name="new2-contrasena"><img src="icons/ojo.png" alt="" class="eye" id="eye3"></div><p id="error2"></p>
<div class="adverten"><span>¡Aviso! Tener en cuenta que la contraseña solamente se puede cambiar después de un lapso de tiempo de 1 mes. Tambien al cambiar de contraseña , se cerrarán todas las sesiones de todos los dispocitivos</span></div>
<div class="save-password"><input type="submit"  value="guardar"></div>
</form> ';