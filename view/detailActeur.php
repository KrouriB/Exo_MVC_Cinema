<?php
ob_start();
$acteur = $requete->fetchAll();
?>

<p>Est un <?= strtolower($acteur[0]['sexe']) ?> né en <?= $acteur[0]['laDate'] ?></p>

<div class="liste"><?php foreach($acteur as $unActeur){ ?>
    <p>A jouer dans <a href="index.php?action=detFilms&id=<?= $unActeur['id_film'] ?>"><?= $unActeur['titre_film'] ?></a> dans le role de <a href="index.php?action=detRoles&id=<?= $unActeur['id_role'] ?>"><?= $unActeur['nom_role'] ?></a></p>
<?php } ?></div>

<?php
$titre = $acteur[0]['nomActeur'] ;
$titre_secondaire = "L'acteur ".$acteur[0]['nomActeur'];
$contenu = ob_get_clean();
require "view/template.php";
?>