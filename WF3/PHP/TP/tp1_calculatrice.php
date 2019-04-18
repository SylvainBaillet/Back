<?php

if(isset($_POST['nombre1']) AND isset($_POST['choix']) AND isset($_POST['nombre2'])) // Si les varaibles existent ...
{
	$nombre1 =htmlspecialchars($_POST['nombre1']); // On sécurise ...
	$choix = htmlspecialchars($_POST['choix']); 
	$nombre2 = htmlspecialchars($_POST['nombre2']);

	if($nombre1 != NULL AND $nombre2 != NULL) // Puis on vérifie leur valeur ...
	{
		if($choix == 'division' AND $nombre2 == 0)
		{
			echo 'On peut pas diviser par 0 voyons !';
		}
		else 
		{	
			if($choix == 'addition') 
			{
			$resultat = $nombre1 + $nombre2;
			echo 'La somme de ces deux nombres est '.$resultat;
			}
			
			if($choix == 'soustraction') // Si on a choisi la soustraction, on calcul la différence.
			{
			$resultat = $nombre1 - $nombre2; // On calcul
			echo 'La différence de ces deux nombres est '.$resultat; // Puis on affiche le résultat
			}
			
			if($choix == 'multiplication')
			{	
			$resultat = $nombre1 * $nombre2;
			echo 'Le produit de ces deux nombres est '.$resultat;
			}
		
			if($choix == 'division')
			{
			$resultat = $nombre1 / $nombre2;
			echo 'Le quotient de ces deux nombres est '.$resultat;
			}
		}
		}
	else // Si les champs n'ont pas étaient renseigné, on affiche un message d'erreur ...
	{
	echo 'Veuillez renseigner tous les champs.';
	}
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>TP Calculatrice</title>
  </head>
  <body>

 <div class="row">
    <form class="col-md-6 offset-md-3" method="post" action="">
        <div class="form-group">
            <label for="Pseudo">chiffre 1</label>
            <input type="text" class="form-control col-md-3" id="Pseudo" name="nombre1" placeholder="nombre 1">
        </div> 
        <label for="exampleFormControlSelect1">Oprérateur</label>
                    <select class="form-control col-md-3" id="exampleFormControlSelect1" name="choix">
                        <option value="addition">+</option>
                        <option value="soustraction">-</option>
                        <option value="multiplication">*</option>
                        <option value="division">/</option>
                    </select>

        <div class="form-group">
            <label for="Pseudo">Chiffre 2</label>
            <input type="text" class="form-control col-md-3" id="Pseudo" name="nombre2" placeholder="nombre 2">
        </div> 
        <button type="submit" class="btn btn-primary col-md-3">Calculer</button>
    </form>
</div> 
<!--  -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

 
</body>
</html>