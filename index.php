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
        case "detActeurs" : $ctrlCinema->detActeurs(); break;
        case "detReal" : $ctrlCinema->detActeurs(); break;
        case "detFilm" : $ctrlCinema->detActeurs(); break;
        case "detRole" : $ctrlCinema->detRoles(); break;
    }
}