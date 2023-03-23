<?php
ob_start();
$personnes = $requete->fetchAll();
?>

<form action="index.php?action=addRealisateur" method="post">
    <div>
        <label for="personne">Selectionner une Personne en tant que Réalisateur :</label>
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
    <input type="submit" value="Ajoutez" name="submitRealisateur">
</form>

<a href="index.php?action=formPersonne">Ajoutez une Personne</a>

<?php
$titre = "Formulaire Réalisateur";
$titre_secondaire = "Ajoutez un Réalisateur";
$contenu = ob_get_clean();
require "view/template.php";
?>

    