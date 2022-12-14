<?php
require_once("inicio.php");
require_once(__ROOT__ . "/control/SessionControl.php");
require_once(__ROOT__ . "/modelo/UsuarioModelo.php");
require_once(__ROOT__ . "/control/GeneroControl.php");
SessionControl::testSession();
SessionControl::checkSession();

$usuario = unserialize(SessionControl::get("USUARIO"));

if ($usuario->getRol() != 'administrador') {
    SessionControl::destroy();
    header("Location:../index.php");
}



$control = new GeneroControl();
$catalogo = $control->getCatalogoGenero();

$control->createOrUpdate();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">        
        <title>Género</title>
        <link href="css/master.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/menu.css" media="all">
        <link rel="stylesheet" type="text/css" href="css/login.css" media="all">
        <script src="js/cat_genero.js" defer></script>
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
                    <p class="seccion-titulo">Catálogo de géneros</p> 

                    <?php $control->printCatalogo($catalogo); ?>

                    <div id="login" class="center">
                        <h2>Operaciones</h2>
                        <p>
                            <input type="button" id="nuevo"  value="Nuevo">
                            <input type="button" id="modificar" value="Modificar">
                        </p> 
                        <form action="" method="post">
                            <input type="hidden" value="" id="idgenero" name="idgenero">
                            <label>Nombre :</label>
                            <input id="nombre" name="nombre" placeholder="Nombre del género" type="text" disabled>
                            <label>Descripción :</label>

                            <input id="descripcion" name="descripcion" placeholder="Descripción del genero" type="text" disabled>
                            <input name="submit" type="submit" value=" Guardar ">
                        </form>
                    </div>


                </seccion>
            </div>
            <div class="footer">

            </div>
        </div>
    </body>
</html>