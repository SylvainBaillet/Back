<?php
//---------Connexion BDD
$bdd = new PDO('mysql:host=localhost;dbname=site_portfolio','root', '', array(PDO:: ATTR_ERRMODE => PDO :: ERRMODE_WARNING, PDO :: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

//----- SESSION
session_start();
var_dump($_SESSION);



define("RACINE_SITE", $_SERVER['DOCUMENT_ROOT'] . '/Back/test_site_perso/site_portfolio/' ); //lors de l'enregistrement d'image / photos, nous aurons besoin du chemin physique pour enregistrer la photo dans le bon dossier 

define("URL", "http://localhost/Back/test_site_perso/site_portfolio/");/* Cette constante servira a enregistrer l'URL d'une photo / image dans la BDD. On ne conserve jamais la photo elle même, ce serait trop lourd pour la BDD */

// variables vides
$error = '';// message d'erreur
$validate = ''; //message de validation

//--------FAILLES XSS
foreach($_POST as $key => $value)
{
    $_POST[$key] = strip_tags(trim($value));// 'strip_tags', supprime les balises HTML, et 'trim' supprime les espaces en debut et fin de chaine.
}
//--------GET    
foreach($_GET as $key => $value)
{
    $_GET[$key] = strip_tags(trim($value));
}

require_once("fonctions.php");
?>

