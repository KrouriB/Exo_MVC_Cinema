<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./www/css/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/50e50e8630.js" crossorigin="anonymous"></script>
    <title><?= $titre ?></title>
</head>

<body>
    <header>
        <a href="index.php?action=formGroup">
            <img src="./www/img/cinelan.webp" alt="">
            <h2>Cinélan</h2>
        </a>
        <nav id="topbar">
            <ul>
                <li><a href="index.php?action=listFilms">Films</a></li>
                <li><a href="index.php?action=listActeurs">Acteurs</a></li>
                <li><a href="index.php?action=listReals">Réalisateurs</a></li>
                <li><a href="index.php?action=listRoles">Rôles</a></li>
                <li><a href="index.php?action=listGenres">Genres</a></li>
            </ul>
        </nav>
    </header>
    <div id="wrapper">
        <main>
            <div id="lecontenu">
                <h1>PDO Cinema</h1>
                <h2><?= $titre_secondaire ?></h2>
                <?= $contenu ?>
            </div>
        </main>
    </div>
    <footer>
        <p>Cinélan by un élève en RaN de Elan Formation</p>
    </footer>
</body>

</html>