<?php
ob_start();
?>

<p>Il y a <?= $requete->rowCount() ?> films</p>

<table>
    <thead>
        <tr>
            <th>Titre</th>
            <th>Année de sortie</th>
            <th>Realisateur</th>
            <th>Durée</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requete->fetchAll() as $film){ ?>
                <tr>
                    <td><a href="index.php?action=detFilms&id=<?= $film["unFilm"] ?>"><?= $film["titre"] ?></a></td>
                    <td><?= $film["sortie"] ?></td>
                    <td><a href="index.php?action=detReals&id=<?= $film["unReal"] ?>"><?= $film["nomReal"] ?></a></td>
                    <td><?= $film["duree"] ?></td>
                </tr>
        <?php } ?>
    </tbody>
</table>

<?php
$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";
?>