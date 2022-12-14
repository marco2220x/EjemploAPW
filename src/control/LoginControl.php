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
require_once(__ROOT__ . "/servicio/UsuarioServicio.php");

class LoginControl {

    private $error;

    public function testLogin() {
        if (isset($_POST['submit'])) {
            if (empty($_POST['username']) || empty($_POST['password'])) {
                $this->setError("El nombre del usuario o el password no son validos");
            } else {
                $username = $_POST['username'];
                $password = $_POST['password'];

                $escapedPost = $_POST;
                $escapedPost = array_map('html_entity_decode', $escapedPost);
                $username = $escapedPost['username'];
                $password = $escapedPost['password'];

                $usrSrvc = new UsuarioServicio();
                $test = $usrSrvc->get_user($username, $password);

                if (isset($test)) {
                    SessionControl::set('USUARIO', serialize($test));
                } else {
                    $this->setError("El nombre del usuario o el password no son validos");
                }
            }
        }
    }

    public function getError() {
        return $this->error;
    }

    public function setError($error): void {
        $this->error = $error;
    }

}
