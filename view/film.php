<?php
ob_start();
?>

<?php
$titre = "Le film ".$;
$titre_secondaire = "";
$contenu = ob_get_clean();
require "view/template.php";
?>