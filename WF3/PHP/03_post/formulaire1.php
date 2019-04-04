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

<?php
    echo '<pre>'; print_r($_POST); echo '</pre>'; /* permet d'observer les données saisie dans le formulaire qui vont se stocker directement dans la superglobale $_POST, les indices correspondent aux attributs "name" du formulaire HTML */

    //exo : afficher les données saisis dans le formulaire en passant par la superglobale $_POST.

    foreach($_POST as $key => $value)// On parcours la superglobale $_POST dce type ARRAY avec la boucle foreach 
{
    echo "$key => $value<br>";
}
echo '<hr>';

//2 eme methode en allant chercher les deux informations une par une, sans la boucle foreach
/* sans la condition IF, au premier chargement de la page, nous avons deux erreurs 'undifined', c'est du au fait que le formulaire n'a pas été validé, donc les indices 'email' et 'mdp' ne sont pas reconnus. Si la condition IF est verifiée, si elle renvoie "true", cela veut dire que l'on a soumit le formulaireet les indices 'email' et 'mdp' sont bien detectés */
if($_POST)
{
   echo "Email: $_POST[email] <br>";// attention a bien coller la superglobale et les crochets juste derriere, ici $_POST[email]
   echo "mot de passe :" . $_POST['mdp'] . "<br>";
}
   
echo '<hr>'
?>

 <!-- réaliser un formulaire HTML avec les champs suivants: email, mot de passe et un bouton submit-->
 <form method="post" action=""> 
 <!-- method: comment vont circuler les donéées / action: url de destination -->
  <div class="form-group" >
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" class="form-control col-md-4" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email">
    <!-- il ne faut surtout pas oublier les attributs name="" sur les formulaires, sinon aucune donnée saisie ne sera recuperé en PHP -->
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="text" class="form-control col-md-4" id="exampleInputPassword1" name="mdp" placeholder="Password">
    <!-- bien rajouter l'attribut name="" -->
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    
</body>
</html>