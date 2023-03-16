<?php
ob_start();
?>

<?php
$titre = "L'acteur ".$ ;
$titre_secondaire = "";
$contenu = ob_get_clean();
require "view/template.php";
?>