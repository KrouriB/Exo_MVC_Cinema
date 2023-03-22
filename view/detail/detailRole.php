<?php
ob_start();
$role = $requete->fetchAll();
?>

<div class="liste"><?php foreach($role as $unRole){ ?>
    <p class="foreach">Jouer par <a href="index.php?action=detActeurs&id=<?= $unRole['id_acteur'] ?>"><?= $unRole['nomActeur'] ?></a> dans <a href="index.php?action=detFilms&id=<?= $unRole['id_film'] ?>"><?= $unRole['titre_film'] ?></a></p>
<?php } ?></div>

<?php
$titre = $role[0]['nom_role'] ;
$titre_secondaire = "Le role ".$role[0]['nom_role'];
$contenu = ob_get_clean();
require "view/template.php";
?>