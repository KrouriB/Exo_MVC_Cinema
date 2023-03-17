<?php
ob_start();
?>

<?php
$titre = "Liste des Realisateurs";
$titre_secondaire = "Liste des Realisteurs";
$contenu = ob_get_clean();
require "view/template.php";
?>