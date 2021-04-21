<?php
    function afficherPage($page){
    $chemin= $page[0];
    $nom=$page[1];
    $titre=$page[2];
    include "PHP/VIEW/Head.php";
    include "PHP/VIEW/Header.php";
    include "PHP/VIEW/Nav.php";
    include $chemin.$nom.".php";
    include "PHP/VIEW/Footer.php";    
    }

function ChargerClasse($classe)
{
    if (file_exists("PHP/CONTROLLER/" . $classe . ".Class.php"))
    {
        require "PHP/CONTROLLER/" . $classe . ".Class.php"; // quand on vient de index.php
    }
    if (file_exists("PHP/MODEL/" . $classe . ".Class.php"))
    {
        require "PHP/MODEL/" . $classe . ".Class.php"; // quand on vient de index.php
    }
}
    spl_autoload_register("ChargerClasse");
    //CRYPTAGE MDP
function crypte($mot) //fonction qui crypte le mot de passe
{
    return md5(md5($mot) . strlen($mot));
}
session_start();
$routes =[
    "default"=>["PHP/VIEW/","Accueil","Accueil"],
    "inscription" => ["PHP/VIEW/", "FormInscription", "Identification"],
    "actionInscription" => ["PHP/VIEW/", "ActionInscription", "xx"],
    "connexion" => ["PHP/VIEW/", "FormConnexion", "Identification"],
    "deconnexion"=>["PHP/VIEW/","ActionDeconnexion","xx"],
    "actionConnexion"=>["PHP/VIEW/","ActionConnexion","xx"],
    "pageCo"=>["PHP/VIEW/","pageCo","xx"],
    "PageAdmin"=>["PHP/VIEW/","pageAdmin","Page Administrateur"],
    "ListeUser"=>["PHP/VIEW/","listeUser","Liste des Utilisateur"],
    "FormGestion"=>["PHP/VIEW/","FormGestion","Formulaire Gestion Utilisateur"],
    "ActionUser"=>["PHP/VIEW/","ActionUser","Action Gestionnaire Utilisateur"],
    "FormAjoutVoiture"=>["PHP/VIEW/","FormAjoutVoiture","xx"],
    "ActionAjoutVoiture"=>["PHP/VIEW/","ActionAjoutVoiture","xx"],
];

if (isset($_GET["page"]))
{

    $codePage = $_GET["page"];

    //Si cette route existe dans le tableau des routes
    if (isset($routes[$codePage]))
    {
        //Afficher la page correspondante
        AfficherPage($routes[$codePage]);
    }
    else
    {
        //Sinon afficher la page par defaut
        AfficherPage($routes["default"]);
    }

}
else
{
    //Sinon afficher la page par defaut
    AfficherPage($routes["default"]);

}
