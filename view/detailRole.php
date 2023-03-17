<?php
ob_start();
?>

<?php
$titre = "Le role ".$ ;
$titre_secondaire = "";
$contenu = ob_get_clean();
require "view/template.php";
?>