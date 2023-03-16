<?php
ob_start();
?>

<?php
$titre = "Le réalisateur ".$ ;
$titre_secondaire = "";
$contenu = ob_get_clean();
require "view/template.php";
?>