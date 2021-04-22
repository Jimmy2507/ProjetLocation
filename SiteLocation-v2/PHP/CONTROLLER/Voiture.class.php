<?php class Voiture { 
/*****************Attributs***************** */
	 private $_idVoiture;
	 private $_modelVoiture;
	 private $_marqueVoiture;
	 private $_typeCarburant;
	 private $_nbPlace;
/*****************Accesseurs***************** */
public function getIdVoiture(){
	return $this->_idVoiture;
}
public function setIdVoiture($idVoiture){
	$this->_idVoiture = $idVoiture;
}
public function getModelVoiture(){
	return $this->_modelVoiture;
}
public function setModelVoiture($modelVoiture){
	$this->_modelVoiture = $modelVoiture;
}
public function getMarqueVoiture(){
	return $this->_marqueVoiture;
}
public function setMarqueVoiture($marqueVoiture){
	$this->_marqueVoiture = $marqueVoiture;
}
public function getTypeCarburant(){
	return $this->_typeCarburant;
}
public function setTypeCarburant($typeCarburant){
	$this->_typeCarburant = $typeCarburant;
}
public function getNbPlace(){
	return $this->_nbPlace;
}
public function setNbPlace($nbPlace){
	$this->_nbPlace = $nbPlace;
}
/*****************Constructeur******************/ 
public function __construct(array $options = [])
{
    if (!empty($options)) // empty : renvoi vrai si le tableau est vide
    {
        $this->hydrate($options);
    }
}
public function hydrate($data)
{
    foreach ($data as $key => $value)
    {
        $methode = "set" . ucfirst($key); //ucfirst met la 1ere lettre en majuscule
        if (is_callable(([$this, $methode]))) // is_callable verifie que la methode existe
        {
            $this->$methode($value);
        }
    }
}
/*****************Autres Méthodes***************** */ 
    /**
    * Transforme l'objet en chaine de caractères
    *
    * @return String
    */
   public function toString()
   {
       return "";
   }

   /**
    * Renvoi vrai si l'objet en paramètre est égal à l'objet appelant
    *
    * @param [type] $obj
    * @return bool
    */
   public function equalsTo($obj)
   {
       return true;
   }
   /**
    * Compare 2 objets
    * Renvoi 1 si le 1er est >
    *        0 si ils sont égaux
    *        -1 si le 1er est <
    *
    * @param [type] $obj1
    * @param [type] $obj2
    * @return void
    */
   public static function compareTo($obj1, $obj2)
   {
       return 0;
   }
}