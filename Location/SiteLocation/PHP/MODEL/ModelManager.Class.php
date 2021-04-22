<?php
class ModelManager{
    public static function add(Model $objet){
        $db = DbConnect::getDb();
        $q = $db->prepare("INSERT INTO Model(idModel,NomModel,idMarque,idVoiture) VALUES (:idModel,:NomModel,:idMarque,:idVoiture)");
        $q->bindValue(":idModel",$objet->getIdModel());
        $q->bindValue(":NomModel",$objet->getNomModel());
        $q->bindValue(":idMarque",$objet->getIdMarque());
        $q->bindValue(":idVoiture",$objet->getIdVoiture());
        $q->execute();
    }

    public static function update(Model $objet){
	    $db = DbConnect::getDb();	$q = $db->prepare("UPDATE Model SET ** WHERE **");
        $q->bindValue(":idModel",$objet->getIdModel());
        $q->bindValue(":NomModel",$objet->getNomModel());
        $q->bindValue(":idMarque",$objet->getIdMarque());
        $q->bindValue(":idVoiture",$objet->getIdVoiture());
	    $q->execute();
    }

    public static function delete(Model $objet){
        $db = DbConnect::getDb();
        $db->exec("DELETE FROM Model WHERE idModel=" . $objet->getIdModel());
    }

    public static function findById($id){
        $db = DbConnect::getDb();
        $id = (int) $id;  //Verifie pour eviter injection sql
        $q = $db->query("SELECT * FROM Model WHERE idModel=" . $id);
        $results = $q->fetch(PDO::FETCH_ASSOC);
        if ($results != false){
            return new Model($results);
        }
        else{
            return false;
        }
    }
    public static function getList(){
        $db = DbConnect::getDb();
        $liste = [];
        $q = $db->query("SELECT * FROM Model order by nomRole");
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
            if ($donnees != false){
                $liste[] = new Model($donnees);
            }
        }
        return $liste;  // tableau contenant les objets Roles
    }

}