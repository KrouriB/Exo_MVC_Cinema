<?php
ob_start();
$personnes = $requete->fetchAll();
?>

<form action="index.php?action=addActeur" method="post">

    <label for="selectSexe">Selectionner le Sexe de l'acteur :</label>
    <select name="sexe" id="selectSexe">
        <option value="">--Veuillez selcetionner une option--</option>
        <option value="Homme">Homme</option>
        <option value="Femme">Femme</option>
    </select>
    <label for="date_acteur">Donnez la date de naissance de l'acteur :</label>
    <input type="date" id="date_acteur" name="date_naissance_acteur">
    <label for="selectReal">Selectionner une Personne en tant que Acteur :</label>
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
    <input type="submit" value="Ajoutez" name="submitActeur">
</form>

<a href="index.php?action=formPersonne">Ajoutez une Personne</a>

<?php
$titre = "Formulaire Acteur";
$titre_secondaire = "Ajoutez un Acteur";
$contenu = ob_get_clean();
require "view/template.php";
?>