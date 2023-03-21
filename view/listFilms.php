<?php
ob_start();
?>

<p>Il y a <?= $requete->rowCount() ?> films</p>

<table>
    <thead>
        <tr>
            <th>TITRE</th>
            <th class="toCenter"><?= mb_strtoupper("Année de sortie") ?></th>
            <th><?= mb_strtoupper("Réalisateur") ?></th>
            <th class="toCenter"><?= mb_strtoupper("Durée") ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requete->fetchAll() as $film){ ?>
                <tr>
                    <td><a href="index.php?action=detFilms&id=<?= $film["unFilm"] ?>"><?= $film["titre"] ?></a></td>
                    <td class="toCenter"><?= $film["sortie"] ?></td>
                    <td class="toCenter"><a href="index.php?action=detReals&id=<?= $film["unReal"] ?>"><?= $film["nomReal"] ?></a></td>
                    <td class="toCenter"><?= $film["duree"] ?></td>
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