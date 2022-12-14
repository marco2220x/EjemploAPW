<?php

require_once(__ROOT__ . "/db/Conexion.php");
require_once(__ROOT__ . "/modelo/UsuarioModelo.php");
class UsuarioServicio extends Conexion {

    public function __construct() {
        parent::__construct();
    }

    public function get_user($login, $pwd) {
        $sql = "SELECT nombre,login,rol FROM usuario  WHERE  login ='$login' and pwd='$pwd'";
        $result = $this->_db->query($sql);
        if ($result) {
            $user = null;
            while ($row = $result->fetch_object()) {
                $user =  new UsuarioModelo($row->nombre, $row->login, $row->rol);
            }

            return $user;
        } else {
            die("Error en la ejecución del query: " . print_r($this->_db->error, true));
        }
    }

}

?>