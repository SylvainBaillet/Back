<?php
require_once('include/init.php');

extract($_GET);

require_once('include/header.php');

/* 1-réaliser la requete permettant de selectionner le produit par rapport à l'id produit envoyé dans l'url
    2-Associer une methode pour rendre le resultat exploitable
    3- creer une fiche produit avec les informations du produit: photo / categorie / titre / description / couleur / taille /prix / public/ selecteur pour la quantité / et un bouton d'ajout au panier 

*/

?>

<?php

if(isset($_GET['id_produit'])):// si l'id_produit' est defini dans l'URL:

    // on prepare la requete de selection 
$resultat = $bdd->prepare("SELECT * FROM produit WHERE id_produit = :id_produit");
         $resultat->bindvalue('id_produit', $_GET['id_produit'], PDO::FETCH_ASSOC);
         $resultat->execute();

         //résultat retourne un Objet de la classe PDOStatement, pour pouvoir l'exploiter ensuite je crée une variable $article qui est égale a cet objet dans le quel je vais piocher
$article = $resultat->fetch(PDO::FETCH_ASSOC);     


    
?>
<div class="container-fluid">
    <div class="card mb-3 col-md-12" >
    <div class="row no-gutters">
        <div class="col-md-6">
        <img src="<?=$article['photo']?>" class="card-img" alt="...">
        </div>
        <div class="col-md-6">
        <div class="card-body">
            <h5 class="card-title bg-dark"><?=$article['categorie']?></h5>
            <h4 class="card-title bg-primary color-white"><?=$article['titre']?></h4>
            <p class="card-title"><?=$article['description']?></p>
            <h4 class="card-title">Couleur : <?=$article['couleur']?></h4>
            <h4 class="card-title">Taille : <?=$article['taille']?></h4>
            <h4 class="card-title">Prix : <?=$article['prix']?></h4>
            <h4 class="card-title">Public : <?=$article['public']?></h4>
             <div class="form-group">
            <label for="exampleFormControlSelect1">Nombre d'article(s)</label>
            <select class="form-control" id="exampleFormControlSelect1">
            <?php
            for($i=1;$i < 51; $i++):
            ?>    
            <option><?=$i?></option>
            <?php
            endfor;
            ?>
            
            </select>
        </div>
            <button class="btn btn-info">Ajouter au panier</button>
        </div>
        </div>
    </div>
    </div>
  
<?php 
else: /* si l'indice 'id_produit' n'est pas defini dans l'URL, on redirige vers la boutique */
    header("location: boutique.php");

endif;?>    
</div>
  


<?php
require_once('include/footer.php');
