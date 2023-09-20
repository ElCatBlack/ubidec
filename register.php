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
    <link rel="stylesheet" href="estilo/register.css">

    <title>Registro</title>
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

        
<h1>REGISTRATE</h1>

    <div class="error" id="error">
        <!-- no completo el campo-->
    </div>

<form class="col-6"  method="post" id="form">
    <div class="nom-ape">
        <input  type="text" placeholder="Nombre" name="name" id="nom">
        <input type="text" placeholder="Apellido" name="apellido" id="apellido">
    </div>
    <div class="personal-date">
        <input type="tel" placeholder="Telefono(opcional)" name="telefono" id="telefono" autocomplete="off">

        <input type="text" placeholder="Correo" name="correo" id="correo">
        
        <div class="ojo">
        <input  type="password" placeholder="Contraseña" name="contrasena" id="password1">
        <img src="icons/ojo.png" alt="" class="eye" id="eye1">
        </div>
        <div class="ojo">
        <input type="password" placeholder="Confirmar Contraseña" name="conficontrasena" id="password2">
        <img src="icons/ojo.png" alt="" class="eye" id="eye2">
        </div>
    </div>
        <input type="submit" name="" value="Guardar" id="guardar">
        
        <label for="" >Ténes cuenta? <a href="session.php">Iniciar sesion</a></label>
</form>
    </div>
</section>

</section>
<script src="js/regis.js"></script>
</body>
</html>