<?php
    ob_start();
    $genre = $requete->fetchAll();
?>

<div >
    <?php foreach($genre as $film){ ?>
        <p class="foreach"><a href="index.php?action=detFilms&id=<?= $film['id_film'] ?>"><?= $film['titre_film'] ?></a></p>
    <?php } ?>
</div>

<?php
    $titre = $genre[0]['libelle_genre'] ;
    $titre_secondaire = "Les films du genre ".$genre[0]['libelle_genre'].":";
    $contenu = ob_get_clean();
    require "view/template.php";
?>