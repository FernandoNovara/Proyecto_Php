<?php

    error_reporting(E_ALL);
    ini_set("ignore_repeated_errors",TRUE);
    ini_set("display_errors",FALSE);
    ini_set("log_errors",TRUE);
    ini_set("error_log","D:/Xampp/htdocs/Php/Proyecto/php-error.log");
    error_log("Inicio de pagina web");  

    require_once "Libs/App.php";
    require_once "Config/Config.php";
    require_once "Libs/ControladorBase.php";
    require_once "Libs/Conexion.php";
    require_once "Libs/View.php";
    require_once "Libs/Model.php";

    $app = new App();
?>