<?php
require_once('../include/init.php');
extract($_POST);
extract($_GET);


// echo '<pre>'; print_r($_POST);echo '</pre>';
// echo '<pre>'; print_r($_FILES);echo '</pre>';
/* la superglobale $_FILES permet de vehiculer les informations d'un fichier uploadé */

if(!internauteEstConnecteEtAdmin())
{
    header("location:" . URL . "connexion.php");
}

//---------------SUPPRESSION PRODUIT----------------------

if(isset($_GET['action']) && $_GET['action'] == 'suppression')
{
        //exo requete de suppression
         // echo 'suppression';
        $data_suppr = $bdd->prepare("DELETE FROM produit WHERE id_produit = :id_produit");
        $data_suppr->bindValue(":id_produit", $id_produit, PDO::PARAM_STR);/* $id_produit fait référence à $_GET['id_produit'] car on a fait un extract($_GET) plus haut  */
        $data_suppr->execute();
        // echo 'suppression';
        $_GET['action'] = 'affichage';// une fois la suppression d'un produit faite, on redirige vers affichage

        $validate .= "<div class='alert alert-success col-md-6 offset-md-3 text-center'>Le produit n° : <strong>$id_produit</strong> à bien été supprimé </div>";
}
// $resultat = $pdo->exec("DELETE FROM employes WHERE id_employes = 350");

//---------------ENREGISTREMENT PRODUIT-------------------
if($_POST)
{
    $photo_bdd='';
  if(isset($_GET['action']) && $_GET['action'] =='modification')
  {
    $photo_bdd = $photo_actuelle; /* Si on souhaite conserver la meme photo en cas de modification, on affecte la valeur du chanp photo 'hidden' , c'est a dire a l'URL de la photo selectionnée en BDD */
  }

    if(!empty($_FILES['photo']['name']))/* on verifie que l'indice 'name' dans la superglobale $_FILES n'est pas vide, cela veut dire que l'on a bien uploadé une photo */
    {
        $nom_photo = $reference . '-' . $_FILES['photo']['name'];/* on redefinie le nom de la photo en concaténant la référence saisie dans le formulaire avec le nom de la photo */
        // echo $nom_photo . '<br>';

        $photo_bdd = URL . "photo/$nom_photo";//URL est une constante, tout comme RACINE_SITE
        // echo $photo_bdd . '<br>';

        $photo_dossier = RACINE_SITE . "photo/$nom_photo";/* on définie l'URL de la photo, c'est ce que l'on conservera en BDD */
        // echo $photo_dossier . '<br>';

        copy($_FILES['photo']['tmp_name'], $photo_dossier);/* la fonction predefinie copy() permet de copier la photo dans le dossier photo: arguments: nom temporaire de la photo, chemin de destination */
    }

    //Exo: réaliser la requete d'insertion permettant d'inserer un produit dans la table produit (requete preparée).

    if(isset($_GET['action']) && $_GET['action'] == 'ajout')
    {
        $data_insert = $bdd->prepare("INSERT INTO produit (reference, categorie, titre, description, couleur, taille, public, photo, prix, stock ) VALUES (:reference, :categorie, :titre, :description, :couleur, :taille, :public, :photo, :prix, :stock)");
    }
    else
    {
        $data_modif = $bdd->prepare("UPDATE produits SET $_POST")
    }  

        foreach($_POST as $key => $value)
        {
            if($key != 'photo_actuelle')
            {
                $data_insert->bindValue(":$key", $value, PDO::PARAM_STR);
            }                        
        }
        $data_insert->bindValue(":photo", $photo_bdd, PDO::PARAM_STR);/* on fait un bindvalue en plus pour la photo car on la récupere avec la superglobale $_FILES, et non dans $_POST parcouru par le foreach */
        $data_insert->execute();
}
// header("location: connexion.php?action=validate");

require_once('../include/header.php');
?>
<!-- Exo: réaliser le traitement permettant l'affichage des produits sous forme de tableau HTML -->

<?php
$data = $bdd->query("SELECT * FROM produit");
$produit = $data->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>'; print_r($produit);echo '</pre>';
?>

<!-- LIENS PRODUITS -->
<ul class="col-md-4 list-group mt-4 text-center">
  <li class="list-group-item bg-dark text-center text-white"> </a> BACK OFFICE</li>
  <li class="list-group-item bg-dark text-center text-dark"><a href="?action=affichage" class="alert-link text-white">AFFICHAGE PRODUITS</a> </li>
  <li class="list-group-item bg-dark text-center text-dark"><a href="?action=ajout" class="alert-link text-white">AJOUT PRODUITS</a></li>
</ul>  
<!-- FIN LIENS PRODUITS -->


<!-- AFIICHAGE PRODUITS -->
<?= $validate?>
<?php  if(isset($_GET['action']) && $_GET['action'] == 'affichage'):?>

<hr><h1 class="display-4 text-center">Liste des produits</h1><hr>
<table class="table table-bordered text-center tab1">
<?php foreach($produit[0] as $key => $value): ?>
      <th><?= strtoupper($key) ?></th> 
<?php endforeach; ?> 
      <th>MODIFIER</th>
      <th>SUPPRIMER</th>
