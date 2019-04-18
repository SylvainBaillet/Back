<?php
require_once("include/init.php");
extract($_GET);
require_once("include/header.php");

?>


<div class="container">

<div class="row">

  <div class="col-lg-3">

    <h1 class="my-4">Bienvenue dans la boutique</h1>
    <div class="list-group">
    <!-- Exo : 1 - Requete de selection de catégorie distincte en BDD
               2 - Boucler sur chaque categorie et creer un lien
    -->
    <?php

    // 1-
    $data = $bdd->query("SELECT DISTINCT categorie FROM produit");//DISTINCT Permet d'afficher une seule fois le nom d'un indice lorsqu'il apparait plusieurs fois sous le meme nom dans la bdd
    // echo '<pre>'; print_r($data);echo '</pre>';

    // 2-
    while($categorie = $data->fetch(PDO::FETCH_ASSOC)):
    // echo '<pre>'; print_r($categorie);echo '</pre>';
        
    ?>

      <a href="?categorie=<?=$categorie['categorie']?>" class="list-group-item alert-link text-dark text-center" ><?=$categorie['categorie']?></a>

    <?php endwhile; ?>
    </div>

  </div>
  <!-- /.col-lg-3 -->

  <div class="col-lg-9">

    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img class="d-block img-fluid" src="<?= URL?>photo/boutique1.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid" src="<?= URL?>photo/boutique2.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid" src="<?= URL?>photo/boutique3.png" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div class="row">
        <?php if(isset($_GET['categorie'])): /* Si (if) il y'a une categorie dans l'url on selectionne les produits associés a la categorie, sinon (else) il n'ya pas de categorie dans l'url et on selectionne tous les produits */
         
         $resultat = $bdd->prepare("SELECT * FROM produit WHERE categorie = :categorie");
         $resultat->bindvalue('categorie', $_GET['categorie'], PDO::PARAM_STR);
         $resultat->execute();
         //echo '<pre>'; print_r($resultat);echo '</pre>';
            else:
                $resultat = $bdd->prepare("SELECT * FROM produit");
                /*  dans la condition ou on a pas besoin de bindvalue, car  */
                $resultat->execute();
            
            endif;
            /* $resultat retourne un objet PDOStatement non exploitable en l'état, on fait donc une boucle avec une methode fetch pour recuperer les  */
         while($produit = $resultat->fetch(PDO::FETCH_ASSOC)): 
            // echo '<pre>'; print_r($produit);echo '</pre>';
        ?>

      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <a href="fiche_produit.php?id_produit=<?=$produit['id_produit']?>"><img class="card-img-top" src="<?=$produit['photo']?>" alt=""></a>
          <div class="card-body">
            <h4 class="card-title text-center">
              <a href="fiche_produit.php?id_produit=<?=$produit['id_produit']?>"><?=$produit['titre']?></a>
            </h4>
            <h5 class="text-center"><?=$produit['prix']?> €</h5>
            <p class="card-text text-center"><?=$produit['description']?></p>
          </div>
          <div class="card-footer text-center">
            <a href="fiche_produit.php?id_produit=<?=$produit['id_produit']?>" class="alert-link text-dark">Voir le détail <i class="fas fa-search"></i></a>
          </div>
        </div>
      </div>
        
      <?php endwhile; ?>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.col-lg-9 -->

</div>
<!-- /.row -->

</div>
<?php
require_once("include/footer.php");