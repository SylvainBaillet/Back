<?php
require_once('../include/init.php');
extract($_POST);
extract($_GET);

// 
$validate = "";

if(isset($_GET['action']) && $_GET['action'] == 'suppression')
{
        //exo requete de suppression
         // echo 'suppression';
        $data_suppr = $bdd->prepare("DELETE FROM photo WHERE id_photo = :id_photo");
        $data_suppr->bindValue(":id_photo", $id_photo, PDO::PARAM_STR);/* $id_produit fait référence à $_GET['id_produit'] car on a fait un extract($_GET) plus haut  */
        $data_suppr->execute();
        // echo 'suppression';
        $_GET['action'] = 'affichage';// une fois la suppression d'un produit faite, on redirige vers affichage

        $validate .= "<div class='alert alert-success col-md-6 offset-md-3 text-center'>La photo : <strong>$id_photo</strong> à bien été supprimé </div>";
}

// insertion photo
if($_POST)
    {
        $photo_bdd='';
        if(isset($_GET['action']) && $_GET['action'] == 'modification'){
            $photo_bdd = $photo_actuelle;
        }
        if(!empty($_FILES['photo']['name']))/* on verifie que l'indice 'name' dans la superglobale $_FILES n'est pas vide, cela veut dire que l'on a bien uploadé une photo */
        {
        $nom_photo = $nom_photo . '-' . $_FILES['photo']['name'];/* on redefinie le nom de la photo en concaténant la référence saisie dans le formulaire avec le nom de la photo */
        // echo $nom_photo . '<br>';

        $photo_bdd = URL . "../images/$nom_photo";//URL est une constante, tout comme RACINE_SITE
        // echo $photo_bdd . '<br>';

        $photo_dossier = RACINE_SITE . "images/$nom_photo";/* on définie l'URL de la photo, c'est ce que l'on conservera en BDD */
        // echo $photo_dossier . '<br>';

        copy($_FILES['photo']['tmp_name'], $photo_dossier);/* la fonction predefinie copy() permet de copier la photo dans le dossier photo: arguments: nom temporaire de la photo, chemin de destination */
        }

        $addPhoto = $bdd->prepare("INSERT INTO photo(nom_photo, photo) VALUES (:nom_photo, :photo)");
        $addPhoto->bindValue(":nom_photo", $value, PDO::PARAM_STR);             
        $addPhoto->bindValue(":photo", $photo_bdd, PDO::PARAM_STR);
        $addPhoto->execute();

        $validate .= "<div class='alert alert-success col-md-6 offset-md-3 text-center'>La photo : <strong>$nom_photo</strong> à bien été ajoutée </div>";
    }

require_once('../include/header.php');
?>

<!-- affichage photos -->
<?php
$data = $bdd->query("SELECT * FROM photo");
$affichPhoto = $data->fetch(PDO::FETCH_ASSOC);
?>

<!-- affichage admin photos -->
<h1 class="display-4 text-center">Affichage photo</h1>
<table class="table table-bordered text-center tab1">
<tr>
<?php foreach($affichPhoto as $key => $value): ?>
        <th><?= strtoupper($key) ?></th>
<?php endforeach; ?> 
        <th>SUPPRIMER</th>       
        </tr>
<?php foreach($data as $key => $tab): ?>
  <tr>
    <?php foreach($tab as $key2 => $values): ?>

        <?php if($key2 == 'photo'): ?>
            <td><img src="../images/<?= $values ?>" alt="<?= $tab['titre'] ?>" class="card-img-top" ></td>
        <?php else: ?>
            <td><?= $value ?></td>
<?php endif; ?>  
<?php endforeach; ?>
    <td><a href="?action=suppression&id_photo=<?= $tab['id_photo']?>" class="text-danger" onclick="return(confirm('Etes vous sur de vouloir supprimer?'))"><i class="fas fa-trash-alt text-dark"></i></a></td>
    </tr>
<?php endforeach; ?>
</table>  

<button class="btn btn-secondary color-white col-md-4 offset-md-4"><a href="<?=URL?>" action="">Retour à l'accueil</a></button> 


<!-- formulaire -->
<form class="col-md-6 offset-md-3" method="post" action="" enctype="multipart/form-data" ><!-- enctype: obligatoire en PHP pour recolter les informations d'un fichier uploadé -->
    <div class="form-group">
        <label for="nom_photo">Nom de la photo</label>
        <input type="text" class="form-control col-md-12" id="nom_photo" name="nom_photo" placeholder="nom_photo" value="">
    </div> 
    <div class="form-group">
        <label for="photo">Photo</label>
        <input type="file" class="form-control-file" name="photo" id="photo" value="">
    </div>  
        <input type="hidden" id=photo_actuelle name="photo_actuelle" value="<?=$photo?>">
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>  


<?php
require_once('../include/footer.php');
?>
