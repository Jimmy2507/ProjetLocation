<?php
//var_dump($_POST);
if ($_POST['password'] == $_POST['confirmation'])
{
    $uti = UserManager::findByMail($_POST['mailUser']);
    if ($uti == false)
    {
        $u = new User($_POST);
        //encodage du mot de passe
        $u->setPassword(crypte($u->getPassword()));
        UserManager::add($u);
    }else{
        echo "L'adresse mail existe deja";
    }
}else{
    echo "la confirmation ne correspond pas au mot de passe";
}