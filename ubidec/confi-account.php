<?php 
include "sistem/conexion.php";
session_start();
$user = $_SESSION['user'];

if(isset($_SESSION['user'])){
    //si inicio session
}else{
    //no inicio session
    header("location:noindex.php");
    echo $user['name']="inicie sesion";
    echo $user['foto']="#";
    echo $user['telefono']="sin numero de telefono";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:wght@400;500&family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
   
    <link rel="stylesheet" href="estilo/editarperfil.css">
    <link rel="stylesheet" href="estilo/confi.css">
    <link rel="icon" href="icons/logo_ubidec.png">
    <title>Detalles de la cuenta</title>
</head>
<body>
    <!-- MENU -->
    <div class="menu">
        <header class="menu-content">
            <a href="index.php"><img class="logo" src="icons/logo_ubidec _cheto.png" alt="logo de ubidec"></a>
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
                        <img src="icons/flecha-abajo.png" alt="desplegar detalles de la cuenta">
                    </div>
                    <ul class="profile-confi">
                        <li class="profile-confi-item" style="border-radius:20px 20px 0px 0px ;">
                            <a href="index.php"><img src="icons/hogar.png" alt="">Inicio</a>
                        </li>
                        <li class="profile-confi-item">
                            <a href="editarperfil.php"><img src="icons/ajustes.png" alt="">Configuraciones</a>
                        </li>
                        <li class="profile-confi-item">
                            <a href="editarperfil.php"><img src="icons/interrogacion.png" alt="">Ayuda y soporte</a>
                        </li>
                        <hr>
                        <li class="profile-confi-item" style="border-radius:0px 0px 20px 20px;">
                            <a href="sistem/cerrarsesion.php"><img src="icons/salir.png" alt="">Cerrar sesión</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        </header>

    <!-- CONTENIDO -->
    <main class="contenido">
        <section class="confi-account">
            <div class="confi-bar">
            <div class="confi-item active"><button id="btnCuenta"><img src="icons/usuario.png" alt="">Detalles de la cuenta</button></div>
            <div class="confi-item"><button id="btnSeguridad"><img src="icons/candado.png" alt="">Contraseña y seguridad</button></div>
            <div class="confi-item"><button id="btnInstitucion"><img src="icons/escuela-edit.png" alt="">Editar institucion</button></div>
            <div class="confi-item"><button id="btnConfig"><img src="icons/tuerca.png" alt="">Configuración</button></div>
            <div class="confi-item"><button id="btnSoporte"><img src="icons/interrogacion.png" alt="">Ayuda y soporte</button></div>
            <div class="confi-item"><button id="btnPrivacidad"><img src="icons/escudo.png" alt="">Políticas y privacidad</button></div>
        </section>

        <section class="confi-content">

        <main class="profile-content">
            <div class="foto-profile">
                <img src="img/<?php echo $user['foto_perfil'];?>" alt="">
                
            </div>

            <div class="username-profile">
                <div class="info-edit">
                    <h1>Informacion de la cuenta</h1>
                    <button >editar perfil</button>
                </div>
                <div class="data-profile">
                    <div class="data">
                        <span>Nombre:</span>
                        <p><?php echo $user['name'];?></p>
                    </div>
                    <div class="data">
                        <span>Apellido:</span>
                        <p><?php echo $user['apellido'];?></p>
                    </div>
                    <div class="data">
                        <span>Telefono:</span>
                        <p><?php echo $user['telefono'];?></p>
                    </div>
                    <div class="data">
                        <span>Correo:</span>
                        <p><?php echo $user['correo'];?></p>
                    </div>
                </div>
            </div>

            <!-- <div class="Info-escuela">
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
            </div> -->
            <!-- MODAL EDITAR PERFIL -->
            <div class="modal">
                <div class="modal-target">
                <div class="modal-header">
                    <div class="cerrar-btn"><button>X</button></div>
                    <h2>Editar perfil</h2>
                </div>
                <form class="modal-content">
                    <div class="perfil-photo">
                        <div class="old-photo"><img src="img/<?php echo $user['foto_perfil'];?>" alt=""></div>
                        <div class="new-photo">
                            <img src="icons/camarafalse.png" alt="">
                            <input type="file" name="foto_perfil" accept=".png, .jpg, .jpeg">
                        </div>
                    </div>
                    <div class="form-edit">
                        <div class="error"></div>
                        <input type="text" name="" id="nom" autocomplete="off" placeholder="<?php echo $user['name'];?>">
                        <input type="text" name="" id="apellido" autocomplete="off" placeholder="<?php echo $user['apellido'];?>">
                        <input type="text" name="" id="telefono" autocomplete="off" placeholder="<?php echo $user['telefono'];?>">
                        <input type="submit" value="Guardar">
                    </div>
                </form>
                </div>
            </div>
            </main>

        </section>

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
<script src="js/cuenta/confi-account.js"></script>
<script src="js/cuenta/edit-contra.js"></script>
<script src="js/cuenta/editarperfil.js"></script>
</html>