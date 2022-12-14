<?php
require_once("vista/inicio.php");
require_once(__ROOT__ . "/control/LoginControl.php");
require_once(__ROOT__ . "/control/SessionControl.php");

SessionControl::init();
$lgCtrl = new LoginControl();
$lgCtrl->testLogin();
$error = $lgCtrl->getError();

date_default_timezone_set('America/Mexico_City');
setlocale(LC_ALL, "es_MX");

$usuario = unserialize(SessionControl::get("USUARIO"));

if ($usuario != false && $usuario->getNombre() != null) {
    header("location: vista/perfil.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"> 
        <title>Acceso</title>
        <link href="vista/css/login.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="wrap">

            <div class="container" >
                <div class="header">
                    <a href="#">
                        <img src="vista/img/logo.jpg" alt="Cinetix" name="Insert_logo" width="612" height="206" />
                    </a> 
                    <!-- end .header --></div>


                <div>
                    <div id="main">

                        <div id="login" class="center">
                            <h2>Ingreso</h2>
                            <form action="" method="post">
                                <label>Usuario :</label>
                                <input id="name" name="username" placeholder="usuario" type="text">
                                <label>Clave :</label>

                                <input id="password" name="password" placeholder="**********" type="password">
                                <input name="submit" type="submit" value=" Login ">
                                <span><?php echo $error; ?></span>
                            </form>
                        </div>
                    </div>

                    <!-- end .container --></div>
                <div class="footer">

                    <!-- end .footer --></div>
            </div>
    </body>
</html>