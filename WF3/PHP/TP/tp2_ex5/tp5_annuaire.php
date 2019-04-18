<?php
extract($_POST);

    echo '<pre>'; print_r($_POST);echo '</pre>';

    $bdd = new PDO('mysql:host=localhost;dbname=repertoire','root', '', array(PDO:: ATTR_ERRMODE => PDO :: ERRMODE_WARNING, PDO :: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    echo '<pre>'; print_r($bdd); echo '</pre>';


    if($_POST)
    {
        $data_insert = $bdd->prepare("INSERT INTO annuaire (nom, prenom, telephone, adresse, ville, code_postal, date_de_naissance, genre, description) VALUES (:nom, :prenom, :telephone, :adresse, :ville, :code_postal, :date_de_naissance, :genre, :description)");


            //boucle for each permettant de d'afficher les indices et valeur à chaque insert dans la base de donnée 'annuaire'
            foreach($_POST as $key => $value)
            {
                if($key = 'code_postal' && $key = 'date')
                {
                    $data_insert->bindValue("$key", $value, PDO::PARAM_INT);
                }
                else
                {
                    $data_insert->bindValue("$key", $value, PDO::PARAM_STR);
                }
                   
            }
                $data_insert->execute();
    }

    // 5.4 query de la bdd, puis fetch pour pouvoir afficher les données de chaque abonné 
    $data = $bdd->query("SELECT * FROM annuaire");
    $abonnes = $data->fetch(PDO::FETCH_ASSOC);
    echo '<pre>'; print_r($abonnes);echo '</pre>';

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

<div class="container text-center">
<h1>tp5_Annuaire</h1>

</div>

<form class="col-md-4 offset-md-4" method="post" action="">
 
  
  <div class="form-group">
    <label for="Nom">Nom</label>
    <input type="text" class="form-control col-md-12" id="nom" name="nom" placeholder="Nom">
  </div>
   <div class="form-group">
    <label for="Prenom">Prenom</label>
    <input type="text" class="form-control col-md-12" id="prenom" name="prenom" placeholder="Prenom">
  </div>
   <div class="form-group">
    <label for="Telephone">Telephone</label>
    <input type="text" class="form-control col-md-12" id="telephone" name="telephone" placeholder="Telephone">
  </div>
   <div class="form-group">
    <label for="Adresse">Adresse</label>
    <input type="text" class="form-control col-md-12" id="adresse" name="adresse" placeholder="Adresse">
  </div>
   <div class="form-group">
    <label for="Ville">Ville</label>
    <input type="text" class="form-control col-md-12" id="ville" name="ville" placeholder="Ville">
  </div> 
  <div class="form-group">
    <label for="Code Postal">Code Postal</label>
    <input type="text" class="form-control col-md-12" id="codepostal" name="code_postal" placeholder="Code Postal">
  </div> 
  <label for="Adresse">Adresse</label>
    <input type="text" class="form-control col-md-12" id="adresse" name="adresse" placeholder="Adresse">
  </div>

  <div class="form-group row">
  <label for="example-datetime-local-input" class="col-2 col-form-label">Date</label>
  </div>
  <div class="col-10">
    <input class="form-control" type="date" value="2011-08-19T13:45:00" id="example-datetime-local-input" name="date">
  </div>
  <!-- fin date -->
  <div class="form-group">
    <label for="exampleFormControlSelect1">Public</label>
    <select class="form-control" name="genre" id="exampleFormControlSelect1">
      <!-- conditions permettant de d'afficher -->
      <option value="f"<?php if($genre == 'f') echo 'selected'?>>Femme</option>
      <option value="m"<?php if($genre == 'm') echo 'selected'?>>Homme</option> 
    </select>
  <!-- fin checkbox -->
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Enregistrement</button>
</form>


    




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>