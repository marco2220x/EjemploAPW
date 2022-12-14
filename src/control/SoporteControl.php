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
require_once(__ROOT__ . "/servicio/SoporteServicio.php");

class SoporteControl {

    private $error;

    public function getError() {
        return $this->error;
    }

    public function setError($error): void {
        $this->error = $error;
    }

    public function getCatalogoSoporte() {
        $servicio = new SoporteServicio();
        return $servicio->get_soporte();
    }
    
    public function printCheck($catalogo) {
        echo '<label>Escoge el soporte de tu pelicula:</label>';
        echo '<select id="soporte" name="idsoporte" disabled>';
        foreach ($catalogo as $value){
            echo ' <option value="',$value->getId(),'">',$value->getNombre(),'</option>';
        }
        echo '</select>';         
    }
    
    public function printCatalogo($catalogo) {
        echo '<table cellpadding="0" cellspacing="0" class="center">';
        echo '<tr><th>Opción</th><th>Nombre</th><th>Descripción</th></tr>', "\n";
        foreach ($catalogo as $value) {
            echo '<tr id="_' . $value->getId() . '">';
            echo '<td>', '<input type="radio" id="soporte" name="soporte" value="' . $value->getId() . '">', '</td>';
            echo '<td>', $value->getNombre(), '</td>';
            echo '<td>', $value->getDescripcion(), '</td>';
            echo '</tr>', "\n";
        }
        echo '</table><br />';
    }
    
     public function createOrUpdate() {
        if (isset($_POST['submit'])) {
            if (empty($_POST['nombre']) || empty($_POST['descripcion'])) {
                $this->setError("El nombre del catalogo o la descripcion no son validos");
            } else {

                $escapedPost = $_POST;
                $escapedPost = array_map('html_entity_decode', $escapedPost);
                $nombre = $escapedPost['nombre'];
                $descripcion = $escapedPost['descripcion'];
                $idsoporte = $escapedPost['idsoporte'];

                $servicio = new SoporteServicio();
                $test = $servicio->createOrUpdateSoporte($idsoporte, $nombre, $descripcion);

                if ($test) {
                    header("Location:soporte.php");
                } else {
                    $this->setError("No se actualizo el registro");
                }
            }
        }
    }
}
