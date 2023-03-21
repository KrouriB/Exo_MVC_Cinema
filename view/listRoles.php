<?php
ob_start();
?>

<p>Il y a <?= $requete->rowCount() ?> roles</p>

<table>
    <thead>
        <tr>
            <th>NOM DU ROLE</th>
            <th>NOMBRE D'APPARITION</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requete->fetchAll() as $role){ ?>
                <tr>
                    <td><a href="index.php?action=detRoles&id=<?= $role["id"] ?>"><?= $role["nom_role"] ?></a></td>
                    <td class="toCenter petit"><?= $role["nbLa"] ?></td>
                </tr>
        <?php } ?>
    </tbody>
</table>

<?php
$titre = "Liste des roles";
$titre_secondaire = "Liste des roles";
$contenu = ob_get_clean();
require "view/template.php";
?>