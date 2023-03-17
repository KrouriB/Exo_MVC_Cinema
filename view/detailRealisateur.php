<?php
ob_start();
$real = $requete->fetchAll();
?>

<div class="liste"><?php foreach($real as $unReal){ ?>
    <p><a href="index.php?action=detFilms&id=<?= $unReal['id_film'] ?>"><?= $unReal['titre_film'] ?></a> sortie le <?= $unReal['laDate'] ?></p>
<?php } ?></div>

<?php
$titre = $real[0]['nomReal'];
$titre_secondaire = "Le réalisateur ".$real[0]['nomReal'] ;
$contenu = ob_get_clean();
require "view/template.php";
?>
