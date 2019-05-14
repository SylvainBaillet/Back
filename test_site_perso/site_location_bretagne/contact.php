<?php

require_once('include/init.php');
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


<form class="col-md-6 offset-md-3 formContact" method="post" action="">
  <div class="form-group">
    <label for="Pseudo">Pseudo</label>
    <input type="text" class="form-control col-md-12" id="Pseudo" name="pseudo" placeholder="pseudo">
  </div> 
  <div class="form-group">
    <label for="exampleInputPassword1">Mot de passe</label>
    <input type="text" class="form-control col-md-12" id="exampleInputPassword1" name="mdp" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword2">Mot de passe</label>
    <input type="text" class="form-control col-md-12" id="exampleInputPassword2" name="mdp2" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="Nom">Nom</label>
    <input type="text" class="form-control col-md-12" id="nom" name="nom" placeholder="Nom">
  </div> 
  <div class="form-group">
    <label for="Prenom">Prenom</label>
    <input type="text" class="form-control col-md-12" id="prenom" name="prenom" placeholder="Prenom">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" class="form-control col-md-12" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Civilité</label>
    <select class="form-control" name="civilite" id="exampleFormControlSelect1">
    <!-- si  un fruit a bien été selectionné et que ce fruit est égal à 'cerises', alors on affiche 'selected' dans la balise option -->
      <option value="f"
      <?php if(isset($_POST['civilite']) && $_POST['civilite'] == 'f') echo 'selected' ?>>Femme</option>
                            <?= (isset($_POST['civilite']) && $_POST['civilite'] == 'f') ? 'selected' : ''?>
      <option value="m"<?php if(isset($_POST['civilite']) && $_POST['civilite'] == 'm') echo 'selected' ?>>Homme</option> 
    </select>
  </div>
  <div class="form-group">
    <label for="Ville">Ville</label>
    <input type="text" class="form-control col-md-12" id="ville" name="ville" placeholder="Ville">
  </div>
  <div class="form-group">
    <label for="Code Postal">Code Postal</label>
    <input type="text" class="form-control col-md-12" id="codepostal" name="code_postal" placeholder="Code Postal">
  </div>
  <div class="form-group">
    <label for="Adresse">Adresse</label>
    <input type="text" class="form-control col-md-12" id="adresse" name="adresse" placeholder="Adresse">
  </div>
  <button type="submit" class="btn btn-primary">Envoyer</button><!-- pour pouvoir voir le boutton caché par la nav fixe, dans le css, on ajoute un margin-bottom sur la class du button dans le css-->
</form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  </div>
  </body>
</html>