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

//si trajo un instituto
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $institutoID = intval($_GET['id']);

    // Consulta para obtener los detalles del instituto con el ID proporcionado
    $sql = "SELECT institutos.id, provincias.provincia AS provi, institutos.provincia, localidades.localidad AS locas, institutos.localidad, 
    coordenadas, direccion, telefono, correo, pagina,nom_instu, tipo, cue,niveles, horarios, descripcion, director, subdirector, secretario, requisitos FROM institutos 
    INNER JOIN provincias ON provincias.id=institutos.provincia
    INNER JOIN localidades ON localidades.id=institutos.localidad 
    WHERE institutos.id = $institutoID";
    $r = $con->query($sql);

    if ($r !== false && $r->num_rows > 0) {
        $instituto = $r->fetch_assoc();
        $provin = $instituto['provi'];
        $loca = $instituto['locas'];
        
        //OBTENER LOS HORARIOS
        $horarios = $instituto['horarios'];
        //divide la cadena de los horarios
        $horariosArray = explode('/', $horarios);

        // marca los checkbox
        $mañanaCheck = in_array('Mañana', $horariosArray) ? 'checked' : '';//se utiliza el in_array para verificar si horario coincide con la variable $horariosArray si esta presente se deja el checked sino se deja vacio
        $tardeCheck = in_array('Tarde', $horariosArray) ? 'checked' : '';
        $nocheCheck = in_array('Noche', $horariosArray) ? 'checked' : '';
        $contraturnoCheck = in_array('Contraturno', $horariosArray) ? 'checked' : '';

        // TRAE LO QUE CUENTA EN LA INSTITUCION
        $sql_cuenta = "SELECT * FROM ins_cuenta WHERE id_institucion = $institutoID";
        $r_cuenta = $con->query($sql_cuenta);
        if ($r_cuenta !== false) {
            $cuenta = $r_cuenta->fetch_assoc();
        } else {
            // Error en la consulta de cuentas
            error_log("Error en la consulta de cuentas: " . $con->error);
            header("location:index.php");
            exit;
        }

        // TRAE LAS MODALIDADES
        $sql_modalidad = "SELECT modalidades.modalidad, modalidades.icon FROM modalidades
        INNER JOIN mod_insti ON modalidades.id = mod_insti.id_modalidad
        WHERE mod_insti.id_institucion = $institutoID";

        $r_modalidad = $con->query($sql_modalidad);
        if ($r_modalidad !== false) {
            $modalidad = [];
            while ($row = $r_modalidad->fetch_assoc()) {
                $modalidad[] = $row;
            }
        } else {
            // Error en la consulta de modalidades
            error_log("Error en la consulta de modalidades: " . $con->error);
            header("location:index.php");
            exit;
        }

        // TRAE REDES SOCIALES
        $sql_redes = "SELECT redes.tipo, redes.link, redes.color, redes.icon FROM redes
        INNER JOIN institutos ON redes.id_institucion = institutos.id
        WHERE institutos.id = $institutoID";
        $r_redes = $con->query($sql_redes);

        if ($r_redes !== false) {
            $redes = [];
            while ($row = $r_redes->fetch_assoc()) {
                $redes[] = $row;
            }
        } else {
            // Error en la consulta de redes sociales
            error_log("Error en la consulta de redes sociales: " . $con->error);
            header("location:index.php");
            exit;
        }
        //funcion de traer la red segun su tipo y link correspondiente
        function obtenerLinkRed($tipo, $redes) {//la variable $tipo guarda la red('facebook', 'instagram', etc) la variable $redes trae los datos de la tabla
            foreach ($redes as $red) {//se hace un ciclo para que recorra por toda la tabla
                if ($red['tipo'] === $tipo) {//verifica si el campo tipo de la tabla coinciden con la variable $tipo
                    return $red['link'];//lo devuelve el valor del campo
                }
            }
            return ''; // si no encuentra una red devuelve una cadena vacia
        }

    //si no pudo encontrar la institucion
    } else {
        header("location:index.php");
        exit;
    }
} else {
    header("location:index.php");
    exit;
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
    <form class="contenido" action="sistem/updateinstitu.php" method="post">

        <section class="info-general">
            <div class="info-colum1">
                
                <header class="photo-instituto">
                    <!-- <img src="img/escuela-reference.jpg" alt="" class="img-back"> -->
                             <img src="icons/camarafalse.png" alt="" class="cam-form">
                            <input type="file" name="foto" accept=".png, .jpg, .jpeg">
                </header>

                <div class="direction">
                    <h2 style="font-size: 22px;">Dirección:</h2>
                    <div class="coordinate"><span>Coordenadas:</span><input type="text" name="coordenadas" placeholder="Coordenadas geograficas" value="<?php echo $instituto['coordenadas']; ?>"></div>
                    <div class="coordinate"><span>Dirección:</span><input type="text" name="direccion"  placeholder="Direccion" value="<?php echo $instituto['direccion']; ?>"></div>
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
                    <div class="contact"><span>Télefono:</span><div class="contact-regis"><img src="icons/telefono.png" alt=""><input type="text" name="telefono" placeholder="telefono" value="<?php echo $instituto['telefono']; ?>"></div></div>
                    <div class="contact"><span>Correo:</span><div class="contact-regis"><img src="icons/correo.png" alt=""><input type="text" name="correo" placeholder="correo" value="<?php echo $instituto['correo']; ?>"></div></div>
                </div>
                
                <div class="instituto-redes">
                    <h2 style="font-size: 22px;margin-bottom: 5px;">Redes:</h2>
                    <div class="redes-f">
                        <div class="red-form"><img src="icons/facebookn.png" alt=""><input type="url" name="facebook" placeholder="vinculo o link (opcional)" value="<?php echo obtenerLinkRed('facebook', $redes); ?>"></div>
                        <div class="red-form"><img src="icons/instagramn.png" alt=""><input type="url" name="instagram" placeholder="vinculo o link (opcional)" value="<?php echo obtenerLinkRed('instagram', $redes); ?>""></div>
                        <div class="red-form"><img src="icons/whatsappn.png" alt=""><input type="url" name="whatsapp" placeholder="vinculo o link (opcional)" value="<?php echo obtenerLinkRed('whatsapp', $redes); ?>"></div>
                        <div class="red-form"><img src="icons/twittern.png" alt=""><input type="url" name="twitter" placeholder="vinculo o link (opcional)" value="<?php echo obtenerLinkRed('twitter', $redes); ?>"></div>
                        <div class="red-form"><img src="icons/youtuben.png" alt=""><input type="url" name="youtube" placeholder="vinculo o link (opcional)" value="<?php echo obtenerLinkRed('youtube', $redes); ?>"></div>
                    </div>
                    <div class="pagina"><span>Sitio web:</span><input type="url" name="pagina" placeholder="sitio web (opcional)" value="<?php echo $instituto['pagina']; ?>"></div>
                </div>
            </div>
        </section>

        <section class="info-principal">
            <div class="info-colum2">
                <header class="title-instituto">
                    <input type="text" name="nom_instu" id="" placeholder="Titulo del instituto" value="<?php echo $instituto['nom_instu']; ?>">
                </header>

                <div class="featured-info">
                    <h2>Información principal:</h2>

                    <div class="data-school">
                        <div class="data"><span>Tipo: <select name="tipo" id="">
                            <option value="Pública">Pública</option>
                            <option value="Privada">Privada</option>
                        </select></div>
                        <div class="data"><span>CUE:</span><input type="number" name="cue" placeholder="CUE" value="<?php echo $instituto['cue']; ?>"></div>
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
                                <div class="t-h"><span>Mañana</span><input value="Mañana" name="horarios[]" type="checkbox" <?php echo $mañanaCheck; ?>></div>
                                <div class="t-h"><span>Tarde</span><input value="Tarde" name="horarios[]" type="checkbox" <?php echo $tardeCheck; ?>></div>
                                <div class="t-h"><span>Noche</span><input value="Noche" name="horarios[]" type="checkbox" <?php echo $nocheCheck; ?>></div>
                                <div class="t-h"><span>Contraturno</span><input value="Contraturno" name="horarios[]" type="checkbox" <?php echo $contraturnoCheck; ?>></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- decripcion -->
                <div class="description">
                        <h2>Descripcion:</h2>

                    <div class="description-instituto">
                        <textarea name="descripcion" id="desc" class="text-desc" placeholder="Descripcion propia de la institucion" ><?php echo $instituto['descripcion']; ?></textarea>
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
                            <li class="info-structure"><span>Director:</span><input type="text" name="director" placeholder="Nombre del director" value="<?php echo $instituto['director']; ?>"></li>
                            <li class="info-structure"><span>Subdirector:</span><input type="text" name="subdirector" placeholder="Nombre del subdirector" value="<?php echo $instituto['subdirector']; ?>"></li>
                            <li class="info-structure"><span>Secretario:</span><input type="text" name="secretario" placeholder="Nombre del secretario" value="<?php echo $instituto['secretario']; ?>"></li>
                        </ul>
                    </div>

                    <div class="additional">
                        <div class="title-additional"><img src="icons/personas.png" alt=""><h2>¿Con qué cuenta?</h2></div>
                            <ul class="colum-info2">
                                <li class="info-additional"><span>Equipo de orientación:</span><input type="checkbox" value="1" name="eq_orientacion" <?php if ($cuenta['eq_orientacion'] == 1) echo 'checked'; ?>></li>
                                <li class="info-additional"><span>Centro de estudiantes:</span><input type="checkbox" value="1" name="centro_es" <?php if ($cuenta['centro_es'] == 1) echo 'checked'; ?>></li>
                                <li class="info-additional"><span>Biblioteca:</span><input type="checkbox" value="1" name="biblioteca" <?php if ($cuenta['biblioteca'] == 1) echo 'checked'; ?>></li>
                                <li class="info-additional"><span>Patio:</span><input type="checkbox" value="1" name="patio" <?php if ($cuenta['patio'] == 1) echo 'checked'; ?>></li>
                                <li class="info-additional"><span>Comedor:</span><input type="checkbox" value="1" name="comedor" <?php if ($cuenta['comedor'] == 1) echo 'checked'; ?>></li>
                                <li class="info-additional"><span>Servicio alimenticio:</span><input type="checkbox" value="1" name="sr_alimen" <?php if ($cuenta['sr_alimen'] == 1) echo 'checked'; ?>></li>
                            </ul>
                    </div>
                </div>

                <div class="requeriments">
                        <h2>Requisitos:</h2>
                    <div class="content-requeriments">
                        <div class="info-requeriments"><textarea name="requisitos" id="reque" class="text-reque" placeholder="Requisitos para ingresar en la institucion"><?php echo $instituto['requisitos']; ?></textarea></div>
                    </div>
                </div>

                <div class="save-form">
                    <input type="hidden" name="instituto_id" value="<?php echo $institutoID; ?>">
                    <input type="submit" value="actualizar">
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
<script src="js/regisinstitucion.js"></script>
</html>