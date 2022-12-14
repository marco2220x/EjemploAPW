<?php

require_once(__ROOT__ . "/db/Conexion.php");
require_once(__ROOT__ . "/modelo/PeliculaModelo.php");

class PeliculaServicio extends Conexion {

    public function __construct() {
        parent::__construct();
    }

    public function get_pelicula() {
        $sql = "SELECT pelicula.id, pelicula.titulo, genero.id as idgenero, genero.descripcion as genero, soporte.id as idsoporte , soporte.nombre as soporte FROM `pelicula` left join genero on pelicula.idgenero = genero.id left JOIN soporte on pelicula.idsoporte = soporte.id;";
        $result = $this->_db->query($sql);
        if ($result) {
            $data = [];
            while ($row = $result->fetch_object('PeliculaModelo')) {
                $data[] = $row;
            }
            return $data;
        } else {
            die("Error en la ejecución del query: " . print_r($this->_db->error, true));
        }
    }

    public function createOrUpdatePelicula($id, $titulo, $idgenero, $idsoporte) {
        $insert = " INSERT INTO pelicula(titulo, idgenero, idsoporte) VALUES('$titulo','$idgenero','$idsoporte')";
        $update = "UPDATE pelicula SET titulo = '$titulo' , idgenero = '$idgenero', idsoporte = '$idsoporte'  WHERE id = $id";

        $sql = empty($id) ? $insert : $update;
        $result = $this->_db->query($sql);
        if ($result) {            
            return true;
        } else {
            die("Error en la ejecución del query: " . print_r($this->_db->error, true));
        }
    }

}

?>