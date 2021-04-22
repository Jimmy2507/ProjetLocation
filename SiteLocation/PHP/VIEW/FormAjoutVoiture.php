<?php
?>
    <form action="index.php?page=ActionAjoutVoiture" method="POST">
        <div>
            <label for="marqueVoiture">Marque</label>
            <input type="text" name="marqueVoiture" require/>
        </div>    
        <div>
            <label for="modelVoiture">Model</label>
            <input type="text" name="modelVoiture" require/>
        </div>
        <div>
            <label for="typeCarburant">Type de Carburant</label>
            <select name="typeCarburant">
                <option value="Essence">Essence</option>
                <option value="Diesel">Diesel</option>
                <option value="Electrique">Electrique</option>
            </select>
        </div>
        <div>
            <label for="nbPlace">Nombre de place</label>
            <select name="nbPlace">
                <option value="2">2 places</option>
                <option value="5">5 places</option>
                <option value="7">7 places</option>
            </select>
        </div>
        <div>
            <button type="submit">Ajouter la voiture</button>
        </div>
    </form>

<a href="?page=PageAdmin" class=" crudBtn crudBtnRetour">Retour</a>