
<div id="wrapper">
    <nav>
        <ul class="menu">
            <li class="home current">
                <a href="index.php"><span></span></a>
            </li>
            <?php
            if ($usuario->getRol() == 'administrador') {
                echo "<li><a href='peliculas.php'><span>Peliculas</span></a></li> ";
                echo "<li><a href='genero.php'><span>Genero</span></a></li>";
                echo "<li><a href='soporte.php'><span>Soporte</span></a></li>";
                echo "<li><a href=''><span>Entradas</span></a></li>";
                echo "<li><a href=''><span>Usuarios</span></a></li>";
                echo "<li><a href=''><span>Reportes</span></a></li>";
            } else if ($usuario->getRol() == 'usuario') {
                echo "<li><a href=''><span>Peliculas</span></a></li> ";
                echo "<li><a href=''><span>Rentas</span></a></li>";
                echo "<li><a href=''><span>Ventas</span></a></li>";
                echo "<li><a href=''><span>Entradas</span></a></li>";
            } else {
                echo "<li><a href=''><span>Peliculas</span></a></li> ";
            }
            ?>			
        </ul>
    </nav>
</div>