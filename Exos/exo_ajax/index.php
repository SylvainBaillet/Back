<?php

/*Exercice 2 : AJAX

    - Créer une page HTML avec un bouton afficher (ce bouton ne recharge pas la page)

    - En ajax (JS + PHP), au click sur le bouton, récupérer et afficher sous la forme d'un tableau HTML les infos des produits de la boutique (BDD : site_commerce)

    - si tout est terminé, ajouter un formulaire pour ajouter un produit (en AJAX) */

?>

<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Exo Ajax</title>
  </head>
  <body>

    <div class="container">
        <h1>Exo Ajax</h1>

        <button type="submit" id="submit" class="col-md-4 text-center btn btn-dark">Envoyer</button>
        
        <div id="resultat"> 
            
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="ajax.js"></script> 
  </body>
</html>