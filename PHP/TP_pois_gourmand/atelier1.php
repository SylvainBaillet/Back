<?php

$formule = '';
$photo = '';
$prix = 0;

if(!empty($_GET)){
    $formule = $_GET['menu'];
    $photo = $_GET['img'];
    $prix = $_GET['prix'];
} 

// echo "<pre>";
// var_dump($_GET);
// echo "</pre>";

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css"> <!-- css perso -->
    <link href="https://fonts.googleapis.com/css?family=Srisakdi" rel="stylesheet"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>TP_pois_gourmand</title>
  </head>
  <body>

  
  <div class="container">
  <header class="col-md-12">
        <h1><i class="fas fa-kiwi-bird"></i>Au Poid Gourmand</h1>
  </header>

  
  <main>
      <?php
  if(empty($_Get)){ 
  ?>
        <section class="row">
            <div class="col-md-6">
              <div class="card offset-md-3" style="width: 18rem;">
              <img src="img/rome.jpg" class="card-img-top" alt="...">
              <div class="card-body">
              <h5 class="card-title text-center">Formule Rome</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="?menu=rome&prix=25&img=img/rome.jpg" class="col-md-12 btn btn-success">Choisir</a>
             </div>
             </div>
             </div>
            <div class="col-md-6">
              <div class="card offset-md-3" style="width: 18rem;">
              <img src="img/nyork.jpg" class="card-img-top" alt="...">
              <div class="card-body">
              <h5 class="card-title text-center">Formule New York</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="?menu=ny&prix=23&img=img/nyork.jpg" class="col-md-12 btn btn-danger">Choisir</a>
             </div>
             </div>
             </div>
        </section> <!-- Fin row 1 -->
        <section class="row">
            <div class="col-md-6">
              <div class="card offset-md-3" style="width: 18rem;">
              <img src="img/delhi.jpg" class="card-img-top" alt="...">
              <div class="card-body">
              <h5 class="card-title text-center">Formule Dehli</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="?menu=dehli&prix=24&img=img/delhi.jpg" class="col-md-12 btn btn-warning">Choisir</a>
             </div>
             </div>
             </div>
            <div class="col-md-6">
              <div class="card offset-md-3" style="width: 18rem;">
              <img src="img/hanoi.jpg" class="card-img-top" alt="...">
              <div class="card-body">
              <h5 class="card-title text-center">Formule Hanoï</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="?menu=hanoi&prix=28&img/hanoi.jpg" class="col-md-12 btn btn-primary">Choisir</a>
             </div>
             </div>
             </div>
        </section><!-- Fin row 2 -->
<?php
} else { 
?>            
        <section class="row">
            <div class="col-md-10">

              <div class="card offset-md-1" style="width: 100%;">
                <h5 class="card-title text-center">Merci pour votre commande</h5>
                    <div>
                        <img src="<?$photo?>" class="card-img-top col-md-4" alt="...">
                    </div>
                 <div class="col-md-8">
                <div class="card-body">
                <h5 class="card-title text-center">Formule<?$formule?></h5>
                <p class="card-text">cela vous coutera<?$prix?></p>
                </div>
               <a href="atelier1.php" class="col-md-12 btn btn-success">Choisir un autre menu</a> 
             </div>
             </div>    
             </div>
            
        </section><!-- fin row 3 -->
<?php        
}
?>
    <footer>
      <div class="row">
        <div class="col-md-12">
          <h2 id="textBas"><i class="fas fa-kiwi-bird"></i>.....<i class="fas fa-kiwi-bird"></i>....<i class="fas fa-kiwi-bird"></i>...<i class="fas fa-kiwi-bird"></i>..<i class="fas fa-kiwi-bird"></i>.<i class="fas fa-kiwi-bird"></i>Au poid Gourmand</h2> 
        </div> 
      </div> 
  </footer><!-- Fin Footer -->

  </main>
  

  </div><!-- Fin container -->

    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>