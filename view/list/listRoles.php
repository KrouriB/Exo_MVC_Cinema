<?php
ob_start();
?>

<div class="surTableau">
    <p>Il y a <?= $requete->rowCount() ?> roles</p>
    <a href="index.php?action=formRole">Ajoutez</a>
</div>

<table>
    <thead>
        <tr>
            <th>Nom du Role</th>
            <th>Nombre d'apparition</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($requete->fetchAll() as $role) { ?>
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