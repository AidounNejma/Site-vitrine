<?php
// création/ouverture du fichier de session
session_start();
//PREMIERE LIGNE DE CODE, se positionne en haut et en premier avant tout traitement PHP !!!!!

// -------------------------------------------------------------

// connexion à la BDD 'boutique'
$pdo = new PDO('mysql:host=localhost;dbname=site_vitrine', 'root', 'root', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8"));
//var_dump($pdo);

//------------------------------------------------
//définition d'une constante
define('URL', "http://localhost:8888/PHP/site_vitrine/");
//correspond à l'URL de la racine de notre site

//-------------------------------------------------
//définition de variables:
$content = ''; //variable prévue pour recevoir du contenu
$error = ''; // variable prévue pour recevoir les messages d'erreur

//--------------------------------------------------
//inclusion du fichier fonction.inc.php
require_once "fonction.inc.php";

