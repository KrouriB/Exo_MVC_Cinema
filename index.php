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
        case "listGenres" : $ctrlCinema->listGenres(); break;
        case "detActeurs" : $ctrlCinema->detActeurs($_GET['id']); break;
        case "detReals" : $ctrlCinema->detReals($_GET['id']); break;
        case "detFilms" : $ctrlCinema->detFilms($_GET['id']); break;
        case "detRoles" : $ctrlCinema->detRoles($_GET['id']); break;
        case "detGenres" : $ctrlCinema->detGenres($_GET['id']); break;
        case "formGroup" : $ctrlCinema->formGroup();break;
        case "formActeur" : $ctrlCinema->formActeur();break;
        case "formCasting" : $ctrlCinema->formCasting();break;
        case "formFilm" : $ctrlCinema->formFilm();break;
        case "formGenre" : $ctrlCinema->formGenre();break;
        case "formPersonne" : $ctrlCinema->formPersonne();break;
        case "formRealisateur" : $ctrlCinema->formRealisateur();break;
        case "formRole" : $ctrlCinema->formRole();break;
        case "addActeur" :if(isset($_POST['submitActeur'])){$ctrlCinema->formulaireActeur();}break;
        case "addCasting" :if(isset($_POST['submitCasting'])){$ctrlCinema->formulaireCasting();}break;
        case "addFilm" :if(isset($_POST['submitFilm'])){$ctrlCinema->formulaireFilm();}break;
        case "addGenre" :if(isset($_POST['submitGenre'])){$ctrlCinema->formulaireGenre();}break;
        case "addPersonne" :if(isset($_POST['submitPersonne'])){$ctrlCinema->formulairePersonne();}break;
        case "addRealisateur" :if(isset($_POST['submitRealisateur'])){$ctrlCinema->formulaireRealisateur();}break;
        case "addRole" :if(isset($_POST['submitRole'])){$ctrlCinema->formulaireRole();}break;
    }
}else {
    $ctrlCinema->listFilms();
}