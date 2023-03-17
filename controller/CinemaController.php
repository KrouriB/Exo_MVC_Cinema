<?php

namespace Controller;
use Model\Connect;

class CinemaController {

    public function listFilms() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT f.titre_film AS titre , YEAR(f.date_sortie_film) AS sortie , TIME_FORMAT(SEC_TO_TIME(f.temps_min_film*60), '%H:%i') AS duree , CONCAT(p.nom_personne,' ',p.prenom_personne) AS nomReal , f.id_film AS unFilm , f.id_realisateur AS unReal
            FROM film f
            INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
            INNER JOIN personne p ON r.id_personne = p.id_personne
        ");
        require "view/listFilms.php";
    }

    public function detActeur($id){
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT * 
            FROM acteur 
            WHERE id_acteur = :id
        ");
        $requete->execute(["id"=>$id]);
        require "view/detailActeur.php";
    }

    public function detReal($id){
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT * 
            FROM realisateur 
            WHERE id_realisateur = :id
        ");
        $requete->execute(["id"=>$id]);
        require "view/detailRealisaeur.php";
    }

    public function detFilm($id){
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT * 
            FROM film 
            WHERE id_film = :id
        ");
        $requete->execute(["id"=>$id]);
        require "view/detailFilm.php";
    }


}