<?php
ob_start();
?>

<form action="index.php?action=addPersonne" method="post">
    <div class="divForm">
        <div>
            <label for="nom">Nom&nbsp;:</label>
            <input type="text" name="nom">
        </div>
        <div>
            <label for="prenom">Prénom&nbsp;:</label>
            <input type="text" name="prenom">
        </div>
    </div>
    <div class="divSubmit">
        <input type="submit" value="Ajoutez" name="submitPersonne">
    </div>
</form>


<?php
$titre = "Formulaire Personne";
$titre_secondaire = "Ajoutez une Personne :";
$contenu = ob_get_clean();
require "view/template.php";
?>