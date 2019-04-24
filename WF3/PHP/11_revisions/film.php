<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Films</title>
  </head>
  <body>
    <h1 class="display-4 text-center">Liste des films</h1>

    <ul class="col-md-4 offset-md-4 list-group text-center">

    <!-- dans le lien, 'href' je rentre la page de destination du lien, puis en mettant le point d'interrogation '?' je rentre des infos qui vont se mettre dans l'url, et que je pourrais ensuite recuperer grace a la superglobale $_GET  -->
        <li class="list-group-item"><a href="detail_film.php?idfilm=1&genre=drame&durée=90&prix=10">Glass</a></li>
        <li class="list-group-item"><a href="detail_film.php?idfilm=2&genre=drame&durée=110&prix=10">Le chant du loup</a></li>
        <li class="list-group-item"><a href="detail_film.php?idfilm=3&genre=drame&durée=120&prix=10">L'empereur de paris</a></li>
        <li class="list-group-item"><a href="detail_film.php?idfilm=4&genre=drame&durée=102&prix=10">Les évadés</a></li>
        <li class="list-group-item"><a href="detail_film.php?idfilm=5&genre=drame&durée=96&prix=10">Rock'N'Roll</a></li>
    












    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>