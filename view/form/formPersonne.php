<?php
ob_start();
?>

<form action="index.php?action=addPersonne" method="post">
    <div>
        <label for="nom_personnage">Nom :</label>
        <input type="text" name="nom_personne">
    </div>
    <div>
        <label for="prenom_personnage">Prénom :</label>
        <input type="text" name="prenom_personne">
    </div>
    <input type="submit" value="Ajoutez" name="submitPersonne">
</form>


<?php
$titre = "Formulaire Personne";
$titre_secondaire = "Ajoutez une Personne :";
$contenu = ob_get_clean();
require "view/template.php";
?>
