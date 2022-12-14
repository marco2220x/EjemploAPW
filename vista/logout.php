<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
require_once("inicio.php");
require_once(__ROOT__ . "/control/SessionControl.php");
SessionControl::testSession();
SessionControl::destroy();
header("Location: ../index.php"); 

