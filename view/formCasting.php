<?php
ob_start();
?>

<a href="index.php?action=formActeur">Ajoutez un Acteur</a>
<a href="index.php?action=formRole">Ajoutez un Role</a>
<a href="index.php?action=formFilm">Ajoutez un Film</a>

<?php
$titre = "";
$titre_secondaire = "";
$contenu = ob_get_clean();
require "view/template.php";
?>