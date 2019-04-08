<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Fiche produit</title>
</head>
<body>

<h1 class="container text-center">
    <hr><h1 class="display-4 text-center">
    DETAIL DU PRODUIT n° <strong class="text-info"> <?=$_GET['id']?> </strong>
    </h1><hr>

    <?php
    echo '<pre>'; print_r($_GET); echo'</pre>';// les informations envoyées dans l'url sont automatiquement stockées da ns la suiperglobale $_GET, cela retourne un tableau ARRAY associatif

    /* Exo: afficher les données dans l'url avec un affichage conventionnel en excluant l'indice 'id' */

       echo '<div class="col-md-4 offset-md-4 alert alert-success text-center mx-auto">';
foreach($_GET as $key => $value)
{
    if($key != 'id')/* si l'indice est different de 'id', on affiche l'indice en fonction de la valeur de la superglobale $_GET (ARRAY), c'est ce qui permet d'exclure l'indice 'id' */
    {
        echo "<strong>$key</strong> : $value<br>";
    }
    
    
    // echo "$_GET['type'] . ' ' . $_GET['couleur'] . ' ' . $_GET['prix'] <br>";
}
echo '</div>';
    ?>

    <a href="boutique.php">Retour a la boutique</a>

</div>

    
</body>
</html>