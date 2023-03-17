<?php
ob_start();
?>

<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Nombre de réalisation</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requete->fetchAll() as $role){ ?>
                <tr>
                    <td><a href="index.php?action=detReal&id=<?= $role["id"] ?>"><?= $role["nomReal"] ?></a></td>
                    <td><?= $role["nbLa"] ?></td>
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