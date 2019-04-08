<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Boutique</title>
</head>
<body>
<div class="container text-center">
    <hr><h1 class="display-4 text-center"> Bienvenue dans notre boutique !!</h1><hr>

        <!-- derriere le lien, on met un point d'interrogation '?' qui permet de delimiter les arguments et l'url de destination  un indice = une valeur-->
        <div class="col-md-4 offset-md-4">
        <img src="images/tshirt_rouge.jpg" style=back alt="tshirt-rouge">
        <a href="fiche_produit.php?id=1&type=tshirt&couleur=rouge&prix=15">Voir le détail du produit 1</a><br>
        </div>
        
        <a href="fiche_produit.php?id=2&type=pantalon&couleur=bleu&prix=30">Voir le détail du produit 2</a><br>
        <a href="fiche_produit.php?id=3&type=sweat&couleur=vert&prix=50">Voir le détail du produit 3</a><br>
        <a href="fiche_produit.php?id=4&type=chaussette&couleur=marron&prix=5">Voir le détail du produit 4</a><br>
        <a href="fiche_produit.php?id=5&type=chaussure&couleur=beige&prix=55">Voir le détail du produit 5</a><br>
 
</div>
    
</body>
</html>