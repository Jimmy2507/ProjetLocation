<?php
class VoitureManager{
    public static function add(Voiture $objet){
        $db = DbConnect::getDb();
        $q = $db->prepare("INSERT INTO Voiture(idVoiture,modelVoiture,marqueVoiture,typeCarburant,nbPlace) VALUES (:idVoiture,:modelVoiture,:marqueVoiture,:typeCarburant,:nbPlace)");
        $q->bindValue(":idVoiture",$objet->getIdVoiture());
        $q->bindValue(":modelVoiture",$objet->getModelVoiture());
        $q->bindValue(":marqueVoiture",$objet->getMarqueVoiture());
        $q->bindValue(":typeCarburant",$objet->getTypeCarburant());
        $q->bindValue(":nbPlace",$objet->getNbPlace());
        $q->execute();
    }

    public static function update(Voiture $objet){
	    $db = DbConnect::getDb();	$q = $db->prepare("UPDATE Voiture SET ** WHERE **");
        $q->bindValue(":idVoiture",$objet->getIdVoiture());
        $q->bindValue(":modelVoiture",$objet->getModelVoiture());
        $q->bindValue(":marqueVoiture",$objet->getMarqueVoiture());
        $q->bindValue(":typeCarburant",$objet->getTypeCarburant());
        $q->bindValue(":nbPlace",$objet->getNbPlace());
	    $q->execute();
    }

    public static function delete(Voiture $objet){
        $db = DbConnect::getDb();
        $db->exec("DELETE FROM Voiture WHERE idVoiture=" . $objet->getIdVoiture());
    }

    public static function findById($id){
        $db = DbConnect::getDb();
        $id = (int) $id;  //Verifie pour eviter injection sql
        $q = $db->query("SELECT * FROM Voiture WHERE idVoiture=" . $id);
        $results = $q->fetch(PDO::FETCH_ASSOC);
        if ($results != false){
            return new Voiture($results);
        }
        else{
            return false;
        }
    }
    public static function getList(){
        $db = DbConnect::getDb();
        $liste = [];
        $q = $db->query("SELECT * FROM Voiture");
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
            if ($donnees != false){
                $liste[] = new Voiture($donnees);
            }
        }
        return $liste;  // tableau contenant les objets Roles
    }
    public static function getListModelByMarque($marque){
        $db = DbConnect::getDb();
        $liste = [];
        $q = $db->query("SELECT distinct modelVoiture FROM Voiture where marqueVoiture='".$marque."'");
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
            if ($donnees != false){
                $liste[] = new Voiture($donnees);
            }
        }
        return $liste;  // tableau contenant les modele en fonction d une marque
    }

}