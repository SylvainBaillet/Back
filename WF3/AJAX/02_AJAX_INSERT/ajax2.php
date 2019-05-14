<?php

require_once("init.php");

extract($_POST);

$tab = array();

// requete test
// $result = $bdd->query("INSERT INTO employes (prenom) VALUES ('sylvain')"); /* pour controler que ma requete php fonctionne, je rentre charge dans l'url mon fichier php 'ajax2.php' */

if(!empty($personne))
{
    $result = $bdd->query("INSERT INTO employes (prenom) VALUES ('$personne')");
    $tab['resultat'] = "<div class='col-md-6 offset-md-3 alert alert-success text-center'>L'employé <strong>$personne</strong> à bien été enregistré</div>";
}
else
{
    $tab['resultat'] = "<div class='col-md-6 offset-md-3 alert alert-danger text-center'>Merci de saisir un prénom</div>";
}

echo json_encode($tab); /* Pour pouvoir faire vehiculer des données en HTTP via une requete, nous devons encoder les données en JSON, c'est un format leger. C'est la réponse de la requete 'retour' AJAX que l'on retrouve dans function(data) dans le fichier ajax2.js */