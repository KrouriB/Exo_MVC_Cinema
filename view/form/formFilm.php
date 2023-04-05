<?php
ob_start();
$realisateurs = $requete1->fetchAll();
$genres = $requete2->fetchAll();
?>

<form action="index.php?action=addFilm" method="post" enctype="multipart/form-data">
    <div class="divForm">
        <div>
            <label for="titre">Donnez&nbsp;le&nbsp;nom&nbsp;du&nbsp;film&nbsp;:&nbsp;</label>
            <input type="text" name="titre" id="titre">
        </div>
        <div>
            <label for="dateFilm">Donnez&nbsp;la&nbsp;date&nbsp;de&nbsp;sortie&nbsp;du&nbsp;film&nbsp;:&nbsp;</label>
            <input type="date" id="dateFilm" name="dateFilm">
        </div>
        <div>
            <label for="temps">Donnez&nbsp;le&nbsp;temps&nbsp;en&nbsp;minute&nbsp;du&nbsp;film&nbsp;:&nbsp;</label>
            <input type="number" name="temps" id="temps" min="1" value="1" step="1">
        </div>
        <div>
            <label for="note">Veuiller&nbsp;notez&nbsp;le&nbsp;film&nbsp;(optionel)&nbsp;:&nbsp;</label>
            <input type="number" name="note" id="note" step="1" min="0" max="5">
        </div>
        <div>
            <label for="image">Veuillez&nbsp;selcetionner&nbsp;une&nbsp;image&nbsp;(optionel)&nbsp;:</label>
            <input type="file" name="image" id="image">
        </div>
        <div>
            <label for="personne">Selectionner&nbsp;un&nbsp;Réalisateur&nbsp;:&nbsp;</label>
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
        <div>
            <fieldset>
                <legend>Selectionner&nbsp;un&nbsp;genre&nbsp;:&nbsp;</legend>
                <?php
                foreach($genres as $genre){
                    ?>
                    <div>
                        <input type="checkbox" name="genre[]" id="<?= $genre['libelle_genre'] ?>" value="<?= $genre['id'] ?>">
                        <label for="<?= $genre['libelle_genre'] ?>"><?= $genre['libelle_genre'] ?></label>
                    </div>
                <?php
                }
                ?>
            </fieldset>
        </div>
        <div>
            <label for="resume">Resumez&nbsp;le&nbsp;film&nbsp;(optionel)&nbsp;:&nbsp;</label>
            <textarea name="resume" id="resume" cols="30" rows="10"></textarea>
        </div>
    </div>
    <div class="divSubmit">
        <input type="submit" value="Ajoutez" name="submitFilm">
    </div>

</form>

<div class="boutonPrecdent">
    <a class="lienPrecedent" href="index.php?action=formRealisateur">Ajoutez un Realisateur</a>
</div>

<?php
$titre = "";
$titre_secondaire = "";
$contenu = ob_get_clean();
require "view/template.php";
?>

