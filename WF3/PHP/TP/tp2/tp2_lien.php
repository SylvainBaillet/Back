<?php
if(isset($_GET['pays']))
{

    $pays = $_GET['pays'];
    
        switch($pays)
        {
            case 'fr';
            $pays= "Français";
            break;
            case 'an';
            $pays="Anglais";
            break;
            case 'es';
            $pays= "Espagnol";
            break;
            case 'al';
            $pays= "Allemand";
            break;
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

    <title>TP 2_1 Liens</title>
  </head>
  <body>

  <div class="container text-center">
    <h1 class="display-4 text-center">TP 2_1 Liens</h1>

        <a href="?pays=fr" class="list-group-item">France</a>
        <a href="?pays=an" class="list-group-item">Angleterre</a>
        <a href="?pays=es" class="list-group-item">Espagne</a>
        <a href="?pays=al" class="list-group-item">Allemagne</a>

        <h3 class="display-4 text-center">Vous etes sur un site en <?php if(isset($pays)) echo $pays ?></h3>
 </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>