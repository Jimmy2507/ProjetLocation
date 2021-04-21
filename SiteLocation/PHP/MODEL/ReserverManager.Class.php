<?php
class ReserverManager{
    public static function add(Reserver $objet){
        $db = DbConnect::getDb();
        $q = $db->prepare("INSERT INTO Reserver(idReserver,idUser,idVoiture,idAgence,dateReservation,dateDebutReservation,dateFinReservation,quantite) VALUES (:idReserver,:idUser,:idVoiture,:idAgence,:dateReservation,:dateDebutReservation,:dateFinReservation,:quantite)");
        $q->bindValue(":idReserver",$objet->getIdReserver());
        $q->bindValue(":idUser",$objet->getIdUser());
        $q->bindValue(":idVoiture",$objet->getIdVoiture());
        $q->bindValue(":idAgence",$objet->getIdAgence());
        $q->bindValue(":dateReservation",$objet->getDateReservation());
        $q->bindValue(":dateDebutReservation",$objet->getDateDebutReservation());
        $q->bindValue(":dateFinReservation",$objet->getDateFinReservation());
        $q->bindValue(":quantite",$objet->getQuantite());
        $q->execute();
    }

    public static function update(Reserver $objet){
	    $db = DbConnect::getDb();	$q = $db->prepare("UPDATE Reserver SET ** WHERE **");
        $q->bindValue(":idReserver",$objet->getIdReserver());
        $q->bindValue(":idUser",$objet->getIdUser());
        $q->bindValue(":idVoiture",$objet->getIdVoiture());
        $q->bindValue(":idAgence",$objet->getIdAgence());
        $q->bindValue(":dateReservation",$objet->getDateReservation());
        $q->bindValue(":dateDebutReservation",$objet->getDateDebutReservation());
        $q->bindValue(":dateFinReservation",$objet->getDateFinReservation());
        $q->bindValue(":quantite",$objet->getQuantite());
        $q->execute();
    }

    public static function delete(Reserver $objet){
        $db = DbConnect::getDb();
        $db->exec("DELETE FROM Reserver WHERE idReserver=" . $objet->getIdReserver());
    }   

    public static function findById($id){
        $db = DbConnect::getDb();
        $id = (int) $id;  //Verifie pour eviter injection sql
        $q = $db->query("SELECT * FROM Reserver WHERE idReserver=" . $id);
        $results = $q->fetch(PDO::FETCH_ASSOC);
        if ($results != false){
            return new Reserver($results);
        }
        else{
            return false;
        }
    }
    public static function getList(){
        $db = DbConnect::getDb();
        $liste = [];
        $q = $db->query("SELECT * FROM Reserver");
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
            if ($donnees != false){
                $liste[] = new Reserver($donnees);
            }
        }
        return $liste;  // tableau contenant les objets Roles
    }

}