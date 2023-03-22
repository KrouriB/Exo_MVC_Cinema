<?php
ob_start();
?>

<div id="les7lien">
    <a href="index.php?action=formPersonne">Personne</a>
    <a href="index.php?action=formGenre">Genre</a>
    <a href="index.php?action=formRole">Rôles</a>
    <a href="index.php?action=formRealisateur">Realisateur</a>
    <a href="index.php?action=formActeur">Acteur</a>
    <a href="index.php?action=formFilm">Film</a>
    <a href="index.php?action=formCasting">Casting</a>
</div>



<?php
$titre = "Hub Formulaire";
$titre_secondaire = "Les diffrent formulaire :";
$contenu = ob_get_clean();
require "view/template.php";
?>