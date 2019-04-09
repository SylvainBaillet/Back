<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Formulaire entreprise</title>
</head>
<body>

<!-- 1 - Réaliser un formulaire correspondant à la table 'employés' de la BDD 'entreprise' (sauf id_employes)
     2 - Controler en php que l'on receptionne bien tous les champs du formulaire
     3 - connexion BDD
     4 - traitement PHP/SQL permettant l'insertion d'un employé à partir du formulaire
 -->

 <?php 
 // 2 -----------
    echo '<div class="col-md-4 offset-md-4 alert alert-success text-center mx-auto">';
echo '<pre>'; print_r($_POST); echo '</pre>';
echo '</div>';
 
 // 3 -----------
 $pdo = new PDO('mysql:host=localhost;dbname=entreprise','root', '', array(PDO:: ATTR_ERRMODE => PDO :: ERRMODE_WARNING, PDO :: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));   

         echo '<pre>'; print_r($pdo); echo '</pre>';//affiche l'objet PDO
         echo '<pre>'; print_r(get_class_methods($pdo)); echo '</pre>';

  // 4 -----------   
  if($_POST)
  {
      $resultat = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service ,date_embauche, salaire) VALUES ('$_POST[prenom]' ,'$_POST[nom]' , '$_POST[sexe]' , '$_POST[service]' ,'$_POST[date]' , '$_POST[salaire]')");  
      echo '<div class="col-md-6 offset-d-3 alert alert-success text-center">L\'employé <strong>' . $_POST['nom'] .'</strong> a bien été enregistré</div>';  

  }
  
 ?>

<!-- 1 ---------->
<form class="col-md-4 offset-md-4" method="post" action="">
  <div class="form-group">
    <label for="prenom">Prenom</label>
    <input type="text" class="form-control col-md-12" id="prenom" name="prenom" placeholder="prenom">
  </div> 
  <div class="form-group">
    <label for="Nom">Nom</label>
    <input type="text" class="form-control col-md-12" id="nom" name="nom" placeholder="nom">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Genre</label>
    <select class="form-control" id="exampleFormControlSelect1" name="sexe">
      <option value=""></option>
      <option value="f">Femme</option>
      <option value="m">Homme</option>
    </select>
  </div>
  <div class="form-group">
     <label for="service">Service</label>
    <input type="text" class="form-control col-md-12" id="service" name="service" placeholder="service">
  </div>
  <div class="form-group row">
  <label for="example-datetime-local-input" class="col-2 col-form-label">Date d'embauche</label>
  <div class="col-10">
    <input class="form-control" type="date" name="date" value="" id="example-datetime-local-input">
  </div>
</div>
<div class="form-group">
    <label for="salaire">Salaire</label>
    <input type="text" class="form-control col-md-12" id="salaire" name="salaire" placeholder="salaire">
  </div>
  <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

    
</body>
</html>