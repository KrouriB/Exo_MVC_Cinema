<?php
ob_start();
$personnes = $requete->fetchAll();
?>

<form action="index.php?action=addRealisateur" method="post">
    <div class="divForm">
        <div>
            <label for="personne">Selectionner&nbsp;une&nbsp;Personne&nbsp;en&nbsp;tant&nbsp;que&nbsp;Réalisateur&nbsp;:&nbsp;</label>
            <select name="personne" id="personne">
                <option value="0">--Veuillez selcetionner une option--</option>
                <?php
                foreach($personnes as $personne){
                    ?>
                    <option value="<?= $personne['id'] ?>"><?= $personne['nomPerso'] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="divSubmit">
        <input type="submit" value="Ajoutez" name="submitRealisateur">
    </div>
</form>

<div class="boutonPrecdent">
    <a class="lienPrecedent" href="index.php?action=formPersonne">Ajoutez une Personne</a>
</div>

<?php
$titre = "Formulaire Réalisateur";
$titre_secondaire = "Ajoutez un Réalisateur";
$contenu = ob_get_clean();
require "view/template.php";
?>