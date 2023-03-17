<?php
ob_start();
$real = $requete->fetchAll();
?>



<?php
$titre = "Le réalisateur ".$real[0]['nomReal'] ;
$titre_secondaire = $real[0]['nomReal'];
$contenu = ob_get_clean();
require "view/template.php";
?>