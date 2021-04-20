<?php
$uti = UserManager::findByMail($_POST['mailUser']);
if ($uti != false)
{
    if (crypte($_POST['password']) == $uti->getPassword())
    {
        echo 'connexion reussie';
        $_SESSION['utilisateur']=$uti;
        header("refresh:1;url=index.php?page=pageCo");
    }
    else
    {
        echo 'le mot de passe est incorrect';
        header("refresh:1;url=index.php?page=connexion");
    }
}else
{
    echo "L'adresse mail n'existe pas";
    header("refresh:1;url=index.php?page=connexion");
}