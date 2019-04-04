<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<form class="col-md-4 offset-md-4" method="post" action="">
  <div class="form-group">
    <label for="Pseudo">Pseudo</label>
    <input type="text" class="form-control col-md-12" id="Pseudo" name="pseudo" placeholder="pseudo">
  </div> 
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" class="form-control col-md-12" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="text" class="form-control col-md-12" id="exampleInputPassword1" name="mdp1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword2">Password</label>
    <input type="text" class="form-control col-md-12" id="exampleInputPassword2" name="mdp2" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="Nom">Nom</label>
    <input type="text" class="form-control col-md-12" id="nom" name="nom" placeholder="Nom">
  </div> <div class="form-group">
    <label for="Prenom">Prenom</label>
    <input type="text" class="form-control col-md-12" id="prenom" name="prenom" placeholder="Prenom">
  </div> <div class="form-group">
    <label for="Telephone">Telephone</label>
    <input type="text" class="form-control col-md-12" id="telephone" name="telephone" placeholder="Telephone">
  </div> <div class="form-group">
    <label for="Adresse">Adresse</label>
    <input type="text" class="form-control col-md-12" id="adresse" name="adresse" placeholder="Adresse">
  </div> <div class="form-group">
    <label for="Ville">Ville</label>
    <input type="text" class="form-control col-md-12" id="ville" name="ville" placeholder="Ville">
  </div> <div class="form-group">
    <label for="Code Postal">Code Postal</label>
    <input type="text" class="form-control col-md-12" id="codepostal" name="codepostal" placeholder="Code Postal">
  </div> 
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<!-- 
    1- réaliser un formulaire HTML avec les champs suivants: pseudo, mdp, confirmer mdp, nom, prenom, telephone, adresse, ville, code postal, et un bouton submit.

    2- controler en PHP que l'on receptionne bien toutes les données du formulaire

    3- Faites en sorte d'informaer l'internaute si le pseudo n'est pas compris entre 2 et 20 caracteres

    4- faites en sorte d'informer l'internaute si les mdp ne sont pas identiques

    5- faites en sorte d'informer l'internaute si les mdp ne sont pas au bon format

    6- faites en sorte d'informer que le champ code postal n'est pas au bon format avec: is_numeric et si il est different de 5 caracteres

    7- faites en sorte d'informer l'internaute si le champ nom est laissé vide

    8_ Faites en sorte d'informer l'internaute si le champ telephone n'est pas valide (indice: expression reguliere -> fonction predefinie preg_match())

    9_ Faites en sorte d'informer l'internaute si il a correctement rempli le fomulaire 
 -->

<?php
//exo 2 : toujours verifier avec un print_r($_POST) qu'on receptionne bien tous les champs
echo '<pre>'; print_r($_POST); echo '</pre>';
$erreur = "";
//exo 3: 
if($_POST)// si on valide le formulaire on entre dans le IF
{
    if(iconv_strlen($_POST['pseudo']) < 2 || iconv_strlen($_POST['pseudo']) > 20)
    {
    $erreur .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Le pseudo doit contenir entre 2 et 20 caractéres</div> ';
    }
    //exo 4
    /* si la valeur du champ mot de passe est different du confirmer mot de passe, on envoie un message d'erreur */
    if($_POST['mdp1'] !== $_POST['mdp2'])
    {   
    $erreur .='<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Les deux champs mot de passe doivent être identiques</div> ';    
    }
    //exo 5 , avec le '!' on ecrit si le champ email n'est pas au bon format, on affiche le message d'erreur
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
    {
    $erreur .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Le mail est non valide</div> ';
    }
    //exo 6 
    if (!is_numeric($_POST['codepostal']) || iconv_strlen($_POST['codepostal']) !== 5)
    {
    $erreur .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">veuillez saisir un code postal de 5 chiffres</div> ';    
    }
    //exo 7
    if (empty($_POST['nom']))
    {
    $erreur .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Veuillez rentrer un nom</div> ';    
    }
    //exo 8
    /* la fonction preg_match() est une expression reguliere (regex) est toujours entourée de diezes "##" affin de preciser les options
    ^ indique le debut de la chaine
    $ indique la fin de la chaine
    + est la pour dire que les caracteres peuvent être utilisés plusieurs fois
    */
    if (!preg_match('#^[0-9]{10}+$#', $_POST['telephone']))
    {
    $erreur .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Veuillez rentrer un numéro de telephone valide</div> ';    
    }
    //exo 9
    
    echo $erreur;
    /* On stocke tous les messages d'erreurs dans la variable '$erreur', si cette variable est vide, cela veut dire que nous ne sommes entrés dans aucune des conditions IF, donc que l'internaute a bien rempli les champs controlés, on affiche donc un message de validation */
    if(empty($erreur))
    {
        echo '<div class="col-md-4 offset-md-4 alert alert-success text-center text-dark">Bravo vous avez réussi</div> ';
    }
    
}



?>
    
</body>
</html>