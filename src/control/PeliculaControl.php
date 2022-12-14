<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of LoginCont
 *
 * @author Yeoshua
 */
require_once(__ROOT__ . "/servicio/PeliculaServicio.php");

class PeliculaControl {

    private $error;

    public function getError() {
        return $this->error;
    }

    public function setError($error): void {
        $this->error = $error;
    }

    public function getCatalogoPelicula() {
        $servicio = new PeliculaServicio();
        return $servicio->get_pelicula();
    }

    public function printCatalogo($catalogo) {
        echo '<table cellpadding="0" cellspacing="0" class="center">';
        echo '<tr><th>Opción</th><th>Título</th><th>Género</th><th>Soporte</th></tr>', "\n";
        foreach ($catalogo as $value) {
            echo '<tr id="_' , $value->getId() , '" data-idgenero="', $value->getIdGenero() ,'" data-idsoporte="', $value->getIdSoporte() ,'">';
            echo '<td>', '<input type="radio" id="pelicula" name="pelicula" value="' . $value->getId() . '">', '</td>';
            echo '<td>', $value->getTitulo(), '</td>';
            echo '<td>', $value->getGenero(), '</td>';
            echo '<td>', $value->getSoporte(), '</td>';
            echo '</tr>', "\n";
        }
        echo '</table><br />';
    }

    public function createOrUpdate() {
        if (isset($_POST['submit'])) {
            if (empty($_POST['idpelicula']) || empty($_POST['idgenero']) || empty($_POST['idsoporte'])) {
                $this->setError("El nombre del catalogo o la descripcion no son validos");
            } else {

                $escapedPost = $_POST;
                $escapedPost = array_map('html_entity_decode', $escapedPost);
                $nombre = $escapedPost['nombre'];
                $id = $escapedPost['idpelicula'];
                $idgenero = $escapedPost['idgenero'];
                $idsoporte = $escapedPost['idsoporte'];

                $servicio = new PeliculaServicio();
                $test = $servicio->createOrUpdatePelicula($id, $nombre, $idgenero, $idsoporte );

                if ($test) {
                    header("Location:peliculas.php");
                } else {
                    $this->setError("No se actualizo el registro");
                }
            }
        }
    }

}
