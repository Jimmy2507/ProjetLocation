<?php
$erreur =false;
//var_dump($_POST);
$u = new User($_POST);
//var_dump($u);
switch ($_GET['mode']) {
    case "modifier":
        UserManager::update($u);
        break;
    case "detail":
        UserManager::findById($u);
        break;
    case "supprimer":
        UserManager::delete($u);
        break;
}
header("location:?page=ListeUser");

