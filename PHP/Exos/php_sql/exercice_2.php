<?php
// b-----
echo '<pre>'; print_r($_POST); echo '</pre>';

// c-----
if($_POST)// si on valide le formulaire on entre dans le IF
{
    if(iconv_strlen($_POST['prenom']) < 2 || iconv_strlen($_POST['prenom']) > 30)
    {
    $erreur .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Le pseudo doit contenir entre 2 et 20 caractéres</div> ';
    }
    if(iconv_strlen($_POST['nom']) < 2 || iconv_strlen($_POST['nom']) > 30)
    {
    $erreur .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Le pseudo doit contenir entre 2 et 20 caractéres</div> ';
    }
    //exo 5 , avec le '!' on ecrit si le champ email n'est pas au bon format, on affiche le message d'erreur
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
    {
    $erreur .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Le mail est non valide</div> ';
    }
    if (!is_numeric($_POST['codepostal']) || iconv_strlen($_POST['codepostal']) !== 5)
    {
    $erreur .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">veuillez saisir un code postal de 5 chiffres</div> ';    
    }
    //exo 7
    if (empty($_POST['nom']))
    {
    $erreur .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Veuillez rentrer un nom</div> ';    
    }
    if (!isset($_POST['sexe']) || ($_POST['sexe']) !== 'homme' || ($_POST['sexe']) == 'femme')
    {
    $erreur .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Indiquez si vous êtes une femme ou un homme</div> ';    
    }
    
    echo $erreur;
    /* On stocke tous les messages d'erreurs dans la variable '$erreur', si cette variable est vide, cela veut dire que nous ne sommes entrés dans aucune des conditions IF, donc que l'internaute a bien rempli les champs controlés, on affiche donc un message de validation */
    if(empty($erreur))
    {
        echo '<div class="col-md-4 offset-md-4 alert alert-success text-center text-dark">Bravo vous avez réussi</div> ';
    } 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Exo_php_sql</title>
</head>
<body>
<!-- EXERCICE 1 : 

a- Créer un formulaire d'inscription (methode "POST") avec les champs :
=> Prenom
=> Nom
=> email
=> Adresse
=> cade postal
=> Genre (f/h)

b- Afficher dans un tableau PHP les valeurs saisies dans le formulaire.

c- Effectuer tous les contrôles des champs
-->

<!-- a -->
<!-- formulaire bootstrap -->
<form class="col-md-4 offset-md-4" method="post" action="">
  </div> <div class="form-group">
    <label for="Prenom">Prenom</label>
    <input type="text" class="form-control col-md-12" id="prenom" name="prenom" placeholder="Prenom">
  </div>
  <div class="form-group">
    <label for="Nom">Nom</label>
    <input type="text" class="form-control col-md-12" id="nom" name="nom" placeholder="Nom">
  </div> 
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="text" class="form-control col-md-12" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email">
  </div>
    <div class="form-group">
    <label for="Adresse">Adresse</label>
    <input type="text" class="form-control col-md-12" id="adresse" name="adresse" placeholder="Adresse">
  </div>
  <div class="form-group">
    <label for="Code Postal">Code Postal</label>
    <input type="text" class="form-control col-md-12" id="codepostal" name="codepostal" placeholder="Code Postal">
  </div> 
  <div class="form-group">
    <label for="exampleFormControlSelect1" id="sexe" name="sexe">Sexe</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option value="no"></option>
      <option value="femme">Femme</option>
      <option value="homme">Homme</option>
    </select>
  </div>  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<!-- fin formulaire -->



    
</body>
</html>


