<?php
//---------Connexion BDD
$bdd = new PDO('mysql:host=localhost;dbname=site','root', '', array(PDO:: ATTR_ERRMODE => PDO :: ERRMODE_WARNING, PDO :: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

//---------SESSION
session_start();

//---------CHEMIN
define("RACINE_SITE", $_SERVER['DOCUMENT_ROOT'] . '/Back/WF3/PHP/10_site/' ); //lors de l'enregistrement d'image / photos, nous aurons besoin du chemin physique pour enregistrer la photo dans le bon dossier 
// echo RACINE_SITE; 
//  $_SERVER['DOCUMENT_ROOT'] renvoie c:/xampp/htdocs  , a partir de la je concatene avec le bon chemin de notre site.

define("URL", "http://localhost/Back/WF3/PHP/10_site/");/* Cette constante servira a enregistrer  l'URL d'une photo / image dans la BDD. On ne conserve jamais la photo elle même, ce serait trop lourd pour la BDD */
// echo URL;

//--------VARIABLES
/* On declare des variables a vide qui nous serviront ensuite */
$error = '';// message d'erreur
$validate = ''; //message de validation
$content = ''; // permettra de placer du contenu ou l'on souhaite

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

//---------INCLUSIONS
/* On inclue directement le fichier 'fonction.php' dans 'init.php', cela evitera de l'appeller sur chaque page. */
require_once('fonction.php');
?>