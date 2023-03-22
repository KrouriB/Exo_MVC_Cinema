<?php
ob_start();
?>

<form action="index.php?action=addPersonne" method="post">
    <label for="nom_personnage">Nom :</label>
    <input type="text" name="nom_personne">
    <label for="prenom_personnage">Prénom :</label>
    <input type="text" name="prenom_personne">
    <input type="submit" value="Ajoutez" name="submitPersonne">
</form>


<?php
$titre = "";
$titre_secondaire = "";
$contenu = ob_get_clean();
require "view/template.php";
?>