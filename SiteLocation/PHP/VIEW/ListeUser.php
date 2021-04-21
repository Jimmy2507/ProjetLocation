<h1>Liste des utilisateur</h1>
<?php
    $listeUser = UserManager::getList();
    if (count($listeUser)>0) {
        foreach ($listeUser as $u ) {
          echo '
                <div class="username">Prenom:'.$u->getPrenomUser().'</div>
                <div class="Utilisateur">
                    <a href="?page=FormGestion&mode=detail&id='.$u->getIdUser().'"><button class="btn">Detail</button></a>
                    <a href="?page=FormGestion&mode=modifier&id='.$u->getIdUser().'"><button class="btn">Modifier</button></a>
                    <a href="?page=FormGestion&mode=supprimer&id='.$u->getIdUser().'"><button class="btn">Supprimer</button></a>  
                </div> ';   
        }
    }else{
        echo '<h1>Pas D\'utilisateur !</h1>';
    }   
?>
<a href="index.php?page=PageAdmin">Retour</a>