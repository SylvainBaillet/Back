<?php
//---------Connexion BDD
$bdd = new PDO('mysql:host=localhost;dbname=location_bretagne','root', '', array(PDO:: ATTR_ERRMODE => PDO :: ERRMODE_WARNING, PDO :: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


define("RACINE_SITE", $_SERVER['DOCUMENT_ROOT'] . '/Back/test_site_perso/site_location_bretagne/' ); //lors de l'enregistrement d'image / photos, nous aurons besoin du chemin physique pour enregistrer la photo dans le bon dossier 
// echo RACINE_SITE; 


define("URL", "http://localhost/Back/test_site_perso/site_location_bretagne/");/* Cette constante servira a enregistrer  l'URL d'une photo / image dans la BDD. On ne conserve jamais la photo elle même, ce serait trop lourd pour la BDD */
//--------FAILLES XSS
foreach($_POST as $key => $value)
{
    $_POST[$key] = strip_tags(trim($value));// 'strip_tags', supprime les balises HTML, et 'trim' supprime les espaces en debut et fin de chaine.
}
//--------GET    
foreach($_POST as $key => $value)
{
    $_GET[$key] = strip_tags(trim($value));
}

?>