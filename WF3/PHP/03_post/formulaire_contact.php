<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Formulaire de contact</title>
</head>
<body>
<!-- realiser un formulaire avec les champs suivants: objet, email, message et un bouton submit -->
<div class="container">
<hr><h1 class="display-4 text-center">Formulaire de contact</h1><hr>

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
    <label for="exampleFormControlTextarea1">Message</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="textarea" rows="3"></textarea>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<?php

    echo '<div class="col-md-4 offset-md-4 alert alert-success text-center mx-auto">';
foreach($_POST as $key => $value)
{
    echo "$key : $value<br>";
}
echo '</div>';

// isset teste l'existence de 'submit'. si 'submit' existe, on rentre dans ma condition ( dans les accolades {} ).  
if(isset($_POST['submit']))/* on verifie si on a bien cliqué sur le bouton 'submit' qui a pour attribut name 'submit', si nous avions plusieurs formulaires sur la meme page, la condition permet de differencier sur quel bouton le formulaire a été validé *//
{
    //1er argument:
    $destinataire = "sylvain.baillet@lepoles.com";
    //2 eme argument
    $sujet = $_POST['objet'];
    // 3eme argument: 
    $message = $_POST['message'];
    // 4eme argument: obligatoire (MIME-version 1.0 est un protocole d'envoi de mail stadardisé)
    $entetes = "MIME-Version 1.0 \n"; /* est un stadard internet qui étentd le format de données des courriels pour supporter des textes en differents codages des caracteres autres que l'ASCII , des contenus non textuels, des contenus multiples, et des informations d'en-tete en d'autres codages que l'ASCII.*/

    // entete expediteur: toujours "from" et non "de" par exemple
    $entetes .= "from: $_POST[email]\n";

    //entete d'adresse de retour
    $entetes .= "reply-to: alphaesperanto@gmail.com\n";

    //priorité urgente
    $entetes .= "X-priority: 1\n";

    //type de contenu HTML // avec cette ligne, je peux coder en html dans le message
    $entetes .= "content-type: text/html; charset=utf-8\n";

    mail($destinataire, $sujet, $message,$entetes); // fonction predefinie permettant l'envoi du mail / toujours  4 arguments: destinataire/sujet/message/expediteur. L'ordre est crucial sinon le test ne fonctionne pas.
}

?>
    
</body>
</html>