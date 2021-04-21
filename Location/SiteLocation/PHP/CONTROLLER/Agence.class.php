<?php class Agence { 
/*****************Attributs***************** */
	 private $_idAgence;
	 private $_nomAgence;
	 private $_adresseAgence;
	 private $_idVille;
/*****************Accesseurs***************** */
public function getIdAgence(){
	return $this->_idAgence;
}
public function setIdAgence($idAgence){
	$this->_idAgence = $idAgence;
}
public function getNomAgence(){
	return $this->_nomAgence;
}
public function setNomAgence($nomAgence){
	$this->_nomAgence = $nomAgence;
}
public function getAdresseAgence(){
	return $this->_adresseAgence;
}
public function setAdresseAgence($adresseAgence){
	$this->_adresseAgence = $adresseAgence;
}
public function getIdVille(){
	return $this->_idVille;
}
public function setIdVille($idVille){
	$this->_idVille = $idVille;
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