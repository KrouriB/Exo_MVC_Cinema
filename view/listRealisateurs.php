<?php
ob_start();
?>

<p>Il y a <?= $requete->rowCount() ?> realisateurs</p>

<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Nombre de réalisation</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requete->fetchAll() as $real){ ?>
                <tr>
                    <td><a href="index.php?action=detReals&id=<?= $real["id"] ?>"><?= $real["nomReal"] ?></a></td>
                    <td><?= $real["nbLa"] ?></td>
                </tr>
        <?php } ?>
    </tbody>
</table>

<?php
$titre = "Liste des realisateurs";
$titre_secondaire = "Liste des realisateurs";
$contenu = ob_get_clean();
require "view/template.php";
?>