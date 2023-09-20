<?php 
include "sistem/conexion.php";
session_start();
$user = $_SESSION['user'];

if(isset($_SESSION['user'])){
    //si inicio session
}else{
    //no inicio session
    header("location:index.php");
    // echo $user['name']="inicie sesion";
    // echo $user['foto']="#";
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
        
        // TRAE LO QUE CUNETA EN LA INSTITUCION
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

    <link rel="manifest" href="src/manifest.json">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:wght@400;500&family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="estilo/institucion.css">
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
    <main class="contenido">

        <section class="info-general">
            <div class="info-colum1">
                
                <header class="photo-instituto">
                    <img src="img/escuela-reference.jpg" alt="">
                </header>

                <div class="direction">
                    <h2 style="font-size: 22px;">Dirección:</h2>
                    <div class="coordinate"><span>Coordenadas:</span><p><?php echo $instituto['coordenadas']; ?></p></div>
                    <div class="coordinate"><span>Dirección:</span><p><?php echo $instituto['direccion']; ?></p></div>
                    <div class="coordinate"><span>Provincia:</span><p><?php echo ''.$provin.', '.$loca.'' ?></p></div>
                </div>

                <div class="instituto-contact">
                    <h2 style="font-size: 22px;">Contactos:</h2>
                    <div class="contact"><span>Télefono:</span><a href="#"><img src="icons/telefono.png" alt=""><?php echo $instituto['telefono']; ?></a></div>
                    <div class="contact"><span>Correo:</span><a href="#"><img src="icons/correo.png" alt=""><?php echo $instituto['correo']; ?></a></div>
                </div>
                
                <div class="instituto-redes">

                <!-- REDES -->
                <?php if (!empty($redes)) : ?>
                    <h2 style="font-size: 22px; margin-bottom: 5px;">Redes:</h2>
                    <div class="redes">
                        <?php foreach ($redes as $red) : ?>
                            <a href="<?php echo $red['link']; ?>" style="<?php echo $red['color']; ?>;" target="_blank">
                                <img src="<?php echo $red['icon']; ?>" alt=""><?php echo $red['tipo']; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                    <!-- PAGINA WEB -->
                    <?php if (!empty($instituto['pagina'])) : ?>
                        <div class="pagina"><span>Sitio web:</span><a href="<?php echo $instituto['pagina']; ?>" target="_blank"><?php echo $instituto['pagina']; ?></a></div>
                    <?php endif; ?>

                </div>
            </div>
        </section>

        <section class="info-principal">
            <div class="info-colum2">
                <header class="title-instituto">
                    <h1><?php echo $instituto['nom_instu']; ?></h1>
                </header>

                <div class="featured-info">
                    <h2>Información principal:</h2>

                    <div class="data-school">
                        <div class="data"><span>Tipo:</span><p><?php echo $instituto['tipo']; ?></p></div>
                        <div class="data"><span>CUE:</span><p><?php echo $instituto['cue']; ?></p></div>
                        <div class="data"><span>Nivel:</span><p><?php echo $instituto['niveles']; ?></p></div>
                        <div class="data"><span>Horarios:</span><p><?php echo $instituto['horarios']; ?></p></div>
                    </div>
                </div>

                <div class="description">
                        <h2>Descripcion:</h2>

                    <div class="description-instituto">
                        <p>
                            <?php echo $instituto['descripcion']; ?>
                        </p>
                    </div>
                </div>

                <!-- Modalidades -->
                    <?php if (!empty($modalidad)) : ?>
                    <div class="category">
                     <h2>Modalidades:</h2>
                        <div class="degree-instituto">
                            <?php foreach ($modalidad as $modalidaditem) : ?>
                            <div class="degree">
                                <img src="<?php echo $modalidaditem['icon']; ?>" alt="">
                                <p><?php echo $modalidaditem['modalidad']; ?></p>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                <div class="characteristics"> 
                    <div class="structure">
                        <div class="title-structure"><img src="icons/colegio.png" alt=""><h2>Directivos a cargo:</h2></div>
                        <ul class="colum-info">
                            <li class="info-structure"><span>Director:</span><p><?php echo $instituto['director']; ?></p></li>
                            <li class="info-structure"><span>Subdirector:</span><p><?php echo $instituto['subdirector']; ?></p></li>
                            <li class="info-structure"><span>Secretario:</span><p><?php echo $instituto['secretario']; ?></p></li>
                        </ul>
                    </div>

                    <div class="additional">
                        <div class="title-additional"><img src="icons/personas.png" alt=""><h2>¿Con que cuenta?</h2></div>
                        <ul class="colum-info2">
                            <li class="info-additional"><span>Equipo de orientacion:</span><p><?php echo ($cuenta['eq_orientacion'] == 1) ? '✓' : '✗'; ?></p></li>
                            <li class="info-additional"><span>Centro de estudiantes:</span><p><?php echo ($cuenta['centro_es'] == 1) ? '✓' : '✗'; ?></p></li>
                            <li class="info-additional"><span>Biblioteca:</span><p><?php echo ($cuenta['biblioteca'] == 1) ? '✓' : '✗'; ?></p></li>
                            <li class="info-additional"><span>Patio:</span><p><?php echo ($cuenta['patio'] == 1) ? '✓' : '✘'; ?></p></li>
                            <li class="info-additional"><span>Comedor:</span><p><?php echo ($cuenta['comedor'] == 1) ? '✓' : '✗'; ?></p></li>
                            <li class="info-additional"><span>Servicio alimenticio:</span><p><?php echo ($cuenta['sr_alimen'] == 1) ? '✓' : '✗'; ?></p></li>
                        </ul>
                    </div>
                </div>

                <div class="requeriments">
                        <h2>Requisitos:</h2>
                    <div class="content-requeriments">
                        <div class="info-requeriments"><span><?php echo $instituto['requisitos']; ?></span></div>
                    </div>
                </div>

            </div>
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
</html>