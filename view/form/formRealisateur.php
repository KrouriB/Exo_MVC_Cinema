<?php
ob_start();
$personnes = $requete->fetchAll();
?>

<form action="index.php?action=addRealisateur" method="post">
    <label for="selectReal">Selectionner une Personne en tant que Réalisateur :</label>
    <select name="id_personne" id="selectReal">
        <option value="">--Veuillez selcetionner une option--</option>
        <?php
        foreach($personnes as $personne){
            ?>
            <option value="<?= $personne['id'] ?>"><?= $personne['nomPerso'] ?></option>
            <?php
        }
        ?>
    </select>
    <input type="submit" value="Ajoutez" name="submitRealisateur">
</form>

<a href="index.php?action=formPersonne">Ajoutez une Personne</a>

<?php
$titre = "Formulaire Réalisateur";
$titre_secondaire = "Ajoutez un Réalisateur";
$contenu = ob_get_clean();
require "view/template.php";
?>