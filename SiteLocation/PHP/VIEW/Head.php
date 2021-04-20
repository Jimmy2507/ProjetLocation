<!DOCTYPE html>
<html lang="fr">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    
    DbConnect::init();