<?php
require_once('../include/init.php');
extract($_POST);

echo '<pre>'; print_r($_POST);echo '</pre>';
echo '<pre>'; print_r($_FILES);echo '</pre>';
/* la superglobale $_FILES permet de vehiculer les informations d'un fichier uploadé */

if(!internauteEstConnecteEtAdmin())
{
    header("location:" . URL . "connexion.php");
}

//---------------ENREGISTREMENT PRODUIT-------------------,
if($_POST)
{
    $photo_bdd='';
    if(!empty($_FILES['photo']['name']))//
    {
        $nom_photo = $reference . '-' . $_FILES['photo']['name'];
        echo $nom_photo . '<br>';

        $photo_bdd = URL . "photo/$nom_photo";
        echo $photo_bdd . '<br>';

        $photo_dossier = RACINE_SITE . "photo/$nom_photo";
        echo $photo_dossier . '<br>';

        copy($_FILES['photo']['tmp_name'], $photo_dossier);
    }
}


require_once('../include/header.php');
?>


<!-- 
1- Realiser un formulaire permettant d'inserer un produit dans la table 'produit' (sauf le champ id_produit)  
 -->

 <hr><h1 class="display-4 text-center">GESTION BOUTIQUE</h1><hr>
 <?= $error ?>
 <!-- je fais un echo ici de ma vaiable '$error' pour que toutes mes erreurs s'affichent entre mon titre et le debut de mon formulaire -->
<form class="col-md-6 offset-md-3" method="post" action="" enctype="multipart/form-data" ><!-- enctype: obligatoire en PHP pour recolter les informations d'un fichier uploadé -->
  <div class="form-group">
    <label for="Référence">Référence</label>
    <input type="text" class="form-control col-md-12" id="reference" name="reference" placeholder="reference">
  </div> 
  <div class="form-group">
    <label for="Categorie">Catégorie</label>
    <input type="text" class="form-control col-md-12" id="categorie" name="categorie" placeholder="categorie">
  </div>
  <div class="form-group">
    <label for="Titre">Titre</label>
    <input type="text" class="form-control col-md-12" id="titre" name="titre" placeholder="titre">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control col-md-12" id="description" name="description" placeholder="description">
  </div> 
  <div class="form-group">
    <label for="Couleur">Couleur</label>
    <input type="text" class="form-control col-md-12" id="couleur" name="couleur" placeholder="couleur">
  </div>
  <div class="form-group">
    <label for="Taille">Taille</label>
    <input type="text" class="form-control col-md-12" id="taille" name="taille" placeholder="taille">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Public</label>
    <select class="form-control" name="public" id="exampleFormControlSelect1">
    <!-- si  un fruit a bien été selectionné et que ce fruit est égal à 'cerises', alors on affiche 'selected' dans la balise option -->
      <option value="f"
      <?php if(isset($_POST['public']) && $_POST['public'] == 'f') echo 'selected' ?>>Femme</option>
                            <?= (isset($_POST['public']) && $_POST['public'] == 'f') ? 'selected' : ''?>
      <option value="m"<?php if(isset($_POST['public']) && $_POST['public'] == 'm') echo 'selected' ?>>Homme</option> 
      <option value="mixte"<?php if(isset($_POST['public']) && $_POST['public'] == 'mixte') echo 'selected' ?>>Mixte</option> 
    </select>
  </div>
  <div class="form-group">
    <label for="photo">Photo</label>
    <input type="file" class="form-control-file" name="photo" id="photo">
  </div>
  <div class="form-group">
    <label for="Prenom">Prix</label>
    <input type="text" class="form-control col-md-12" id="prix" name="prix" placeholder="Prix">
  </div>
  <div class="form-group">
    <label for="Prenom">Stock</label>
    <input type="text" class="form-control col-md-12" id="stock" name="stock" placeholder="stock">
  </div>
  
  <button type="submit" class="btn btn-primary">Envoyer</button><!-- pour pouvoir voir le boutton caché par la nav fixe, dans le css, on ajoute un margin-bottom sur la class du button dans le css-->
</form>







<?php
require_once('../include/footer.php');
?>

