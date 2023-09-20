<?php

require 'sistem/conexion.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="icons/logo_ubidec.png">
    <link rel="stylesheet" href="estilo/session.css">

    <title>Iniciar sessión</title>
</head>
<body>
<section class="form">

<section class="cubo1">
    <div class="info">
            <div class="logo"><img class="ubi" src="icons/logo_ubidec.png" alt=""></div>
            <h2>UBIDEC</h2>
            <span>que es ubidec? es una pagina informa a las personas sobre institutos educativos, como el lugar, informacion propia de la escuela, contactos, etc.</span>


        <div class="contact">
            <img src="icons/correofalse.png" alt="">
            <p>ubidec29@gmail.com</p>
        </div>
        <div class="contact">
            <img src="icons/whatsapp.png" alt="">
            <p>+54 11 3242 3423</p>
         </div>

        <div class="redsocial">
            <p>Nuestras redes:</p>
                <div class="social-icons">
                    <a href="#"><img src="icons/facebook.png" alt=""></a>
                    <a href="https://www.instagram.com/ubidec_2023/?igshid=NTc4MTIwNjQ2YQ%3D%3D" target="_blank" id="insta" class="ficons"><img src="icons/instagram.png" alt=""></a>
                    <a href="#"><img src="icons/twitter.png" alt=""></a>
                </div>
        </div>

    </div>
</section>

<section class="cubo2">
        <div class="formu">

        
        <h1>INICIAR SESIÓN</h1>
        <div class="error" id="error">
            <!-- no completo el campo-->
        </div>
<form class="col-6"  method="post">

        <input type="text" placeholder="Correo" name="correo" id="correo">
        <div class="ojo">
        <input  type="password" placeholder="Contraseña" name="contrasena" id="input">
        <img src="icons/ojo.png" alt="" class="eyes" id="eye">
        </div>

        <label for="" style="margin-top: 10px;">No te acordas tu contraseña? <a href="#">click acá</a></label>

        <input type="submit" name="" value="INICIAR SESSION" id="guardar">
        
        <label for="" >No tenes cuenta? <a href="register.php">Registrate</a></label>
</form>
    </div>

</section>

</section>
<script src="js/session.js"></script>
</body>
</html>