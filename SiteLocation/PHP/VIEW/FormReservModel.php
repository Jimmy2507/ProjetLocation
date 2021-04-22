<?php
$marqueVoiture =$_POST["marqueVoiture"];

$listevoiture=VoitureManager::getListModelByMarque($marqueVoiture);
// var_dump($listeModel);
?>
<form action="index.php?page=actionReservationModele" method="POST">
<div><label for="agence"><?php echo $_POST["marqueVoiture"]?></label></div>
<div>
               
            <label for="model">model</label>
            <select name="modelVoiture" id="model">
                <?php 
                // var_dump ($_POST)  ;       
                foreach ($listevoiture as $voiture ) {
                    // if ($_POST["marqueVoiture"]==$model->getMarqueVoiture()) {
                        echo "<option value=".$voiture->getModelVoiture().">".$voiture->getModelVoiture()."</option>";
                    
                }?>  
            </select>
            <!-- <input type="text" name="model" require/> -->
        </div>
        <div>
            <label for="dateDebut">date de debut</label>
            <input type="date" name="dateDebut" require/>
        </div>
        <div>
            <label for="dateFin">date de fin</label>
            <input type="date" name="dateFin" require/>
        </div>
        <div>
            <label for="agence">selectioner agence</label>
            <input type="text" name="agence"  />
        </div>
        <div>
            <button type="submit">Validé</button>
        </div>
    </form>
