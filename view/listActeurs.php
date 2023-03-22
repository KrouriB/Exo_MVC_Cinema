<?php
ob_start();
?>

<div class="surTableau">
    <p>Il y a <?= $requete->rowCount() ?> acteurs</p>
    <a href="index.php?action=formActeur">Ajoutez</a>
</div>

<table>
    <thead>
        <tr>
            <th>NOM</th>
            <th>SEXE</th>
            <th>DATE SE NAISSANCCE</th>
            <th>NOMBRE D'APPARITION</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requete->fetchAll() as $acteur){ ?>
                <tr>
                    <td><a href="index.php?action=detActeurs&id=<?= $acteur["id"] ?>"><?= $acteur["nomActeur"] ?></a></td>
                    <td class="toCenter"><?= $acteur["sexe"] ?></td>
                    <td class="toCenter"><?= $acteur["date"] ?></td>
                    <td class="toCenter petit"><?= $acteur["nbLa"] ?></td>
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