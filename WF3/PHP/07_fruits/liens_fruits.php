<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Liens fruits</title>
</head>
<body>

<!-- 
    1- effectuer 4 liens HTML pointant sur la meme page avec le nom des fruits.
    2- faites en sorte d'envoyer 'cerises' dans l'url si on clique sur le lien 'cerises'. faire la meme chose avec tout les fruits
    3- tenter d'afficher 'cerises' sur la page web si l'on a cliqué dessus (si la cerise est passée dans l'url par consequent / meme chose avec tous les fruits)
    4- Envoyer l'information a la fonction calcul() afin d'afficher le prix pour 1 kg de cerises (pareil pour tous les fruits)
 -->
<div class="container text-center">


                                                                                    <!-- condition ternaire (PHP7) , ci dessous le '?' et les deux points ':' signifient respectivement 'if' et 'else'-->
    <hr><h1 class="display-4 text-center"> Liens fruits !!<strong class="text-info"> <?=(isset($_GET['type'])) ? $_GET['type'] : "aucun fruit selectionné";?> </strong></h1><hr>
    
        <?php
        //en ecriture condition ternaire
        // <?= remplace echo
        // ? remplace le if
        // : remplace le else

        ?>
        <!-- derriere le lien, on met un point d'interrogation '?' qui permet de delimiter les arguments et l'url de destination  un indice = une valeur-->
        
        <a href="liens_fruits.php?id=1&type=cerises">cerises</a><br>
        <a href="liens_fruits.php?id=2&type=bananes">Bananes</a><br>
        <a href="liens_fruits.php?id=3&type=pommes">Pommes</a><br>
        <a href="liens_fruits.php?id=4&type=peches">Peches</a><br>
        <?php


        require_once('fonction.php');
        if(isset($_GET['type']))
        {
            echo calcul($_GET['type'], 1000);
        }
        
        ?>
</body>
</html>