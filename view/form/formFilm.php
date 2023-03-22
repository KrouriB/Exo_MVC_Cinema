<?php
ob_start();
?>

<form action="index.php?action=addFilm" method="post" enctype="multipart/form-data">

    <label for="titre_film">Donnez le nom du film :</label>
    <input type="text" name="titre_film" id="titre_film">
    <label for="date_film">Donnez la date de sortie du film :</label>
    <input type="date" id="date_film" name="date_sortie_film">
    <label for="temps_min_film">Donnez le temps en minute du film :</label>
    <input type="number" name="temps_min_film" id="temps_min_film" min="1" value="1" step="1">
    <label for="resume_film">Resumez le film (optionel) :</label>
    <textarea name="resume_film" id="resume_film" cols="30" rows="10"></textarea>
    <label for="note_film">Veuiller notez le film (optionel) :</label>
    <input type="number" name="note_film" id="note_film" step="1" min="0" max="1">
    <label for="image_film">Veuillez selcetionner une image (optionel) :</label>
    <input type="file" name="image_film" id="image_film">
    <label for="selectReal">Selectionner un Réalisateur :</label>
    <select name="id_personne" id="selectReal">
        <option value="">--Veuillez selcetionner une option--</option>
        <?php
        foreach($realisateurs as $realisateur){
            ?>
            <option value="<?= $realisateur['id'] ?>"><?= $realisateur['nomReal'] ?></option>
            <?php
        }
        ?>
    </select>
    <input type="submit" value="Ajoutez" name="submitFilm">
</form>

<a href="index.php?action=formRealisateur">Ajoutez un Realisateur</a>

<?php
$titre = "";
$titre_secondaire = "";
$contenu = ob_get_clean();
require "view/template.php";
?>