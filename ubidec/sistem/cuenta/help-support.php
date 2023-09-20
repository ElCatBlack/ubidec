<?php
include "../conexion.php";
session_start();
$user = $_SESSION['user'];


echo '            <main class="ayudaS-content">
<header class="help-contact">
    <div class="title-contact"><h2>Nuestros contactos para otras dudas:</h2></div>
    <ul class="we-contact">
        <li>Correo: ubidec21@gmail.com</li>
        <li>Teléfono: +54 2131 1233</li>
    </ul>
</header>
<div class="questions">
    <div class="title-questions"><h2>Preguntas Frecuentes:</h2></div>
    <div id="container">
    <section class="item-questions">
        <a class="report">¿Como reporto un error?<button class="arrow"><img src="icons/flecha-abajo.png" alt=""></button></a>
        <div class="sub-report">
            <p>- Si encontraste un error en la pagina o sufrio alguna, necesitamos que nos escribas por correo eletronico como encontro o llego a el error y si es posible pasar una captura del problema</p>
        </div>
    </section>
    <section class="item-questions">
        <a class="report">¿Como registro una escuela?<button class="arrow"><img src="icons/flecha-abajo.png" alt=""></button></a>
        <div class="sub-report">
            <p>- Para registrar una escuela es necesario registrarse y un encargado se va encargar de verificar su cuenta, una vez verificada tendra una opcion arriba que dice: registrar institucion o en detalles de la cuenta tiene un aparatado de editar instituciones, luego rellene los datos que sean necesarios</p>
        </div>
    </section>
    <section class="item-questions">
        <a class="report">¿Como funciona Ubidec?<button class="arrow"><img src="icons/flecha-abajo.png" alt=""></button></a>
        <div class="sub-report">
            <p>- Si encontraste un error en la pagina o sufrio alguna, necesitamos que nos escribas por correo como encontro o llego a el error y si es posible pasar una captura del problema</p>
        </div>
    </section>
    <section class="item-questions">
        <a class="report">¿Como podes ayudarnos a mejorar nuestro sitio?<button class="arrow"><img src="icons/flecha-abajo.png" alt=""></button></a>
        <div class="sub-report">
            <p>- Si encontraste un error en la pagina o sufrio alguna, necesitamos que nos escribas por correo como encontro o llego a el error y si es posible pasar una captura del problema</p>
        </div>
    </section>
    </div>
</div>
</main>  ';