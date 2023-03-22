<?php
ob_start();
?>

<div class="surTableau">
    <p>Il y a <?= $requete->rowCount() ?> realisateurs</p>
    <a href="index.php?action=formRealisateur">Ajoutez</a>
</div>

<table>
    <thead>
        <tr>
            <th>NOM</th>
            <th><?= mb_strtoupper("Nombre de réalisation") ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requete->fetchAll() as $real){ ?>
                <tr>
                    <td><a href="index.php?action=detReals&id=<?= $real["id"] ?>"><?= $real["nomReal"] ?></a></td>
                    <td class="toCenter petit"><?= $real["nbLa"] ?></td>
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