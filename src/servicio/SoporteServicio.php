<?php

require_once(__ROOT__ . "/db/Conexion.php");
require_once(__ROOT__ . "/modelo/SoporteModelo.php");

class SoporteServicio extends Conexion {

    public function __construct() {
        parent::__construct();
    }

    public function get_soporte() {
        $sql = "SELECT *  FROM soporte ";
        $result = $this->_db->query($sql);
        if ($result) {
            $data = [];
            while ($row = $result->fetch_object('SoporteModelo')) {
                $data[] = $row;
            }
            return $data;
        } else {
            die("Error en la ejecución del query: " . print_r($this->_db->error, true));
        }
    }

    public function createOrUpdateSoporte($idsoporte, $nombre, $descripcion) {
        $insert = "INSERT INTO soporte(nombre, descripcion) VALUES('$nombre','$descripcion')";
        $update = "UPDATE soporte SET nombre = '$nombre' , descripcion = '$descripcion' WHERE id = $idsoporte";

        $sql = empty($idsoporte) ? $insert : $update;
        $result = $this->_db->query($sql);
        if ($result) {            
            return true;
        } else {
            die("Error en la ejecución del query: " . print_r($this->_db->error, true));
        }
    }

}

?>