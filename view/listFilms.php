<?php
ob_start();
?>

<p>Il y a <?= $requete->rowCount() ?> films</p>

<table>
    <thead>
        <tr>
            <th>Titre</th>
            <th>Date de sortie</th>
            <th>Realisateur</th>
            <th>Durée</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requete->fetchAll() as $film){ ?>
                <tr>
                    <td><a href=""><?= $film["titre"] ?></a></td>
                    <td><?= $film["sortie"] ?></td>
                    <td><a href=""><?= $film["real"] ?></a></td>
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