<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>page 4 - recuperation données formulaire 3</title>
</head>
<body>

<h1 class="display-4 text center">Formulaire 4</h1>



<?php
// echo '<pre>'; print_r($_POST); echo '</pre>';

echo '<div class="col-md-4 offset-md-4 alert alert-success text-center mx-auto">';
foreach($_POST as $key => $value)
{
    echo "$key : $value<br>";
}
echo '</div>';

/* Exo: Si nous n'avions pas de BDD et que nous souhaitions recuperer les emails des vivsiteurs du site, il serait interessant de les enregistrer dans un fichier .txt 
il existe des fonctions en php qui permettent de le faire fopen() / fwhrite() / fclose()
*/

/* fopen() en mode "a" permet de creer le fichier si il n'est pas trouvé, sinon de l'ouvrir */
$fichier = fopen("liste.txt", "a"); 
fwrite($fichier, $_POST['pseudo']. '-' . $_POST['email'] . "\r\n");
// fwrite() permet d'ecrire dans le fichier representé par  la variable $fichier
// "\r\n" sequence d'echappement pour passer à la ligne dans le fichier .txt (<br> ne marche pas dans un fichier .txt)
fclose($fichier);// fclose() qui n'est pas indispensable, permet fermer le fichier et ainsi de liberer de la ressource
?>



</body>
</html>