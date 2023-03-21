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
        // case "listGenres" : $ctrlCinema->listGenres(); break;
        case "detActeurs" : $ctrlCinema->detActeurs($_GET['id']); break;
        case "detReals" : $ctrlCinema->detReals($_GET['id']); break;
        case "detFilms" : $ctrlCinema->detFilms($_GET['id']); break;
        case "detRoles" : $ctrlCinema->detRoles($_GET['id']); break;
        // case "detGenres" : $ctrlCinema->detGenres($_GET['id']); break;
    }
}else {
    $ctrlCinema->listFilms();
}