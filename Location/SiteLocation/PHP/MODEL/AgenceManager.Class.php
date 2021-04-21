<?php
class AgenceManager{
    public static function add(Agence $objet){
        $db = DbConnect::getDb();
        $q = $db->prepare("INSERT INTO Agence(idAgence,nomAgence,adresseAgence,idVille) VALUES (:idAgence,:nomAgence,:adresseAgence,:idVille)");
        $q->bindValue(":idAgence",$objet->getIdAgence());
        $q->bindValue(":nomAgence",$objet->getNomAgence());
        $q->bindValue(":adresseAgence",$objet->getAdresseAgence());
        $q->bindValue(":idVille",$objet->getIdVille());
        $q->execute();
    }

    public static function update(Agence $objet){
	    $db = DbConnect::getDb();	$q = $db->prepare("UPDATE Agence SET ** WHERE **");
        $q->bindValue(":idAgence",$objet->getIdAgence());
        $q->bindValue(":nomAgence",$objet->getNomAgence());
        $q->bindValue(":adresseAgence",$objet->getAdresseAgence());
        $q->bindValue(":idVille",$objet->getIdVille());
        $q->execute();
    }

    public static function delete(Agence $objet){
        $db = DbConnect::getDb();
        $db->exec("DELETE FROM Agence WHERE idAgence=" . $objet->getIdAgence());
    }

    public static function findById($id){
        $db = DbConnect::getDb();
        $id = (int) $id;  //Verifie pour eviter injection sql
        $q = $db->query("SELECT * FROM Agence WHERE idAgence=" . $id);
        $results = $q->fetch(PDO::FETCH_ASSOC);
        if ($results != false){
            return new Agence($results);
        }
        else{
            return false;
        }
    }
    public static function getList(){
        $db = DbConnect::getDb();
        $liste = [];
        $q = $db->query("SELECT * FROM Agence order by nomRole");
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
            if ($donnees != false){
                $liste[] = new Agence($donnees);
            }
        }
        return $liste;  // tableau contenant les objets Roles
    }

}