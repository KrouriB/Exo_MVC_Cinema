<?php
ob_start();
$acteurs = $requete1->fetchAll();
$roles = $requete2->fetchAll();
$films = $requete3->fetchAll();
?>

<form action="index.php?action=addCasting" method="post">
    <div class="divForm">
        <div>
            <label for="acteur">Selectionner&nbsp;un&nbsp;Acteur&nbsp;:&nbsp;</label>
            <select name="acteur" id="acteur">
                <option value="">--Veuillez selcetionner une option--</option>
                <?php
                foreach($acteurs as $acteur){
                    ?>
                    <option value="<?= $acteur['idActeur'] ?>"><?= $acteur['nomActeur'] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div>
            <label for="role">Selectionner&nbsp;un&nbsp;Role&nbsp;:&nbsp;</label>
            <select name="role" id="role">
                <option value="">--Veuillez selcetionner une option--</option>
                <?php
                foreach($roles as $role){
                    ?>
                    <option value="<?= $role['idRole'] ?>"><?= $role['nomRole'] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div>
            <label for="film">Selectionner&nbsp;un&nbsp;Film&nbsp;:&nbsp;</label>
            <select name="film" id="film">
                <option value="">--Veuillez selcetionner une option--</option>
                <?php
                foreach($films as $film){
                    ?>
                    <option value="<?= $film['idFilm'] ?>"><?= $film['nomFilm'] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="divSubmit">
        <input type="submit" value="Ajoutez" name="submitCasting">
    </div>
</form>

<div class="boutonPrecdent">
    <a class="lienPrecedent" href="index.php?action=formActeur">Ajoutez un Acteur</a>
    <a class="lienPrecedent" href="index.php?action=formRole">Ajoutez un Role</a>
    <a class="lienPrecedent" href="index.php?action=formFilm">Ajoutez un Film</a>
</div>


<?php
$titre = "";
$titre_secondaire = "";
$contenu = ob_get_clean();
require "view/template.php";
?>

