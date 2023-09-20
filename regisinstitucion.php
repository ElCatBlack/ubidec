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
    <meta name="description" content="Registra tu institucion, en la que pertenece">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500;600;700&family=Poppins:ital,wght@0,400;0,600;1,500&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="estilo/regisinstitucion.css">
    <link rel="icon" href="icons/logo_ubidec.png">
    <title>Registrar tu institucion</title>
</head>
<body>
    <!-- MENU -->
    <div class="menu">
        <header class="menu-content">
            <a href="index.php"><img class="logo" src="icons/logo_ubidec _cheto.png" alt=""></a>
            <div class="support">
                <div class="support-items">
                    <a href="regisinstitucion.php">Registra tu instituto</a>
                    <a href="#">Soporte</a>
                </div>

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
    <form class="contenido" action="sistem/guardarinstitu.php" method="post">

        <section class="info-general">
            <div class="info-colum1">
                
                <header class="photo-instituto">
                    <!-- <img src="img/escuela-reference.jpg" alt="" class="img-back"> -->
                             <img src="icons/camarafalse.png" alt="" class="cam-form">
                            <input type="file" name="foto" accept=".png, .jpg, .jpeg">
                </header>

                <div class="direction">
                    <h2 style="font-size: 22px;">Dirección:</h2>
                    <div class="coordinate"><span>Coordenadas:</span><input type="text" name="coordenadas" placeholder="Coordenadas geograficas" id="coordenadas"></div>
                    <div class="coordinate"><span>Dirección:</span><input type="text" name="direccion"  placeholder="Direccion" id="direccion"></div>
                    <div class="coordinate" style="flex-direction: row;justify-content: space-between;">
                        <div class="provincia">
                        <span>Provincia:</span>
                        <select name="provincia" id="">
                            <option value="1">Buenos aires</option>
                            <option value="2">Santa fe</option>
                            <option value="3">Cordoba</option>
                        </select>
                        </div>
                        <div class="localidad">
                            <span>Partido:</span>
                            <select name="localidad" id="">
                                <option value="1">La matanza</option>
                                <option value="2">Moron</option>
                                <option value="3">Ezeiza</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="instituto-contact">
                    <h2 style="font-size: 22px;">Contactos:</h2>
                    <div class="contact"><span>Télefono:</span><div class="contact-regis"><img src="icons/telefono.png" alt=""><input type="tel" name="telefono" placeholder="telefono" id="telefono"></div></div>
                    <div class="contact"><span>Correo:</span><div class="contact-regis"><img src="icons/correo.png" alt=""><input type="text" name="correo" placeholder="correo" id="correo"></div></div>
                </div>
                
                <div class="instituto-redes">
                    <h2 style="font-size: 22px;margin-bottom: 5px;">Redes:</h2>
                    <div class="redes-f">
                        <div class="red-form"><img src="icons/facebookn.png" alt=""><input type="url" name="facebook" placeholder="vinculo o link (opcional)" id="face"></div>
                        <div class="red-form"><img src="icons/instagramn.png" alt=""><input type="url" name="instagram" placeholder="vinculo o link (opcional)" id="insta"></div>
                        <div class="red-form"><img src="icons/whatsappn.png" alt=""><input type="url" name="whatsapp" placeholder="vinculo o link (opcional)" id="whats"></div>
                        <div class="red-form"><img src="icons/twittern.png" alt=""><input type="url" name="twitter" placeholder="vinculo o link (opcional)" id="twit"></div>
                        <div class="red-form"><img src="icons/youtuben.png" alt=""><input type="url" name="youtube" placeholder="vinculo o link (opcional)" id="yout"></div>
                    </div>
                    <div class="pagina"><span>Sitio web:</span><input type="url" name="pagina" placeholder="sitio web (opcional)" id="sitioweb"></div>
                </div>
            </div>
        </section>

        <section class="info-principal">
            <div class="info-colum2">
                <header class="title-instituto">
                    <input type="text" name="nom_instu" placeholder="Titulo del instituto" id="title-insti">
                </header>

                <div class="featured-info">
                    <h2>Información principal:</h2>

                    <div class="data-school">
                        <div class="data"><span>Tipo: </span><select name="tipo" id="">
                            <option value="Pública">Pública</option>
                            <option value="Privada">Privada</option>
                        </select></div>
                        <div class="data"><span>CUE:</span><input type="number" name="cue" placeholder="CUE" id="cue"></div>
                        <div class="data"><span>Nivel:</span><select name="niveles" id="">
                            <option value="Inicial">Inicial</option>
                            <option value="Primario">Primario</option>
                            <option value="Secundario">Secundario</option>
                            <option value="Técnico">Técnico</option>
                            <option value="Universidad">Universidad</option>
                        </select>
                        </div>
                        <div class="data"><span>Horarios:</span>
                            <div class="horarios" style="display: flex;flex-direction: column;/* justify-content: space-between; */">
                                <div class="t-h"><span>Mañana</span><input value="Mañana" name="horarios[]" type="checkbox"></div>
                                <div class="t-h"><span>Tarde</span><input value="Tarde" name="horarios[]" type="checkbox"></div>
                                <div class="t-h"><span>Noche</span><input value="Noche" name="horarios[]" type="checkbox"></div>
                                <div class="t-h"><span>Contraturno</span><input value="Contraturno" name="horarios[]" type="checkbox"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- decripcion -->
                <div class="description">
                        <h2>Descripcion:</h2>

                    <div class="description-instituto">
                        <textarea name="descripcion" id="desc" class="text-desc" placeholder="Descripcion propia de la institucion"></textarea>
                    </div>
                </div>

                <div class="category">
                    <h2>Modalidades:</h2>

                    <div class="degree-instituto">
                        <!-- SELECCCION DE MODALIDAD -->
                        <div class="degree">
                            <div class="select-menu">
                                <div class="select-btn">
                                    <section class="option-select">
                                        <img src="icons/interrogacion.png" alt="" class="btn-img">
                                        <span class="sBtn-text">Selecciona un titulo</span>
                                    </section>
                                    <img src="icons/flecha-abajo.png" alt="" class="arrow-img">
                                </div>
                                <ul class="options" style="z-index: 2;">
                                </ul>
                            </div>
                            <input type="hidden" name="titulos[]">
                        </div>

                        <div class="degree">
                            <div class="select-menu">
                                <div class="select-btn">
                                    <section class="option-select">
                                        <img src="icons/interrogacion.png" alt="" class="btn-img">
                                        <span class="sBtn-text">Selecciona un titulo</span>
                                    </section>
                                    <img src="icons/flecha-abajo.png" alt="" class="arrow-img">
                                </div>
                                <ul class="options" style="z-index: 2;">
                                </ul>
                            </div>
                            <input type="hidden" name="titulos[]">
                        </div>

                        <div class="degree">
                            <div class="select-menu">
                                <div class="select-btn">
                                    <section class="option-select">
                                        <img src="icons/interrogacion.png" alt="" class="btn-img">
                                        <span class="sBtn-text">Selecciona un titulo</span>
                                    </section>
                                    <img src="icons/flecha-abajo.png" alt="" class="arrow-img">
                                </div>
                                <ul class="options" style="z-index: 2;">
                                </ul>
                            </div>
                            <input type="hidden" name="titulos[]">
                        </div>

                        <div class="degree">
                            <div class="select-menu">
                                <div class="select-btn">
                                    <section class="option-select">
                                        <img src="icons/interrogacion.png" alt="" class="btn-img">
                                        <span class="sBtn-text">Selecciona un titulo</span>
                                    </section>
                                    <img src="icons/flecha-abajo.png" alt="" class="arrow-img">
                                </div>
                                <ul class="options">
                                </ul>
                            </div>
                            <input type="hidden" name="titulos[]">
                        </div>

                        <div class="degree">
                            <div class="select-menu">
                                <div class="select-btn">
                                    <section class="option-select">
                                        <img src="icons/interrogacion.png" alt="" class="btn-img">
                                        <span class="sBtn-text">Selecciona un titulo</span>
                                    </section>
                                    <img src="icons/flecha-abajo.png" alt="" class="arrow-img">
                                </div>
                                <ul class="options">
                                </ul>
                            </div>
                            <input type="hidden" name="titulos[]">
                        </div>

                        <div class="degree">
                            <div class="select-menu">
                                <div class="select-btn">
                                    <section class="option-select">
                                        <img src="icons/interrogacion.png" alt="" class="btn-img">
                                        <span class="sBtn-text">Selecciona un titulo</span>
                                    </section>
                                    <img src="icons/flecha-abajo.png" alt="" class="arrow-img">
                                </div>
                                <ul class="options">
                                </ul>
                            </div>
                            <input type="hidden" name="titulos[]">
                        </div>
                        <!-- SELECCCION DE MODALIDAD -->
                    </div>

                </div>

                <div class="characteristics"> 
                    <div class="structure">
                        <div class="title-structure"><img src="icons/colegio.png" alt=""><h2>Directivos a cargo:</h2></div>
                        <ul class="colum-info">
                            <li class="info-structure"><span>Director:</span><input type="text" name="director" placeholder="Nombre del director" id="director"></li>
                            <li class="info-structure"><span>Subdirector:</span><input type="text" name="subdirector" placeholder="Nombre del subdirector" id="subdirector"></li>
                            <li class="info-structure"><span>Secretario:</span><input type="text" name="secretario" placeholder="Nombre del secretario" id="secretario"></li>
                        </ul>
                    </div>

                    <div class="additional">
                        <div class="title-additional"><img src="icons/personas.png" alt=""><h2>¿Con que cuenta?</h2></div>
                        <ul class="colum-info2">
                            <li class="info-additional"><span>Equipo de orientacion:</span><input type="checkbox" value="✓" name="eq_orientacion"></li>
                            <li class="info-additional"><span>Centro de estudiantes:</span><input type="checkbox" value="✓" name="centro_es"></li>
                            <li class="info-additional"><span>Biblioteca:</span><input type="checkbox" value="✓" name="biblioteca"></li>
                            <li class="info-additional"><span>Patio:</span><input type="checkbox" value="✓" name="patio"></li>
                            <li class="info-additional"><span>Comedor:</span><input type="checkbox" value="✓" name="comedor"></li>
                            <li class="info-additional"><span>Servicio alimenticio:</span><input type="checkbox" value="✓" name="sr_alimen"></li>
                        </ul>
                    </div>
                </div>

                <div class="requeriments">
                        <h2>Requisitos:</h2>
                    <div class="content-requeriments">
                        <div class="info-requeriments"><textarea name="requisitos" id="reque" class="text-reque" placeholder="Requisitos para ingresar en la institucion"></textarea></div>
                    </div>
                </div>

                <div class="save-form">
                    <input type="submit" value="guardar">
                    <div class="form-error"> 
                        <p id="error1"></p>
                    </div>
                </div>

            </div>
        </section>

    </form>

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
                <li><a href="#">Términos y condiciones</a></li>
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
<script src="js/regisinstitucion.js"></script>
</html>