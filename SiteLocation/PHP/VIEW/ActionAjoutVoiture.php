<?php
$erreur=false;
$v = new Voiture($_POST);
VoitureManager::add($v);
header('location:?page=PageAdmin');