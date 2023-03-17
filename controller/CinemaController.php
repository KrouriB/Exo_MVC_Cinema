<?php

namespace Controller;
use Model\Connect;

class CinemaController {

    // commande list

    public function listFilms() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT f.titre_film AS titre , YEAR(f.date_sortie_film) AS sortie , TIME_FORMAT(SEC_TO_TIME(f.temps_min_film*60), '%Hh%i') AS duree , CONCAT(p.prenom_personne,' ',p.nom_personne) AS nomReal , f.id_film AS unFilm , f.id_realisateur AS unReal
            FROM film f
            INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
            INNER JOIN personne p ON r.id_personne = p.id_personne
            ORDER BY sortie
        ");
        require "view/listFilms.php";
    }

    public function listActeurs(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT CONCAT(p.prenom_personne,' ',p.nom_personne) AS nomActeur ,a.sexe ,a.date_naissance_acteur AS date , COUNT(c.id_acteur) AS nbLa ,a.id_acteur AS id
            FROM acteur a
            INNER JOIN casting c ON a.id_acteur = c.id_acteur
            INNER JOIN personne p ON a.id_personne = p.id_personne
            GROUP BY a.id_acteur
            ORDER BY nbLa DESC , date ASC
        ");
        require "view/listActeurs.php";
    }

    public function listReals(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT CONCAT(p.prenom_personne,' ',p.nom_personne) AS nomReal , COUNT(f.id_realisateur) AS nbLa ,r.id_realisateur AS id
        FROM realisateur r
        INNER JOIN film f ON r.id_realisateur = f.id_realisateur
        INNER JOIN personne p ON r.id_personne = p.id_personne
        GROUP BY r.id_realisateur
        ORDER BY nbLa DESC 
        ");
        require "view/listRealisateurs.php";
    }

    public function listRoles(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT r.nom_role , COUNT(c.id_role) AS nbLa ,r.id_role AS id
            FROM role r
            INNER JOIN casting c ON r.id_role = c.id_role
            GROUP BY r.id_role
            ORDER BY nbLa DESC , r.nom_role ASC
        ");
        require "view/listRoles.php";
    }

    // commande detail

    public function detActeur($id){
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT *  , CONCAT(p.prenom_personne,' ',p.nom_personne) AS nomActeur
            FROM acteur a
            INNER JOIN casting c ON a.id_acteur = c.id_acteur
            INNER JOIN personne p ON a.id_personne = p.id_personne
            INNER JOIN film f ON c.id_film = f.id_film
            INNER JOIN role r ON c.id_role = r.id_role
            WHERE a.id_acteur = :id
        ");
        $requete->execute(["id"=>$id]);
        require "view/detailActeur.php";
    }

    public function detReals($id){
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT *  , CONCAT(p.prenom_personne,' ',p.nom_personne) AS nomReal , DATE_FORMAT(f.date_sortie_film, '%e/%c/%Y' ) AS laDate
            FROM realisateur r
            INNER JOIN film f ON r.id_realisateur = f.id_realisateur
            INNER JOIN personne p ON r.id_personne = p.id_personne
            WHERE r.id_realisateur = :id
            ORDER BY f.date_sortie_film
        ");
        $requete->execute(["id"=>$id]);
        require "view/detailRealisateur.php";
    }

    public function detFilms($id){
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT * , CONCAT(pr.prenom_personne,' ',pr.nom_personne) AS nomReal , CONCAT(pa.prenom_personne,' ',pa.nom_personne) AS nomActeur
            FROM film f
            INNER JOIN realisateur re ON f.id_realisateur = re.id_realisateur
            INNER JOIN personne pr ON re.id_personne = pr.id_personne
            INNER JOIN casting c ON f.id_film = c.id_film
            INNER JOIN role ro ON c.id_role = ro.id_role
            INNER JOIN acteur a ON c.id_acteur = a.id_acteur
            INNER JOIN personne pa ON a.id_personne = pa.id_personne
            WHERE f.id_film = :id
        ");
        $requete->execute(["id"=>$id]);
        require "view/detailFilm.php";
    }

    public function detRoles($id){
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT *  , CONCAT(p.prenom_personne,' ',p.nom_personne) AS nomActeur
            FROM role r
            INNER JOIN casting c ON r.id_role = c.id_role
            INNER JOIN acteur a ON c.id_acteur = a.id_acteur
            INNER JOIN film f ON c.id_film = f.id_film
            INNER JOIN personne p ON a.id_personne = p.id_personne
            WHERE r.id_role = :id
        ");
        $requete->execute(["id"=>$id]);
        require "view/detailFilm.php";
    }

}