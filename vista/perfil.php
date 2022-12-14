<?php
require_once("inicio.php");
require_once(__ROOT__ . "/control/SessionControl.php");
require_once(__ROOT__ . "/modelo/UsuarioModelo.php");

SessionControl::testSession();
SessionControl::checkSession();

$usuario = unserialize(SessionControl::get("USUARIO"));
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">        
        <title>Panel de Control</title>
        <link href="css/master.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/menu.css" media="all" />
    </head>
    <body>
        <div id="wrap">
            <div class="container" >
                <div class="header">
                    <a href="#">
                        <img src="img/logo.jpg" alt="logo" name="logo" width="612" height="206" />
                    </a> 

                </div>

                <div id="profile">
                    <?php
             echo "<strong>Bienvenido: </strong><em> " . $usuario->getNombre() . " </em><strong>/  Rol </strong>: <em> " . $usuario->getRol() . " </em>";
            ?>
                    <strong id="logout"><a href="logout.php">Salir</a></strong>
                </div>
                <?php require_once("menubar.php"); ?>
                <seccion>
                    <p class="seccion-titulo"> Bienvenido</p>       

                </seccion>
            </div>
            <div class="footer">

            </div>
        </div>
    </body>
</html>