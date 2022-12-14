<?php
require_once("inicio.php");
require_once(__ROOT__ . "/control/SessionControl.php");
require_once(__ROOT__ . "/modelo/UsuarioModelo.php");
require_once(__ROOT__ . "/control/PeliculaControl.php");
require_once (__ROOT__ . "/control/GeneroControl.php");
require_once (__ROOT__ . "/control/SoporteControl.php");
SessionControl::testSession();
SessionControl::checkSession();

$usuario = unserialize(SessionControl::get("USUARIO"));

if ($usuario->getRol() != 'administrador') {
    SessionControl::destroy();
    header("Location:../index.php");
}



$control = new PeliculaControl();
$catalogo = $control->getCatalogoPelicula();
$control_genero = new GeneroControl();
$catalogo_genero = $control_genero->getCatalogoGenero();
$control_soporte = new SoporteControl();
$catalogo_soporte = $control_soporte->getCatalogoSoporte();

$control->createOrUpdate();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">        
        <title>Peliculas</title>
        <link href="css/master.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/menu.css" media="all">
        <link rel="stylesheet" type="text/css" href="css/login.css" media="all">
        <script src="js/cat_pelicula.js" defer></script>
    </head>
    <style>
        select {
     background: transparent;
     border: none;
     font-size: 14px;
     height: 30px;
     padding: 5px;
     width: 250px;
  }
    </style>
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
                    <p class="seccion-titulo">Catálogo de peliculas</p> 

                    <?php $control->printCatalogo($catalogo); ?>

                    <div id="login" class="center">
                        <h2>Operaciones</h2>
                        <p>
                            <input type="button" id="nuevo"  value="Nuevo">
                            <input type="button" id="modificar" value="Modificar">
                        </p> 
                        <form action="" method="post">
                            <input type="hidden" value="" id="idpelicula" name="idpelicula">
                            <label>Titulo :</label>
                            <input id="nombre" name="nombre" placeholder="Titulo" type="text" disabled>

                            <?php $control_genero->printCheck($catalogo_genero); ?>

                            <?php $control_soporte->printCheck($catalogo_soporte); ?>

                            <input type="submit" name="submit" id="nuevo"  value="Guardar" >
                            
                        </form>
                        <span><?php echo $control->getError(); ?></span>
                    </div>


                </seccion>
            </div>
            <div class="footer">

            </div>
        </div>
    </body>
</html>