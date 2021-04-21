<h1>Gestion des utilisateur</h1>
<?php
$mode = $_GET['mode'];

if (isset($_GET['id']))
{
    $user = UserManager::findById($_GET['id']);
    $idUser = $user->getIdUser();
}
else
{
    $user = new User();
    $idCateg = 1;
}
$listeRole=RoleManager::getList();

switch ($mode)
{
    case "modifier":

        $sousTitre = '<h5>Modifier un  utilisateur</h5></div>';
        $dis = "";
        $submit = '<div class="ligneDetail"><input type="submit" value="modifier" class=""/>';
        break;

    case "supprimer":

        $sousTitre = '<h5>Supprimer un  utilisateur</h5></div>';
        $dis = " disabled ";
        $submit = '<div class="ligneDetail"><input type="submit" value="supprimer" class=""/>';
        break;

    case "detail":

        $sousTitre = '<h5>Detail de l\'utilisateur</h5></div>';
        $dis = " disabled ";
        $submit = '<div class="ligneDetail"><input type="submit" value="detail" class=""/>';
        break;

}
echo $sousTitre;
echo '<form id="formulaire" method="post" action="index.php?page=ActionUser&mode=' . $mode . '">';

echo '
<input type="hidden" name="idUser" value="' . $user->getIdUser() . '">';

echo '
    <div class="ligneDetail">
    <div class="libelleInput"> Prenom :</div>
    <div class="input"> <input type="text" name="prenomUser"
            value="' . $user->getPrenomUser() . '" ' . $dis . '></div>
    </div>
    <div class="libelleInput"> Nom :</div>
    <div class="input"> <input type="text" name="nomUser"
        value="' . $user->getNomUser() . '" ' . $dis . '></div>
    </div>
    <div class="libelleInput"> Adresse Mail :</div>
    <div class="input"> <input type="text" name="mailUser"
        value="' . $user->getMailUser() . '" ' . $dis . '></div>
    </div>
    <div class="libelleInput"> Numero de telephone :</div>
    <div class="input"> <input type="text" name="numTel"
        value="' . $user->getNumTel() . '" ' . $dis . '></div>
    </div>
    <div class="ligneDetail">
        <div class="libelleInput">
            Password :</div>';
            if($mode!="detail"){
                echo '<div class="input"> <input type="password" name="password" value="' . $user->getPassword() . '" ' . $dis . '>';
            }else{
                echo '<div class="input"> <input type="text" name="password" value="' . $user->getPassword() . '" ' . $dis . '>';
            }
        echo'
        </div>
    </div>

    <div class="ligneDetail">
        <div class="libelleInput">
            Role  :</div>
        <div class="input">
    <select name="idRole" >';

foreach ($listeRole as $role ) {
    $sel = "";
    if ($role->getIdRole() == $user->getIdRole())
    {
        $sel = "selected";
    }    
    echo '<option value="' . $role->getIdRole() . '" ' . $sel .$dis. ' >' . $role->getNomRole() . '</option>';
}
echo '
    </select></div>
    </div>';
    if($mode != "detail"){
       echo $submit; 
    }

?>
<a href="?page=ListeUser" class=" crudBtn crudBtnRetour">Annuler</a>
</form>