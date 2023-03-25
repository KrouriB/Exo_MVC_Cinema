<?php
ob_start();
$realisateurs = $requete1->fetchAll();
$genres = $requete2->fetchAll();
?>

<form action="index.php?action=addFilm" method="post" enctype="multipart/form-data">
    <div>
        <div>
            <label for="titre">Donnez le nom du film :</label>
            <input type="text" name="titre" id="titre">
        </div>
        <div>
            <label for="dateFilm">Donnez la date de sortie du film :</label>
            <input type="date" id="dateFilm" name="dateFilm">
        </div>
        <div>
            <label for="temps">Donnez le temps en minute du film :</label>
            <input type="number" name="temps" id="temps" min="1" value="1" step="1">
        </div>
        <div>
            <label for="note">Veuiller notez le film (optionel) :</label>
            <input type="number" name="note" id="note" step="1" min="0" max="5">
        </div>
        <div>
            <label for="image">Veuillez selcetionner une image (optionel) :</label>
            <input type="file" name="image" id="image">
        </div>
        <div>
            <label for="personne">Selectionner un Réalisateur :</label>
            <select name="personne" id="personne">
                <option value="">--Veuillez selcetionner une option--</option>
                <?php
                foreach($realisateurs as $realisateur){
                    ?>
                    <option value="<?= $realisateur['id'] ?>"><?= $realisateur['nomReal'] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <fieldset>
            <legend>Selectionner un genre</legend>
            <?php
            foreach($genres as $genre){
                ?>
            <label for="<?= $genre['libelle_genre'] ?>"><?= $genre['libelle_genre'] ?></label>
            <input type="checkbox" name="genre[]" id="<?= $genre['libelle_genre'] ?>" value="<?= $genre['id'] ?>">
            <?php
            }
            ?>
        </fieldset>
        <div>
            <label for="resume">Resumez le film (optionel) :</label>
            <textarea name="resume" id="resume" cols="30" rows="10"></textarea>
        </div>
    </div>
    <div>
        <input type="submit" value="Ajoutez" name="submitFilm">
    </div>

</form>

<a class="lienPrecedent" href="index.php?action=formRealisateur">Ajoutez un Realisateur</a>

<?php
$titre = "";
$titre_secondaire = "";
$contenu = ob_get_clean();
require "view/template.php";
?>

