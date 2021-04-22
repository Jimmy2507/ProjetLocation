<?php
class VilleManager{
    public static function add(Ville $objet){
        $db = DbConnect::getDb();
        $q = $db->prepare("INSERT INTO Ville(idVille,nomVille,codePostal) VALUES (:idVille,:nomVille,:codePostal)");
        $q->bindValue(":idVille",$objet->getIdVille());
        $q->bindValue(":nomVille",$objet->getNomVille());
        $q->bindValue(":codePostal",$objet->getCodePostal());
        $q->execute();
    }

    public static function update(Ville $objet){
	    $db = DbConnect::getDb();	$q = $db->prepare("UPDATE Ville SET ** WHERE **");
        $q->bindValue(":idVille",$objet->getIdVille());
        $q->bindValue(":nomVille",$objet->getNomVille());
        $q->bindValue(":codePostal",$objet->getCodePostal());
	    $q->execute();
    }

    public static function delete(Ville $objet){
        $db = DbConnect::getDb();
        $db->exec("DELETE FROM Ville WHERE idVille=" . $objet->getIdVille());
    }

    public static function findById($id){
        $db = DbConnect::getDb();
        $id = (int) $id;  //Verifie pour eviter injection sql
        $q = $db->query("SELECT * FROM Ville WHERE idVille=" . $id);
        $results = $q->fetch(PDO::FETCH_ASSOC);
        if ($results != false){
            return new Ville($results);
        }
        else{
            return false;
        }
    }
    public static function getList(){
        $db = DbConnect::getDb();
        $liste = [];
        $q = $db->query("SELECT * FROM Ville order by nomRole");
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
            if ($donnees != false){
                $liste[] = new Ville($donnees);
            }
        }
        return $liste;  // tableau contenant les objets Roles
    }

}