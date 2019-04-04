<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lecture fichier txt</title>
</head>
<body>
<?php
/* Puisque nous avons réussi à introduire des informations dans un fichier .txt (dans exo formulaire4), il serait interessant de faire l'inverse et de lire le contenu d'un fichier .txt */
$nom_fichier = "liste.txt";
$fichier = file($nom_fichier); /* la fonction file() fait tout le travail, elle retourne chaque ligne du fichier liste.txt à des indices différents d'un tableau ARRAY */

echo '<pre>'; print_r($fichier); echo '</pre>';

?>
    
</body>
</html>