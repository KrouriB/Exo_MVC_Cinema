<?php
ob_start();
$film = $requete->fetchAll();
$affiche = ($film[0]['image_film']) ? "<figure><img src='./www/img/".$film[0]['image_film']."' alt=''></figure>" : null ;
$resume = ($film[0]['resume_film']) ? "<p>".$film[0]['resume_film']."</p>" : null ;
if($film[0]['note_film'] != null){
    $note = "<div id='laNote'>";
    if($film[0]['note_film'] == 5){
        for($i=0;$i<$film[0]['note_film'];$i++){
            $note .= "<i class='fa-solid fa-star'></i>";
        }
    }elseif($film[0]['note_film'] == 0){
        for($i=0;$i<$film[0]['note_film'];$i++){
            $note .= "<i class='fa-regular fa-star'></i>";
        }
    }else{
        for($i=0;$i<$film[0]['note_film'];$i++){
            $note .= "<i class='fa-solid fa-star'></i>";
        }
        for($i=0;$i<5-$film[0]['note_film'];$i++){
            $note .= "<i class='fa-regular fa-star'></i>";
        }
    }
    $note .= "</div>";
}else{
    $note = null;
}
?>
<div id="hautFilm">
    <?= $affiche ?>
    <div id="droiteFilm">
        <?= $note ?>
        <p>Ce film a été réaliser par <a href="index.php?action=detReals&id=<?= $film[0]['id_realisateur'] ?>"><?= $film[0]['nomReal'] ?></a> d'une durée de <?= $film[0]['duree'] ?> est sortie le <?= $film[0]['laDate'] ?></p>
        <?= $resume ?>
    </div>
</div>

<div class="liste"><?php foreach($film as $unFilm){ ?>
    <p><a href="index.php?action=detActeurs&id=<?= $unFilm['id_acteur'] ?>"><?= $unFilm['nomActeur'] ?></a> jouant dans le role de <a href="index.php?action=detRoles&id=<?= $unFilm['id_role'] ?>"><?= $unFilm['nom_role'] ?></a></p>
<?php } ?></div>

<?php
$titre = $film[0]['titre_film'];
$titre_secondaire = "Le film ".$film[0]['titre_film'];
$contenu = ob_get_clean();
require "view/template.php";
?>