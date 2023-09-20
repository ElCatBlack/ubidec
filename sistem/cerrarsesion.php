<?php
session_start();
// if(isset($_SESSION['usuario'])) {
//     session_destroy();
// }
session_destroy();
header("location: /ubidec/session.php");