<?php
ob_start();
$acteurs = $requete1->fetchAll();
$roles = $requete2->fetchAll();
$films = $requete3->fetchAll();
?>

<form action="index.php?action=addCasting" method="post">
    <label for="selectActeur">Selectionner un Réalisateur :</label>
    <select name="id_acteur" id="selectActeur">
        <option value="">--Veuillez selcetionner une option--</option>
        <?php
        foreach($acteurs as $acteur){
            ?>
            <option value="<?= $acteur['idActeur'] ?>"><?= $acteur['nomActeur'] ?></option>
            <?php
        }
        ?>
    </select>
    <label for="selectRole">Selectionner un Réalisateur :</label>
    <select name="id_role" id="selectRole">
        <option value="">--Veuillez selcetionner une option--</option>
        <?php
        foreach($roles as $role){
            ?>
            <option value="<?= $role['idRole'] ?>"><?= $role['nomRole'] ?></option>
            <?php
        }
        ?>
    </select>
    <label for="selectFilm">Selectionner un Réalisateur :</label>
    <select name="id_film" id="selectFilm">
        <option value="">--Veuillez selcetionner une option--</option>
        <?php
        foreach($films as $film){
            ?>
            <option value="<?= $film['idFilm'] ?>"><?= $film['nomFilm'] ?></option>
            <?php
        }
        ?>
    </select>
    <input type="submit" value="Ajoutez" name="submitCasting">
</form>

<a href="index.php?action=formActeur">Ajoutez un Acteur</a>
<a href="index.php?action=formRole">Ajoutez un Role</a>
<a href="index.php?action=formFilm">Ajoutez un Film</a>

<?php
$titre = "";
$titre_secondaire = "";
$contenu = ob_get_clean();
require "view/template.php";
?>