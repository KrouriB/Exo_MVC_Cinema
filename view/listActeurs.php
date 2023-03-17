<?php
ob_start();
?>

<?php
$titre = "Liste des Acteurs";
$titre_secondaire = "Liste des Acteurs";
$contenu = ob_get_clean();
require "view/template.php";
?>