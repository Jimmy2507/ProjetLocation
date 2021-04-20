<h1>Connecté</h1>

<?php
    if($_SESSION["utilisateur"]->getIdRole()==1){
        echo "Session Administrateur";
    }else{
        echo "Session Utilisateur ";
    }
?>