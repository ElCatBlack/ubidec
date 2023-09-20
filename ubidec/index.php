
<?php
include "sistem/conexion.php";
session_start();
$user = $_SESSION['user'];

if(isset($_SESSION['user']) ||  isset($_COOKIE['usuario'])){
    //si inicio session
}else{
    //no inicio session
    header("location:noindex.php");
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
    <meta name="description" content="Ubidec una pagina para saber y ver un listado de escuelas conla informacion de las mismas y sus respectivas ubicaciones">

    <link rel="manifest" href="src/manifest.json">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:wght@400;500&family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="estilo/index.css">
    <link rel="icon" href="icons/logo_ubidec.png">
    <title>Inicio</title>
</head>
<body>
    <!-- MENU -->
    <div class="menu">
        <header class="menu-content">
            <a href="index.php"><img class="logo" src="icons/logo_ubidec _cheto.png" alt="Logo de ubidec"></a>
            <div class="support">
                <div class="support-items">
                    <a href="regisinstitucion.php">Registra tu instituto</a>
                    <a href="#">Soporte</a>
                </div>
                <!-- <a href="session.php">Iniciar sesión</a> -->
                <!-- perfil desplegable -->
                <div class="profile-dropdown">
                    <div class="profile-dropdown-btn" >
                        <div class="profile-img">
                            <img src="img/<?php echo $user['foto_perfil'];?>" alt="Foto de perfil">
                        </div>
                        <span><?php echo $user['name']; ?></span>
                        <img src="icons/flecha-abajo.png" alt="Expandir detalles de la cuenta">
                    </div>
                    <ul class="profile-confi">
                        <li class="profile-confi-item" style="border-radius:20px 20px 0px 0px ;">
                            <a href="confi-account.php"><img src="icons/usuario.png" alt="Editar cuenta">Editar cuenta</a>
                        </li>
                        <li class="profile-confi-item">
                            <a href="confi-account.php"><img src="icons/ajustes.png" alt="Configurar">Configuraciones</a>
                        </li>
                        <li class="profile-confi-item">
                            <a href="confi-account.php"><img src="icons/interrogacion.png" alt="Ayuda y soporte">Ayuda y soporte</a>
                        </li>
                        <hr>
                        <li class="profile-confi-item" style="border-radius:0px 0px 20px 20px;">
                            <a href="sistem/cerrarsesion.php"><img src="icons/salir.png" alt="Cerrar sesion">Cerrar sesión</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        </header>

    <!-- CONTENIDO -->
    <main class="contenido">
        <!-- FILTROS -->
        <div class="back-filtro">
            <div class="filtro-content">
                <header class="tittle">
                    <span>FILTRO</span>
                    <button><img src="icons/flecha-derc.png" alt="Expandir filtros"></button>
                </header>
                <section class="sidebar">
                    <div class="item">
                        <a class="filter">Nivel Académico<button class="arrow"><img src="icons/flecha-abajo.png" alt="Expandir filtros"></button></a>
                        <div class="subitem">
                            <li class="item-li" data-option="Inicial"><div class="checkbox"><img src="icons/controlar.png" alt="Expandir filtros"></div><a class="subfilter" href="#">Inicial</a></li>
                            <li class="item-li"><div class="checkbox"><img src="icons/controlar.png" alt="Expandir filtros"></div><a class="subfilter" href="#">Primario</a></li>
                            <li class="item-li"><div class="checkbox"><img src="icons/controlar.png" alt="Expandir filtros"></div><a class="subfilter" href="#">Secundario</a></li>
                            <li class="item-li"><div class="checkbox"><img src="icons/controlar.png" alt="Expandir filtros"></div><a class="subfilter" href="#">Técnico</a></li>
                            <li class="item-li"><div class="checkbox"><img src="icons/controlar.png" alt="Expandir filtros"></div><a class="subfilter" href="#">Universitario</a></li>
                        </div>
                    </div>
                    <div class="item">
                        <a class="filter">Horarios Turnos<button class="arrow"><img src="icons/flecha-abajo.png" alt="Expandir filtros"></button></a>
                        <div class="subitem">
                            <li class="item-li"><div class="checkbox"><img src="icons/controlar.png" alt="Expandir filtros"></div><a class="subfilter" href="#">Mañana</a></li>
                            <li class="item-li"><div class="checkbox"><img src="icons/controlar.png" alt="Expandir filtros"></div><a class="subfilter" href="#">Tarde</a></li>
                            <li class="item-li"><div class="checkbox"><img src="icons/controlar.png" alt="Expandir filtros"></div><a class="subfilter" href="#">Noche</a></li>
                            <li class="item-li"><div class="checkbox"><img src="icons/controlar.png" alt="Expandir filtros"></div><a class="subfilter" href="#">Contraturno</a></li>
                        </div>
                    </div>
                    <div class="item">
                        <a class="filter">Tipo de educación<button class="arrow"><img src="icons/flecha-abajo.png" alt=""></button></a>
                        <div class="subitem">
                            <li class="item-li"  data-option="Pública"><div class="checkbox"><img src="icons/controlar.png" alt="Expandir filtros"></div><a class="subfilter" href="#">Pública</a></li>
                            <li class="item-li" data-option="Privada"><div class="checkbox"><img src="icons/controlar.png" alt="Expandir filtros"></div><a class="subfilter" href="#">Privada</a></li>
                        </div>
                    </div>
                    <div class="item">
                        <a class="filter">Modalidad<button class="arrow"><img src="icons/flecha-abajo.png" alt=""></button></a>
                        <div class="subitem">
                            <li class="item-li"><div class="checkbox"><img src="icons/controlar.png" alt="Expandir filtros"></div><a class="subfilter" href="#">Arte</a></li>
                            <li class="item-li"><div class="checkbox"><img src="icons/controlar.png" alt="Expandir filtros"></div><a class="subfilter" href="#">Bilingue</a></li>
                            <li class="item-li"><div class="checkbox"><img src="icons/controlar.png" alt="Expandir filtros"></div><a class="subfilter" href="#">Educación especial</a></li>
                        </div>
                    </div>
                    <div class="item">
                        <a class="filter">Modalidad técnico<button class="arrow"><img src="icons/flecha-abajo.png" alt=""></button></a>
                        <div class="subitem">
                            <li class="item-li"><div class="checkbox"><img src="icons/controlar.png" alt="Expandir filtros"></div><a class="subfilter" href="#">Alimentario</a></li>
                            <li class="item-li"><div class="checkbox"><img src="icons/controlar.png" alt="Expandir filtros"></div><a class="subfilter" href="#">Aeronáutica</a></li>
                            <li class="item-li"><div class="checkbox"><img src="icons/controlar.png" alt="Expandir filtros"></div><a class="subfilter" href="#">Administracion y gestión</a></li>
                            <li class="item-li"><div class="checkbox"><img src="icons/controlar.png" alt="Expandir filtros"></div><a class="subfilter" href="#">Automotores</a></li>
                            <li class="item-li"><div class="checkbox"><img src="icons/controlar.png" alt="Expandir filtros"></div><a class="subfilter" href="#">Constructor</a></li>
                            <li class="item-li"><div class="checkbox"><img src="icons/controlar.png" alt="Expandir filtros"></div><a class="subfilter" href="#">Constructor naval</a></li>
                        </div>
                    </div>
                    
                </section>
            </div>
        </div>

        <!-- CONTENIDO ESCUELAS-->
        <div class="back-content">
            <main class="school-content">
                <!-- buscador y filtro-->
                <div class="search-select">

                    <div class="search-insti">
                        <button><img  src="icons/searchblack.png" alt="Buscar"></button>
                        <input type="text" placeholder="Buscar institucion...">
                    </div>
                    
                    <div class="select-options">
                        <div class="select">
                            <button class="option">
                                <span>seleccione una provincia</span>
                                <img src="icons/flecha-abajo.png" alt="Filtro provincia">
                            </button>
                            <div class="drop-location">
                                <!-- SELECCIONA UNA PROVINCIA -->
                                <ul class="select-provincia">
                                    <li>Buenos Aires</li>
                                    <li>La Pampa</li>
                                    <li>Córdoba</li>
                                    <li>Santa Fe</li>
                                    <li>Corrientes</li>
                                </ul>
                            </div>
                        </div>

                        <div class="select">
                            <button class="option">
                                <span>seleccione un partido</span>
                                <img src="icons/flecha-abajo.png" alt="Filtro localidad">
                            </button>
                            <div class="drop-localida">
                                <!-- SELECCIONA UNA LOCALIDAD -->
                                <ul class="select-localidad">
                                    <li>La Matanza</li>
                                    <li>Quilmes</li>
                                    <li>Móron</li>
                                    <li>Matadero</li>
                                    <li>La Plata</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <!--ACA CARGAN LAS ESCUELAS-->
                <section class="load-insti"></section>
                <!--ACA CARGAN LAS ESCUELAS-->
            </main>
        </div>
    </main>

    <!-- CONTACTOS-->
    <footer class="menu-down">

        <header class="fcabezera">
            <div class="flogo">
                <img src="icons/logo_ubidec _cheto.png" alt="">
            </div>
            <div class="redes">
                <a href="#" class="ficons"><img src="icons/facebook.png" alt="Facebook"></a>
                <a href="https://www.instagram.com/ubidec_2023/?igshid=NTc4MTIwNjQ2YQ%3D%3D" target="_blank" id="insta" class="ficons"><img src="icons/instagram.png" alt=""></a>
                <a href="#" class="ficons"><img src="icons/twitter.png" alt="Twitter"></a>
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
                <li><a href="#"><img src="icons/correofalse.png" alt="Correo"> ubidec21@gmail.com</a></li>
                <li><a href="#"><img src="icons/whatsapp.png" alt="Whatsapp"> +54 2131 1233</a></li>
            </div>
            
        </section>
    </footer>

</body>
<script src="js/index.js"></script>
<script src="js/recibir-insti.js"></script>
<script src="js/search-filter.js"></script>
</html>