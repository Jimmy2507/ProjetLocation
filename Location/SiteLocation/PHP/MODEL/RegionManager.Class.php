<?php
class RegionManager{
    public static function add(Region $objet){
        $db = DbConnect::getDb();
        $q = $db->prepare("INSERT INTO Region(idRegion,nomRegion) VALUES (:idRegion,:nomRegion)");
        $q->bindValue(":idRegion",$objet->getIdRegion());
        $q->bindValue(":nomRegion",$objet->getNomRegion());
        $q->execute();
    }

    public static function update(Region $objet){
	    $db = DbConnect::getDb();	$q = $db->prepare("UPDATE Region SET ** WHERE **");
        $q->bindValue(":idRegion",$objet->getIdRegion());
        $q->bindValue(":nomRegion",$objet->getNomRegion());
        $q->execute();
    }

    public static function delete(Region $objet){
        $db = DbConnect::getDb();
        $db->exec("DELETE FROM Region WHERE idRegion=" . $objet->getIdRegion());
    }

    public static function findById($id){
        $db = DbConnect::getDb();
        $id = (int) $id;  //Verifie pour eviter injection sql
        $q = $db->query("SELECT * FROM Region WHERE idRegion=" . $id);
        $results = $q->fetch(PDO::FETCH_ASSOC);
        if ($results != false){
            return new Region($results);
        }
        else{
            return false;
        }
    }
    public static function getList(){
        $db = DbConnect::getDb();
        $liste = [];
        $q = $db->query("SELECT * FROM Region order by nomRole");
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
            if ($donnees != false){
                $liste[] = new Region($donnees);
            }
        }
        return $liste;  // tableau contenant les objets Roles
    }

}