<?php
$listereservation=ReserverManager::getList();
?>
    <form action="index.php?page=actionReservModel" method="POST">
        <div>
            <label for="marque">marque</label>
            <select name="marqueVoiture" id="marque">
                <?php $listeVoiture=VoitureManager::getList();          
                foreach ($listeVoiture as $marque ) {
                    echo "<option value=".$marque->getidMarqueVoiture().">".$marque->getMarqueVoiture()."</option>";
                }?>  
                
            </select>
            <button type="submit">Validé</button>
            <!-- <input type="text" name="marque" require/> -->
        </div>
      

<a href="?page=Accueil" class=" crudBtn crudBtnRetour">Retour</a>