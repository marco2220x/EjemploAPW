<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Genero
 *
 * @author Yeoshua
 */
class PeliculaModelo {
    
    //put your code here
    private $id;
    private $titulo;
    private $idsoporte;
    private $idgenero;
    private $genero;
    private $soporte;

    
    
    public function getId() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getIdGenero() {
        return $this->idgenero;
    }
    
    public function getGenero() {
        return $this->genero;
    }
    
    public function getIdSoporte() {
        return $this->idsoporte;
    }
        
    public function getSoporte() {
        return $this->soporte;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setTitulo($titulo): void {
        $this->titulo = $titulo;
    }
    
    public function setIdGenero($idgenero): void {
        $this->idgenero = $idgenero;
    }
    
    public function setGenero($genero): void {
        $this->genero = $genero;
    }

    public function setIdSoporte($idSoporte): void {
        $this->idSoporte = $idSoporte;
    }

    public function setSoporte($soporte): void {
        $this->soporte = $soporte;
    }



}
