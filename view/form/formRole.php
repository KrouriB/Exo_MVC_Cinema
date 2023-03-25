<?php
ob_start();
?>

<form action="index.php?action=addRole" method="post">
    <div>
        <div>
            <label for="role">Nom du role :</label>
            <input type="text" name="role">
        </div>
    </div>
    <div>
        <input type="submit" value="Ajoutez" name="submitRole">
    </div>
</form>

<?php
$titre = "Formulaire Role";
$titre_secondaire = "Ajoutez un Role :";
$contenu = ob_get_clean();
require "view/template.php";
?>

