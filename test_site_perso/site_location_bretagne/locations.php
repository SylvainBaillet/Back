<?php 
require_once('include/init.php');

$data = $bdd->query("SELECT * FROM maisons");
$maison = $data->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>'; print_r($maison);echo '</pre>';
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

  <div class="jumbotron jumbotron-fluid jumbo2">
        <div class="container">
          <h1 class="display-4 text-center">Les différentes maisons en location</h1>
        </div>
    </div><!-- fin jumbotron -->

  <?php while($maison = $data->fetch(PDO::FETCH_ASSOC)): ?>

      <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
    <h5 class="card-title"><?= $maison['title'] ?></h5>
    <h4 class="card-title">Taille : <?= $maison['taille'] ?></h4>
    <h4 class="card-title">Card title</h4>
      <p class="card-text">Description : <?= $maison['description'] ?></p>
      <p class="card-text">Prix : <?= $maison['prix'] ?></p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div>

  <?php endwhile; ?>

<button class="btn btn-primary color-white col-md-4 offset-md-4"><a href="gestion_loc.php" action="">Retour au formulaire d'insersion</button> </a>  

  </div><!-- fin div container-fluid -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>