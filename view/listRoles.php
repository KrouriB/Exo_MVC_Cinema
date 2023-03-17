<?php
ob_start();
?>

<?php
$titre = "Liste des Roles";
$titre_secondaire = "Liste des Roles";
$contenu = ob_get_clean();
require "view/template.php";
?>