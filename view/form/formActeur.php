<?php
ob_start();
$personnes = $requete->fetchAll();
?>

<form action="index.php?action=addActeur" method="post">
    <div class="divForm">
        <div>
            <label for="sexe">Selectionner&nbsp;le&nbsp;Sexe&nbsp;de&nbsp;l'acteur&nbsp;:&nbsp;</label>
            <select name="sexe" id="sexe">
                <option value="0">--Veuillez selcetionner une option--</option>
                <option value="Homme">Homme</option>
                <option value="Femme">Femme</option>
            </select>
        </div>
        <div>
            <label for="naissance">Donnez&nbsp;la&nbsp;date&nbsp;de&nbsp;naissance&nbsp;de&nbsp;l'acteur&nbsp;:&nbsp;</label>
            <input type="date" id="naissance" name="naissance">
        </div>
        <div>
            <label for="personne">Selectionner&nbsp;une&nbsp;Personne&nbsp;en&nbsp;tant&nbsp;que&nbsp;Acteur&nbsp;:&nbsp;</label>
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
        <input type="submit" value="Ajoutez" name="submitActeur">
    </div>
</form>

<div class="boutonPrecdent">
    <a class="lienPrecedent" href="index.php?action=formPersonne">Ajoutez une Personne</a>
</div>

<?php
$titre = "Formulaire Acteur";
$titre_secondaire = "Ajoutez un Acteur";
$contenu = ob_get_clean();
require "view/template.php";
?>



