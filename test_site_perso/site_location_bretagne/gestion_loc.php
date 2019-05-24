<?php

require_once('include/init.php');
extract($_POST);

// echo '<pre>'; print_r($_POST); echo '</pre>';

if($_POST)
{
  $photo_bdd='';
        if(!empty($_FILES['photo']['name']))/* on verifie que l'indice 'name' dans la superglobale $_FILES n'est pas vide, cela veut dire que l'on a bien uploadé une photo */
            {
        $nom_photo = $titre . '-' . $_FILES['photo']['name'];/* on redefinie le nom de la photo en concaténant la référence saisie dans le formulaire avec le nom de la photo */
        $photo_bdd = URL . "images/$nom_photo";//URL est une constante, tout comme RACINE_SITE
        echo $photo_bdd . '<br>';

        $photo_dossier = RACINE_SITE . "images/$nom_photo";/* on définie l'URL de la photo, c'est ce que l'on conservera en BDD */
       

        copy($_FILES['photo']['tmp_name'], $photo_dossier);/* la fonction predefinie copy() permet de copier la photo dans le dossier photo: arguments: nom temporaire de la photo, chemin de destination */
            }

  $loc_insert = $bdd->prepare("INSERT INTO maisons (titre, taille, chambres, couchage , ville, adresse, prix) VALUES (:titre, :taille, :chambres, :couchage, :ville, :adresse, :prix)");
  foreach($_POST as $key => $value)
  {                        
      $loc_insert->bindValue(":$key", $value, PDO::PARAM_STR);
  }                
  $loc_insert->execute();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Lien fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Liens google font -->
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Lobster" rel="stylesheet"> 

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/locations_bretagne.css">
    <title>locations_bretagne</title>
  </head>
  <body>

   <div class="container-fluid">
  <nav class="nav nav-pills nav-justified bg-secondary fixed-top">
  <a class="nav-item nav-link" href="index.php">Accueil</a>
  <a class="nav-item nav-link" href="locations.php">Locations</a>
  <a class="nav-item nav-link" href="tourisme.php">Tourisme</a>
  <a class="nav-item nav-link" href="qui_sommes_nous.php">Qui sommes nous ?</a>
  <a class="nav-item nav-link" href="contact.php">Nous contacter</a>
  <a class="nav-item nav-link" href="gestion_loc.php">gestion loc</a>
  </nav><!-- fin nav -->

<form class="col-md-6 offset-md-3 formGestion" method="post" action="" enctype="multipart/form-data" ><!-- enctype: obligatoire en PHP pour recolter les informations d'un fichier uploadé -->
  <div class="form-group">
    <label for="Categorie">Titre</label>
    <input type="text" class="form-control col-md-12" id="titre" name="titre" placeholder="titre" >
  </div>  
  
  <div class="form-group">
    <label for="taille">taille</label>
    <input type="text" class="form-control col-md-12" id="taille" name="taille" placeholder="taille" >
  </div> 
  <div class="form-group">
    <label for="Categorie">Chambres</label>
    <input type="text" class="form-control col-md-12" id="chambres" name="chambres" placeholder="chambres" >
  </div>
  <div class="form-group">
    <label for="Titre">couchage</label>
    <input type="text" class="form-control col-md-12" id="couchage" name="couchage" placeholder="couchage" >
  </div>
  <div class="form-group">
    <label for="description">ville</label>
    <input type="text" class="form-control col-md-12" id="ville" name="ville" placeholder="ville" >
  </div> 
  <div class="form-group">
    <label for="Couleur">adresse</label>
    <input type="text" class="form-control col-md-12" id="adresse" name="adresse" placeholder="adresse">
  </div>
  <div class="form-group">
    <label for="Taille">Prix</label>
    <input type="text" class="form-control col-md-12" id="prix" name="prix" placeholder="prix">
  </div>
  <button type="submit" class="btn btn-primary">Envoyer</button>
  <button class="btn btn-success color-white col-md-6 offset-md-3"><a href="locations.php" action="">Afficher les locations</a></button> 
</form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  </div>
  </body>
</html>