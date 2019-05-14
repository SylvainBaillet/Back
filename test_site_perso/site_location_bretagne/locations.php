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

  <table class="table col-md-8 mx-auto table-bordered text-center tab1">

  <?php foreach($maison as $key => $tab): ?>
    <tr class="bg-light">
    <?php foreach($tab as $key2 => $value): ?>

    <?php if($key2 == 'photo'): ?>
    <td><img src="<?= $value ?>" alt="<?= $tab['titre'] ?>" class="img-thumbnail" ></td>
    <?php else: ?>
    <td><?= $value ?></td>
    <?php endif; ?>   
     <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  </table>

<button class="btn btn-primary color-white col-md-4 offset-md-4"><a href="gestion_loc.php" action="">Retour au formulaire d'insersion</button> </a>  

  </div><!-- fin div container-fluid -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>