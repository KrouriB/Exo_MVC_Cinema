<?php
ob_start();
?>

<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Sexe</th>
            <th>Date de Naissance</th>
            <th>Nombre d'appartion</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requete->fetchAll() as $acteur){ ?>
                <tr>
                    <td><a href="index.php?action=detActeur&id=<?= $acteur["id"] ?>"><?= $acteur["nomActeur"] ?></a></td>
                    <td><?= $acteur["sexe"] ?></td>
                    <td><?= $acteur["date"] ?></td>
                    <td><?= $acteur["nbLa"] ?></td>
                </tr>
        <?php } ?>
    </tbody>
</table>

<?php
$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";
?>