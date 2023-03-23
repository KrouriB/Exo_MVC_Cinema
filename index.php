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
        case "addActeur" :
            if(isset($_POST['submitActeur'])){
                $sexe = $_POST['sexe'];
                $naissance = filter_input(INPUT_POST, "naissance", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $acteur = $_POST['personne'];
                if($sexe != 0 && $naissance && $acteur >= 0){
                    $ctrlCinema->formulaireActeur($sexe,$naissance,$acteur);
                }
                else{

                }
            }
            header("Location:index.php?action=formActeur");
            break;
        case "addCasting" :
            if(isset($_POST['submitCasting'])){
                $ctrlCinema->formulaireCasting();
            }
            break;
        case "addFilm" :
            if(isset($_POST['submitFilm'])){
                $titre =  filter_input(INPUT_POST, "titre", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ;
                $dateFilm =  filter_input(INPUT_POST, "dateFilm", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ;
                $temps = filter_input(INPUT_POST, "dateFilmtemps", FILTER_SANITIZE_NUMBER_INT) ;
                $note = ($empty($_POST['note'])) NULL : filter_input(INPUT_POST, "note", FILTER_SANITIZE_NUMBER_INT) ;
                $image = ($empty($_POST[''])) NULL :  ; filter_input(INPUT_POST, "image", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ;
                $realisateur = $_POST['personne'];
                $genre = 0;
                $resume = ($empty($_POST[''])) NULL : filter_input(INPUT_POST, "resume", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ;
                if(){
                    $ctrlCinema->formulaireFilm();
                }
                else{
                    
                }
            }
            break;
        case "addGenre" :
            if(isset($_POST['submitGenre'])){
                $genre = filter_input(INPUT_POST, "genre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                if($genre){ 
                    $ctrlCinema->formulaireGenre($genre);
                }
                else{
                    
                }
            }
            header("Location:index.php?action=formGenre");
            break;
        case "addPersonne" :
            if(isset($_POST['submitPersonne'])){
                $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                if($nom && $prenom){
                    $ctrlCinema->formulairePersonne(strtoupper($nom),ucwords($prenom));
                }
                else{
                    
                }
            }
            header("Location:index.php?action=formPersonne");
            break;
        case "addRealisateur" :
            if(isset($_POST['submitRealisateur'])){
                $real = $_POST['personne'];
                if($real >= 1){
                    $ctrlCinema->formulaireRealisateur($real);
                }
                else{

                }
            }
            header("Location:index.php?action=formRealisateur");
            break;
        case "addRole" :
            if(isset($_POST['submitRole'])){
                $role = filter_input(INPUT_POST, "role", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                if($role){
                    $ctrlCinema->formulaireRole($role);
                }
                else{

                }
            }
            header("Location:index.php?action=formRole");
            break;
    }
}else {
    $ctrlCinema->formGroup();
}