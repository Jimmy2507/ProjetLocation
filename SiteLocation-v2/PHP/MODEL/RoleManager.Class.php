<?php
class RoleManager{
    public static function add(Role $objet){
        $db = DbConnect::getDb();
        $q = $db->prepare("INSERT INTO Role(idRole,nomRole) VALUES (:idRole,:nomRole)");
        $q->bindValue(":idRole",$objet->getIdRole());
        $q->bindValue(":nomRole",$objet->getNomRole());
        $q->execute();
    }

    public static function update(Role $objet){
	    $db = DbConnect::getDb();	$q = $db->prepare("UPDATE Role SET ** WHERE **");
        $q->bindValue(":idRole",$objet->getIdRole());
        $q->bindValue(":nomRole",$objet->getNomRole());
        $q->execute();
    }

    public static function delete(Role $objet){
        $db = DbConnect::getDb();
        $db->exec("DELETE FROM Role WHERE idRole=" . $objet->getIdRole());
    }

    public static function findById($id){
        $db = DbConnect::getDb();
        $id = (int) $id;  //Verifie pour eviter injection sql
        $q = $db->query("SELECT * FROM Role WHERE idRole=" . $id);
        $results = $q->fetch(PDO::FETCH_ASSOC);
        if ($results != false){
            return new Role($results);
        }
        else{
            return false;
        }
    }
    public static function getList(){
        $db = DbConnect::getDb();
        $liste = [];
        $q = $db->query("SELECT * FROM Role order by nomRole");
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
            if ($donnees != false){
                $liste[] = new Role($donnees);
            }
        }
        return $liste;  // tableau contenant les objets Roles
}

}