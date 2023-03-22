<?php
ob_start();
?>

<a href="index.php?action=formPersonne">Ajoutez une Personne</a>

<?php
$titre = "";
$titre_secondaire = "";
$contenu = ob_get_clean();
require "view/template.php";
?>