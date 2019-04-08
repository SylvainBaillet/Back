<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Cookie PHP</title>
</head>
<body>
<!-- Un cookie est un fichier conservé côté client (chez l'utilisateur) il contient des données non sensibles (derniers articles consultés, langue preferée du site etc...) -->

<div class="container text-center">
<hr><h1 class="display-4 text-center">COOKIE PHP</h1><hr>

<?php
if(isset($_GET['pays'])) // on entre dans la condition dans le cas ou on a cliqué sur un lien et donc envoyé un pays dans l'url.
{
    $pays = $_GET['pays'];
}
elseif(isset($_COOKIE['pays'])) // on entre dans la condituion elseif dans le cas ou un cookie a été créé et que par exemple nous revenons sur le site 3 mois plus tard 
{
    $pays = $_COOKIE['pays'];
}
else
{
    $pays = "fr"; // on entre dans le cas else, le cas par defaut, lors de la premiere visite sur le site, lorsqu'aucun cookie n'est créé 
}

//-----------------------
// Création fichier cookie
$un_an = 365*24*3600; // correspond à une année en secondes, ce sera la durée de notre cookie

setcookie("pays", $pays, time()+$un_an);/* permet de créer un fichier cookie qui est conservé coté client, c'est a dire sur l'ordinateur de l'internaute. 3 arguments: nom du cookie / valeur du cookie / durée de vie */
echo '<pre>'; print_r($_COOKIE); echo '</pre>';


switch($pays)
{
    case 'fr'; 
    echo "vous êtes sur un site en français <br>";
    break;
    case 'be'; 
    echo "vous êtes sur un site en Beninois <br>";
    break;
    case 'ch'; 
    echo "vous êtes sur un site en Chinois <br>";
    break;
    case 'pe';
    echo "vous êtes sur un site en Péruvien <br>";
    break;
}
?>

<h2>Votre langue :</h2>

<ul class="col-md-2 offset-md-5 list-group">
    <li class="list-group-item"><a href="?pays=fr">France</a></li>
    <li class="list-group-item"><a href="?pays=be">Benin</a></li>
    <li class="list-group-item"><a href="?pays=ch">Chine</a></li>
    <li class="list-group-item"><a href="?pays=pe">Perou</a></li>
   
</ul>
</div>
    
</body>
</html>