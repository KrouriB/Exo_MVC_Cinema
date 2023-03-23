<?php
    ob_start();
?>

<form action="index.php?action=addGenre" method="post">
    <div>
        <label for="genre">Nom du genre :</label>
        <input type="text" name="genre">
    </div>
    <input type="submit" value="Ajoutez" name="submitGenre">
</form>

<?php
    $titre = "Formulaire Genre";
    $titre_secondaire = "Ajoutez un Genre :";
    $contenu = ob_get_clean();
    require "view/template.php";
?>
