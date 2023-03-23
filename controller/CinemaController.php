<?php

namespace Controller;
use Model\Connect;

class CinemaController {



    // Partie Acteur





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
        require "view/list/listActeurs.php";
    }



    public function detActeurs($id){
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT *  , CONCAT(p.prenom_personne,' ',p.nom_personne) AS nomActeur ,  DATE_FORMAT(a.date_naissance_acteur, '%d/%m/%Y' ) AS laDate
            FROM acteur a
            INNER JOIN casting c ON a.id_acteur = c.id_acteur
            INNER JOIN personne p ON a.id_personne = p.id_personne
            INNER JOIN film f ON c.id_film = f.id_film
            INNER JOIN role r ON c.id_role = r.id_role
            WHERE a.id_acteur = :id
        ");
        $requete->execute(["id"=>$id]);
        require "view/detail/detailActeur.php";
    }



    public function formActeur(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT p.id_personne AS id , CONCAT(p.prenom_personne,' ',p.nom_personne) AS nomPerso
            FROM personne p
        ");
        $requete->execute();
        require "view/form/formActeur.php";
    }



    public function formulaireActeur($sexe,$date,$id){
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            INSERT INTO acteur (sexe,date_naissance_acteur,id_personne)
            VALUE (:sexe,:date,:id)
        ");
        $requete->execute([
            "sexe" => $sexe ,
            "date" => $date ,
            "id" => $id
        ]);
    }





    // Partie Film





    public function listFilms() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT f.titre_film AS titre , YEAR(f.date_sortie_film) AS sortie , TIME_FORMAT(SEC_TO_TIME(f.temps_min_film*60), '%Hh%i') AS duree , CONCAT(p.prenom_personne,' ',p.nom_personne) AS nomReal , f.id_film AS unFilm , f.id_realisateur AS unReal
            FROM film f
            INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
            INNER JOIN personne p ON r.id_personne = p.id_personne
            ORDER BY sortie
        ");
        require "view/list/listFilms.php";
    }



    public function detFilms($id){
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT *, CONCAT(pr.prenom_personne,' ',pr.nom_personne) AS nomReal , DATE_FORMAT(f.date_sortie_film, '%e/%m/%Y' ) AS laDate , TIME_FORMAT(SEC_TO_TIME(f.temps_min_film*60), '%Hh%i') AS duree
            FROM film f
            INNER JOIN realisateur re ON f.id_realisateur = re.id_realisateur
            INNER JOIN personne pr ON re.id_personne = pr.id_personne
            LEFT JOIN genrer ger ON ger.id_film = f.id_film
            LEFT JOIN genre ge ON ge.id_genre = ger.id_genre
            WHERE f.id_film = :id
        ");
        $requete->execute(["id"=>$id]);
        $castings = $pdo->prepare("
            SELECT * ,CONCAT(p.prenom_personne,' ',p.nom_personne) AS nomActeur
            FROM casting c
            INNER JOIN film f ON c.id_film = f.id_film
            INNER JOIN role r ON c.id_role = r.id_role
            INNER JOIN acteur a ON c.id_acteur = a.id_acteur
            INNER JOIN personne p ON a.id_personne = p.id_personne
            WHERE f.id_film = :id
        ");
        $castings->execute(["id"=>$id]);
        require "view/detail/detailFilm.php";
    }



    public function formFilm(){
        $pdo = Connect::seConnecter();
        $requete1 = $pdo->prepare("
            SELECT id_realisateur AS id , CONCAT(p.prenom_personne,' ',p.nom_personne) AS nomReal
            FROM realisateur r
            INNER JOIN personne p ON r.id_personne = p.id_personne
        ");
        $requete1->execute();
        $requete2 = $pdo->prepare("
            SELECT id_genre AS id , libelle_genre
            FROM genre
        ");
        $requete2->execute();
        require "view/form/formFilm.php";
    }



    public function formulaireFilm(){
        $pdo = Connect::seConnecter();
        $requete1 = $pdo->prepare("
            INSERT INTO  ()
            VALUE ()
        ");
        $requete1->execute();
        $requete2 = $pdo->prepare("
        INSERT INTO  ()
        VALUE ()
        ");
        $requete2->execute();
    }





    // Partie Genre





    public function listGenres(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT ge.libelle_genre , COUNT(ger.id_genre) AS nbLa  ,ger.id_genre AS unGenre
            FROM genrer ger
            INNER JOIN genre ge ON ger.id_genre = ge.id_genre
            GROUP BY ge.id_genre
        ");
        require "view/list/listGenres.php";
    }



    public function detGenres($id){
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT * 
            FROM genre ge
            INNER JOIN genrer ger ON ge.id_genre = ger.id_genre
            INNER JOIN film f ON ger.id_film = f.id_film
            WHERE ge.id_genre = :id
        ");
        $requete->execute(["id"=>$id]);
        require "view/detail/detailGenre.php";
    }



    public function formGenre(){
        require "view/form/formGenre.php";
    }



    public function formulaireGenre($nom){
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            INSERT INTO genre (libelle_genre)
            VALUE (:nom)
        ");
        $requete->execute(["nom" => $nom]);
    }





    // Partie Realisateur





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
        require "view/list/listRealisateurs.php";
    }



    public function detReals($id){
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT *  , CONCAT(p.prenom_personne,' ',p.nom_personne) AS nomReal , DATE_FORMAT(f.date_sortie_film, '%e/%m/%Y' ) AS laDate
            FROM realisateur r
            INNER JOIN film f ON r.id_realisateur = f.id_realisateur
            INNER JOIN personne p ON r.id_personne = p.id_personne
            WHERE r.id_realisateur = :id
            ORDER BY f.date_sortie_film
        ");
        $requete->execute(["id"=>$id]);
        require "view/detail/detailRealisateur.php";
    }



    public function formRealisateur(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT p.id_personne AS id , CONCAT(p.prenom_personne,' ',p.nom_personne) AS nomPerso
            FROM personne p
        ");
        $requete->execute();
        require "view/form/formRealisateur.php";
    }



    public function formulaireRealisateur($id){
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            INSERT INTO realisateur (id_personne)
            VALUE (:id)
        ");
        $requete->execute(["id" => $id]);
    }





    // Partie Role





    public function listRoles(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT r.nom_role , COUNT(c.id_role) AS nbLa ,r.id_role AS id
            FROM role r
            INNER JOIN casting c ON r.id_role = c.id_role
            GROUP BY r.id_role
            ORDER BY nbLa DESC , r.nom_role ASC
        ");
        require "view/list/listRoles.php";
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
        require "view/detail/detailRole.php";
    }



    public function formRole(){
        require "view/form/formRole.php";
    }



    public function formulaireRole($nom){
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            INSERT INTO role (nom_role)
            VALUE (:nom)
        ");
        $requete->execute(["nom" => $nom]);
    }
    
    
    
    
    
    // Partie Commande uniquement formulaire





    // Partie hub formulaire

    public function formGroup(){
        require "view/form/formGroup.php";
    }



    // Partie Casting
    

    
    public function formCasting(){
        $pdo = Connect::seConnecter();
        $requete1 = $pdo->prepare("
            SELECT a.id_acteur AS idActeur , CONCAT(p.prenom_personne,' ',p.nom_personne) AS nomActeur
            FROM acteur a
            INNER JOIN personne p ON a.id_personne = p.id_personne
        ");
        $requete1->execute();
        $requete2 = $pdo->prepare("
            SELECT r.id_role AS idRole , r.nom_role AS nomRole
            FROM role r
        ");
        $requete2->execute();
        $requete3 = $pdo->prepare("
            SELECT f.id_film AS idFilm , f.titre_film AS nomFilm
            FROM film f
        ");
        $requete3->execute();
        require "view/form/formCasting.php";
    }



    public function formulaireCasting(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            INSERT INTO  ()
            VALUE ()
        ");
        $requete->execute();
    }



     // Partie Personne
    

    
    public function formPersonne(){
        require "view/form/formPersonne.php";
    }



    public function formulairePersonne($unNom,$unPrenom){
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            INSERT INTO personne (nom_personne,prenom_personne)
            VALUE (:unNom,:unPrenom)
        ");
        $requete->execute([
            "unNom" => $unNom,
            "unPrenom" => $unPrenom
        ]);
    }


}