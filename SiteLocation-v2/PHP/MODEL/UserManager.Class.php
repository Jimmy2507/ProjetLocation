<?php
class UserManager{
    public static function add(User $objet){
        $db = DbConnect::getDb();
        $q = $db->prepare("INSERT INTO User(idUser,prenomUser,password,nomUser,mailUser,numTel,idRole) VALUES (:idUser,:prenomUser,:password,:nomUser,:mailUser,:numTel,:idRole)");
        $q->bindValue(":idUser",$objet->getIdUser());
        $q->bindValue(":prenomUser",$objet->getPrenomUser());
        $q->bindValue(":password",$objet->getPassword());
        $q->bindValue(":nomUser",$objet->getNomUser());
        $q->bindValue(":mailUser",$objet->getMailUser());
        $q->bindValue(":numTel",$objet->getNumTel());
        $q->bindValue(":idRole",$objet->getIdRole());
        $q->execute();
    }

    public static function update(User $objet){
	    $db = DbConnect::getDb();	$q = $db->prepare("UPDATE User SET ** WHERE **");
        $q->bindValue(":idUser",$objet->getIdUser());
        $q->bindValue(":prenomUser",$objet->getPrenomUser());
        $q->bindValue(":password",$objet->getPassword());
        $q->bindValue(":nomUser",$objet->getNomUser());
        $q->bindValue(":mailUser",$objet->getMailUser());
        $q->bindValue(":numTel",$objet->getNumTel());
        $q->bindValue(":idRole",$objet->getIdRole());
	    $q->execute();
    }

    public static function delete(User $objet){
        $db = DbConnect::getDb();
        $db->exec("DELETE FROM User WHERE idUser=" . $objet->getIdUser());
    }

    public static function findById($id){
        $db = DbConnect::getDb();
        $id = (int) $id;  //Verifie pour eviter injection sql
        $q = $db->query("SELECT * FROM User WHERE idUser=" . $id);
        $results = $q->fetch(PDO::FETCH_ASSOC);
        if ($results != false){
            return new User($results);
        }
        else{
            return false;
        }
    }
    public static function getList(){
        $db = DbConnect::getDb();
        $liste = [];
        $q = $db->query("SELECT * FROM User order by nomRole");
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
            if ($donnees != false){
                $liste[] = new User($donnees);
            }
        }
        return $liste;  // tableau contenant les objets Roles
    }

    public static function findByMail($mail)
    {
		$db = DbConnect::getDb();
        if (!in_array(";",str_split( $mail))) // s'il n'y a pas de ; , je lance la requete
        {
            $q = $db->query("SELECT * FROM user WHERE MailUser ='" . $mail . "'");
            $results = $q->fetch(PDO::FETCH_ASSOC);
            if ($results != false)
            {
                return new User($results);
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
}