</tr>
<?php foreach($produit as $key => $tab): ?>
  <tr>
    <?php foreach($tab as $key2 => $value): ?>

        <?php if($key2 == 'photo'): ?>
            <td><img src="<?= $value ?>" alt="<?= $tab['titre'] ?>" class="card-img-top" ></td>
        <?php else: ?>
            <td><?= $value ?></td>
        <?php endif; ?>
        <!-- fin de la condition if -->

    <?php endforeach; ?>
    <td><a href="?action=modification&id_produit=<?= $tab['id_produit']?>"><i class="fas fa-pencil-alt text-dark"></i></a></td>
    <td><a href="?action=suppression&id_produit=<?= $tab['id_produit']?>" class="text-danger" onclick="return(confirm('Etes vous sur de vouloir supprimer?'))"><i class="fas fa-trash-alt text-dark"></i></a></td>
    </tr>
<?php endforeach; ?>
</table>
<?php endif;?>
<!-- FIN if(isset) -->

<?php
if(isset($_GET['id_produit']))
{
  $resultat = $bdd->prepare("SELECT * FROM produit WHERE id_produit = :id_produit");
  $resultat->bindValue(':id_produit', $id_produit, PDO::PARAM_INT);
  $resultat->execute();

  $produit_actuel = $resultat->fetch(PDO::FETCH_ASSOC);
  // echo '<pre'; print_r($produit_actuel); echo'</pre>';
}

$reference = (isset($produit_actuel['reference'])) ? $produit_actuel['reference']: '';
$categorie = (isset($produit_actuel['categorie'])) ? $produit_actuel['categorie']: '';
$titre = (isset($produit_actuel['titre'])) ? $produit_actuel['titre']: '';
$description = (isset($produit_actuel['description'])) ? $produit_actuel['description']: '';
$couleur = (isset($produit_actuel['couleur'])) ? $produit_actuel['couleur']: '';
$taille = (isset($produit_actuel['taille'])) ? $produit_actuel['taille']: '';
$public = (isset($produit_actuel['public'])) ? $produit_actuel['public']: '';
$photo = (isset($produit_actuel['photo'])) ? $produit_actuel['photo']: '';
$prix = (isset($produit_actuel['prix'])) ? $produit_actuel['prix']: '';
$stock = (isset($produit_actuel['stock'])) ? $produit_actuel['stock']: '';


?>


<!-- Fin tableau d'affichage -->

 <hr><h1 class="display-4 text-center"> <?= $action ?> </h1><hr>
<!-- 
1- Realiser un formulaire permettant d'inserer un produit dans la table 'produit' (sauf le champ id_produit)  
 -->

 <?php  if(isset($_GET['action']) && ($_GET['action'] == 'ajout' || $_GET['action'] == 'modification')):?> 


 <!-- je fais un echo ici de ma vaiable '$error' pour que toutes mes erreurs s'affichent entre mon titre et le debut de mon formulaire -->
<form class="col-md-6 offset-md-3" method="post" action="" enctype="multipart/form-data" ><!-- enctype: obligatoire en PHP pour recolter les informations d'un fichier uploadé -->
  <div class="form-group">
    <label for="Référence">Référence</label>
    <input type="text" class="form-control col-md-12" id="reference" name="reference" placeholder="reference" value="<?=$reference?>">
  </div> 
  <div class="form-group">
    <label for="Categorie">Catégorie</label>
    <input type="text" class="form-control col-md-12" id="categorie" name="categorie" placeholder="categorie" value="<?=$categorie?>">
  </div>
  <div class="form-group">
    <label for="Titre">Titre</label>
    <input type="text" class="form-control col-md-12" id="titre" name="titre" placeholder="titre" value="<?=$titre?>">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control col-md-12" id="description" name="description" placeholder="description" value="<?=$description?>" >
  </div> 
  <div class="form-group">
    <label for="Couleur">Couleur</label>
    <input type="text" class="form-control col-md-12" id="couleur" name="couleur" placeholder="couleur" value="<?=$couleur?>">
  </div>
  <div class="form-group">
    <label for="Taille">Taille</label>
    <input type="text" class="form-control col-md-12" id="taille" name="taille" placeholder="taille" value="<?=$taille?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Public</label>
    <select class="form-control" name="public" id="exampleFormControlSelect1">
      <!-- conditions permettant de d'afficher -->
      <option value="f"<?php if($public == 'f') echo 'selected'?>>Femme</option>
      <option value="m"<?php if($public == 'm') echo 'selected'?>>Homme</option> 
      <option value="mixte"<?php if($public == 'mixte') echo 'selected'?>>Mixte</option> 
    </select>
  </div>
  <div class="form-group">
    <label for="photo">Photo</label>
    <input type="file" class="form-control-file" name="photo" id="photo" value="<?=$photo?>">
  </div>
  <?php if(!empty($photo)): ?>
    <em>Vous pouvez uploader une nouvelle photo si vous souhaitez la changer</em>
    <img src="<?= $photo?>" alt="<?=titre?>" class="card-img-top">
  <?php endif; ?>
  <input type="hidden" id=photo_actuelle name="photo_actuelle" value="<?=$photo?>">
  <!--  -->
  <div class="form-group">
    <label for="Prenom">Prix</label>
    <input type="text" class="form-control col-md-12" id="prix" name="prix" placeholder="Prix" value="<?=$prix?>">
  </div>
  <div class="form-group">
    <label for="Prenom">Stock</label>
    <input type="text" class="form-control col-md-12" id="stock" name="stock" placeholder="stock" value="<?=$stock?>">
  </div>
  
  <button type="submit" class="btn btn-primary"><?= $action ?></button><!-- pour pouvoir voir le boutton caché par la nav fixe, dans le css, on ajoute un margin-bottom sur la class du button dans le css-->
</form>
<?php endif;?>

<?php
require_once('../include/footer.php');
?>

