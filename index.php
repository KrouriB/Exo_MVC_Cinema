<?php

use Controller\CinemaController;

spl_autoload_register(function ($class_name) {
	require_once $class_name . '.php';
});

$ctrlCinema = new CinemaController();

$id = (isset($_GET["id"])) ? $_GET["id"] : null;

if(isset($_GET["action"])){
    switch ($_GET["action"]){

        case "listFilms" : $ctrlCinema->listFilms(); break;
        case "listActeurs" : $ctrlCinema->listActeurs(); break;
        case "listRoles" : $ctrlCinema->listRoles(); break;
        case "listReals" : $ctrlCinema->listReals(); break;
        case "detActeurs" : $ctrlCinema->detActeurs(); break;
        case "detReals" : $ctrlCinema->detReals(); break;
        case "detFilms" : $ctrlCinema->detFilms(); break;
        case "detRoles" : $ctrlCinema->detRoles(); break;
    }
}else {
    $ctrlCinema->listFilms();
}