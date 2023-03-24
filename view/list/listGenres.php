<?php
ob_start();
?>

<div class="surTableau">
    <p>Il y a <?= $requete->rowCount() ?> films</p>
    <a href="index.php?action=formGenre">Ajoutez</a>
</div>

<table>
    <thead>
        <tr>
            <th>Genre</th>
            <th>Nombre d'apparition</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($requete->fetchAll() as $genre) { ?>
            <tr>
                <td><a href="index.php?action=detGenres&id=<?= $genre["unGenre"] ?>"> <?= $genre["libelle_genre"] ?> </a></td>
                <td class="toCenter petit"><?= $genre["nbLa"] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php
$titre = "Liste des genres";
$titre_secondaire = "Liste des genres";
$contenu = ob_get_clean();
require "view/template.php";
?>