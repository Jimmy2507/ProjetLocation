<!DOCTYPE html>
<html lang="fr">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <title>Document</title>
        <?php
        if (file_exists("./CSS/style.css"))
            {
                echo '<link rel="stylesheet" href="./CSS/style.css">'; // quand on vient de index.php
            }
            else if (file_exists("../../CSS/style.css"))
            {
                echo '<link rel="stylesheet" href="../../CSS/style.css">';  // quand on vient du dossier VIEW
            }
            ?>
    </head>
    
    <?php
    /* Autoload permet de charger toutes les classes necessaires */
    Parametre::init();
    DbConnect::init();
    ?>

    <body>
<header>

</header>
<main>
<div class="content">
        <span class="slide">
            <a href="#" onclick="openSlideMenu()">
                <i class="fas fa-bars"></i>
            </a>
        </span>

    <div id="menu" class="nav">
        <a href="#" class="close" onclick="closeSlideMenu()">
            <i class="fas fa-times"></i>
        </a>
        <a href="?page=default">Accueil</a>
        <a href="">Réservation</a>
        <a href="?page=connexion">Connexion</a>
        <a href="?page=inscription">S'inscrire</a>
        <a href="">Nous contacter</a>
    </div>
    <h1>LocAFPA</h1>
    </div>    

<script>
    function openSlideMenu(){
        document.getElementById('menu').style.width = '250px';
        document.getElementById('content').style.marginLeft = '250px';
    }
    function closeSlideMenu(){
        document.getElementById('menu').style.width = '0';
        document.getElementById('content').style.marginLeft = '0';
    }
</script>
