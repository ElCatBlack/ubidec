<?php 
include "sistem/conexion.php";
session_start();
$user = $_SESSION['user'];

if(isset($_SESSION['user'])){
    //si inicio session
}else{
    //no inicio session
    header("location:register.php");
    echo $user['name']="inicie sesion";
    echo $user['foto']="#";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="estilo/prueba.css">
    <link rel="icon" href="icons/logo_ubidec.png">
    <title>Inicio</title>
</head>
<body>
    <!-- MENU -->
    <div class="menu">
        <header class="menu-content">
            <a href="index.php"><img class="logo" src="icons/logo_ubidec _cheto.png" alt=""></a>
            <div class="support">
                <div class="support-items">
                    <a href="register.php">Registra tu instituto</a>
                    <a href="#">Soporte</a>
                </div>
                <a href="session.php">Iniciar sesión</a>
                
            </div>
        </div>
        </header>

    <!-- CONTENIDO -->
    <main class="contenido">

    </main>

    <!-- CONTACTOS-->
    <footer class="menu-down">

    <header class="fcabezera">
                <div class="flogo">
                    <img src="icons/logo_ubidec _cheto.png" alt="">
                </div>
                <div class="redes">
                    <a href="#" class="ficons"><img src="icons/facebook.png" alt=""></a>
                    <a href="https://www.instagram.com/ubidec_2023/?igshid=NTc4MTIwNjQ2YQ%3D%3D" target="_blank" id="insta" class="ficons"><img src="icons/instagram.png" alt=""></a>
                    <a href="#" class="ficons"><img src="icons/twitter.png" alt=""></a>
                </div>
            </header>

        <section class="footer">
            <div class="footer-links" style="width: 340px;">
                <h2>NOSOTROS</h2>
                    <span>que es ubidec? es una pagina informa a las personas sobre institutos educativos, como el lugar, informacion propia de la escuela, contactos, etc.</span>
            </div>
            <div class="footer-links">
                <h2>POLÍTICAS</h2>
                <li><a href="#">Térmios y condiciones</a></li>
                <li><a href="#">Política de privacidad</a></li>
                <li><a href="#">Preferencia cookies</a></li>
            </div>
            <div class="footer-links">
                <h2>CONTACTOS</h2>
                <li><a href="#"><img src="icons/correofalse.png" alt=""> ubidec21@gmail.com</a></li>
                <li><a href="#"><img src="icons/whatsapp.png" alt=""> +54 2131 1233</a></li>
            </div>
            
        </section>
    </footer>

</body>
<script src="js/index.js"></script>
</html>