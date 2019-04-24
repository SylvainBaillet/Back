<?php

$catalogue = '';
$reservation = '';
$confirmation = '';
$prix = 0;

if(!empty($_GET)){
    $catalogue = $_GET['catalogue'];
    $formule = $_GET['reservation'];
    $formule = $_GET['confirmation'];
    $prix = $_GET['prix'];
    
}


?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <!-- lien css -->
    <link rel="stylesheet" href="css/style.css"> 

    <title>Hello, world!</title>
  </head>
  <body>


<?php
if(!empty($_GET))
{
?>    
   <div class="container-fluid">
       <div class="row">
            <nav class="nav">
                <a class="nav-link active" href="#"><i class="fab fa-phoenix-framework fa-2x"></i></a>
                <a class="nav-link" href="#">Phoenix</a>
                <a class="nav-link" href="?menu=catalogue">Choisir une destination</a>
                <a class="nav-link" href="?menu=reservation">Payer</a>
            </nav>
        </div>
   </div>
         <?php//affichage catalogue
         if($_GET['catalogue']){
         ?>   
            
         



<?php
} else {  
?>
            <nav class="nav navhead bg-transparent">
                <a class="nav-link active" href="#"><i class="fab fa-phoenix-framework fa-2x"></i></a>
                <a class="nav-link" href="#">Phoenix</a>
                <a class="nav-link" href="?menu=catalogue">Choisir une destination</a>
                <a class="nav-link" href="?menu=reservation">Payer</a>
            </nav>
<!-- slider accueil -->
    <div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/caraibes1.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/maldives.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/turkoise.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<!-- fin slider acceuil -->

<?php
}
?>

    <ul class="nav footer justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" href="#">Nos vacances de rêve</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Plage</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Urbaine</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Croisiere</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Montagne</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">A prix tout doux</a>
        </li>
    </ul>
    

        











    
    
    </div>

    




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>