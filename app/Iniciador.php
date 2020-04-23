<?php 

//Confi
//error_reporting(0);
require_once "config/configurar.php";
require_once "config/dbConfig.php";
//require_once "librerias/Base.php";
//require_once "librerias/Controlador.php";
//require_once "librerias/Core.php";

//echo getcwd();

spl_autoload_register(function($NombreClase){
    require_once 'librerias/' .$NombreClase. ".php";
});