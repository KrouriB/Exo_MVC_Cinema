<?php
ob_start();
$film = $requete->fetchAll();
$affiche = ($requete[0]['image_film']) ? "<figure><img src='/www/img/".$requete[0]['image_film']."' alt=''></figure>" : null ;
$resume = ($requete[0]['resume_film']) ? "<p>".$requete[0]['resume_film']."</p>" : null ;
if($requete[0]['note_film'] != null){
    $note = "<div id='laNote'>";
    if($requete[0]['note_film'] == 5){
        for($i=0;$i<$requete[0]['note_film'];$i++){
            $note .= "<i class='fa-solid fa-star'></i>";
        }
    }elseif($requete[0]['note_film'] == 0){
        for($i=0;$i<$requete[0]['note_film'];$i++){
            $note .= "<i class='fa-regular fa-star'></i>";
        }
    }else{
        for($i=0;$i<$requete[0]['note_film'];$i++){
            $note .= "<i class='fa-solid fa-star'></i>";
        }
        for($i=0;$i<5-$requete[0]['note_film'];$i++){
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
        <p>Ce film a été réaliser par <a href=""></a> d'une durée de  est sortie le </p>
        <?= $resume ?>
    </div>
</div>

<div class="liste"><?php foreach($film as $unFilm){ ?>
    <p><?= ?></p>
<?php } ?></div>

<?php
$titre = $film[0]['titre_film'];
$titre_secondaire = "Le film ".$film[0]['titre_film'];
$contenu = ob_get_clean();
require "view/template.php";
?>