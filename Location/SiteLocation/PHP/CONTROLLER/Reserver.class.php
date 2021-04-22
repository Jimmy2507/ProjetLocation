<?php class Reserver { 
/*****************Attributs***************** */
     private $_idReserver;
	 private $_idUser;
	 private $_idVoiture;
	 private $_idAgence;
	 private $_dateReservation;
	 private $_dateDebutReservation;
	 private $_dateFinReservation;
	 private $_quantite;
/*****************Accesseurs***************** */
public function getIdReserver()
{
     return $this->_idReserver;
}
public function setIdReserver($idReserver)
{
     $this->_idReserver = $idReserver;
}
public function getIdUser(){
	return $this->_idUser;
}
public function setIdUser($idUser){
	$this->_idUser = $idUser;
}
public function getIdVoiture(){
	return $this->_idVoiture;
}
public function setIdVoiture($idVoiture){
	$this->_idVoiture = $idVoiture;
}
public function getIdAgence(){
	return $this->_idAgence;
}
public function setIdAgence($idAgence){
	$this->_idAgence = $idAgence;
}
public function getDateReservation(){
	return $this->_dateReservation;
}
public function setDateReservation($dateReservation){
	$this->_dateReservation = $dateReservation;
}
public function getDateDebutReservation(){
	return $this->_dateDebutReservation;
}
public function setDateDebutReservation($dateDebutReservation){
	$this->_dateDebutReservation = $dateDebutReservation;
}
public function getDateFinReservation(){
	return $this->_dateFinReservation;
}
public function setDateFinReservation($dateFinReservation){
	$this->_dateFinReservation = $dateFinReservation;
}
public function getQuantite(){
	return $this->_quantite;
}
public function setQuantite($quantite){
	$this->_quantite = $quantite;
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