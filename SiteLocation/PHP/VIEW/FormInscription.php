<?php
$listeRole=RoleManager::getList();
?>
    <form action="index.php?page=actionInscription" method="POST">
        <div>
            <label for="prenomUser">Prenom</label>
            <input type="text" name="prenomUser" require/>
        </div>
        <div>
            <label for="nomUser">Nom</label>
            <input type="text" name="nomUser" require/>
        </div>
        <div>
            <label for="mailUser">Adresse Mail</label>
            <input type="text" name="mailUser" require/>
        </div>
        <div>
            <label for="numTel">Numero de Telephone</label>
            <input type="text" name="numTel" require/>
        </div>
        <div>
            <label for="role">Role (1 admin 2 user)</label>
            <input type="text" name="idRole" required />
        </div>
        <div>
            <label for="password">Mot De Passe</label>
            <input type="password" name="password" required />
        </div>
        <div>
            <label for="confirmation">Confirmation du mot de passe</label>
            <input type="password" name="confirmation" required />
        </div>
        <div>
            <button type="submit">Validé</button>
        </div>
    </form>

<a href="?page=Accueil" class=" crudBtn crudBtnRetour">Retour</a>