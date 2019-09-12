<?php
require_once('../include/init.php');
extract($_POST);
extract($_GET);

// requete de suppression cardweb
if(isset($_GET['action']) && $_GET['action'] == 'suppression')
{
        $data_suppr = $bdd->prepare("DELETE FROM cardweb WHERE id_cardweb = :id_cardweb");
        $data_suppr->bindValue(":id_cardweb", $id_cardweb, PDO::PARAM_STR);/* $id_photo fait référence à $_GET['id_photo'] car on a fait un extract($_GET) plus haut  */
        $data_suppr->execute();

        // $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$

        $_GET['action'] = 'affichage';// une fois la suppression d'un produit faite, on redirige vers affichage

        // $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$

        $validate .= "<div class='alert alert-success col-md-6 offset-md-3 text-center'>La card : <strong>$id_cardweb</strong> à bien été supprimée </div>";
}
// insertion photo
if($_POST)
    {
        $photo_bdd='';
        if(isset($_GET['action']) && $_GET['action'] == 'modification'){
            $photo_bdd = $photo_actuelle;
        }
            if(!empty($_FILES['photoweb']['name']))/* on verifie que l'indice 'name' dans la superglobale $_FILES n'est pas vide, cela veut dire que l'on a bien uploadé une photo */
            {
            $nom_photo = $titre . '-' . $_FILES['photoweb']['name'];/* on redefinie le nom de la photo en concaténant la référence saisie dans le formulaire avec le nom de la photo */
            // echo $nom_photo . '<br>';

            $photo_bdd = URL . "images/$nom_photo";//URL est une constante, tout comme RACINE_SITE
            // echo $photo_bdd . '<br>';

            $photo_dossier = RACINE_SITE . "images/$nom_photo";/* on définie l'URL de la photo, c'est ce que l'on conservera en BDD */
            // echo $photo_dossier . '<br>';

            copy($_FILES['photoweb']['tmp_name'], $photo_dossier);/* la fonction predefinie copy() permet de copier la photo dans le dossier photo: arguments: nom temporaire de la photo, chemin de destination */
            }

        if(isset($_GET['action']) && $_GET['action'] == 'ajout')
            {
                $addPhoto = $bdd->prepare("INSERT INTO cardweb(photoweb, titre) VALUES (:photoweb, :titre)");

                $validate .= "<div class='alert alert-success col-md-6 offset-md-3 text-center'>La cardweb : <strong>$title</strong> à bien été ajoutée </div>";
            }
        else  
            {
                $addPhoto = $bdd->prepare("UPDATE cardweb SET photoweb = :photoweb, titre = :titre WHERE id_cardweb = $id_cardweb");

                $validate .= "<div class='alert alert-success col-md-6 offset-md-3 text-center'>La cardweb : <strong>$title</strong> à bien été modifiée </div>";
            }

        foreach($_POST as $key => $value)
            {
                if($key != 'photo_actuelle')
                {
                    $addPhoto->bindValue(":$key" , $value , PDO::PARAM_STR);
                }
            }                
        $addPhoto->bindValue(":photoweb", $photo_bdd, PDO::PARAM_STR);
        $addPhoto->execute();

        header("location: gestionCardWeb.php");
    }

// include header
require_once('../include/header.php');
?>

<h1 class="display-4 text-center">Affichage card</h1>

<!-- bouton d'ajout cardweb-->
<button type="submit" class="btn btn-primary boutonAjout offset-md-3 mb-2"><a href="?action=ajout#formulaireCardWeb" class="text text-light">Ajout Card</a></button>
    <table class="table table-bordered text-center tab1">

    <!-- affichage admin photos dans un tableau -->

        <?php
            $data = $bdd->query("SELECT * FROM cardweb");
            $affichCard = $data->fetchAll(PDO::FETCH_ASSOC);
        ?>
  
        <?php foreach($affichCard[0] as $key => $value): ?>
    
        <th><?= strtoupper($key) ?></th> 

        <?php endforeach; ?> 
            <th>MODIFIER</th>
            <th>SUPPRIMER</th>
        
            </tr>
        <?php foreach($affichCard as $key => $tab): ?>
            <tr>
        <?php foreach($tab as $key2 => $value): ?>

            <?php if($key2 == 'photoweb'): ?>
                
            <td><img src="<?= $value ?>" alt="<?= $tab['photoweb'] ?>" class="img-thumbnail col-md-3"></td>
                
            <?php else: ?>
            <td><?= $value ?></td>
        <?php endif; ?>    
        <!-- fin de la condition if -->

    <?php endforeach; ?>
    <td><a href="?action=modification&id_cardweb=<?= $tab['id_cardweb']?>" class="text-danger" onclick="return(confirm('Etes vous sur de vouloir modifier?'))"><i class="fas fa-wrench text-dark" ></i></a></td>
    <td><a href="?action=suppression&id_cardweb=<?= $tab['id_cardweb']?>" class="text-danger" onclick="return(confirm('Etes vous sur de vouloir supprimer?'))"><i class="fas fa-trash-alt text-dark"></i></a></td>
    </tr>
    <?php endforeach; ?>
</table>  
    

    <!-- bouton de retour à l'accueil-->
    <button class="btn btn-secondary color-white col-md-4 offset-md-4"><a href="<?=URL?>" action="">Retour à l'accueil</a></button> 

    <!-- affichage photo actuelle -->
    <?php
    if(isset($_GET['id_cardweb']))
    {
    $resultat = $bdd->prepare("SELECT * FROM cardweb WHERE id_cardweb = :id_cardweb");
    $resultat->bindValue(':photoweb', $photoweb, PDO::PARAM_STR);
    $resultat->bindValue(':titre', $titre, PDO::PARAM_STR);
    $resultat->execute();

    $card_actuelle = $resultat->fetch(PDO::FETCH_ASSOC);


    $photoweb = (isset($card_actuelle['photoweb'])) ? $card_actuelle['photoweb']: '';
    $titre = (isset($card_actuelle['titre'])) ? $card_actuelle['titre']: '';
    }
    ?>

    <!-- Formulaire cardWeb -->
    <?php  if(isset($_GET['action']) && ($_GET['action'] == 'ajout' || $_GET['action'] == 'modification')):?>
    <form id="formulaireCardWeb" class="col-md-6 offset-md-3" method="post" action="" enctype="multipart/form-data" ><!-- enctype: obligatoire en PHP pour recolter les informations d'un fichier uploadé -->
    <div class="form-group">
        <label for="photoweb">Photo</label>
        <input type="file" class="form-control-file" name="photoweb" id="photoweb" value="<?=$photoweb?>">
    </div>  
        <input type="hidden" id=photo_actuelle name="photo_actuelle" value="<?=$photoweb?>">
        <div class="form-group">
            <label for="photoweb">Nom de la card</label>
            <input type="text" class="form-control col-md-12" id="titre" name="titre" placeholder="titre" value="<?=$titre?>"> 
        </div> 
        <!-- bouton de modification -->
        <button type="submit" class="btn btn-primary boutonAjout"><?= $action ?></button>
    </form>  
    <?php endif;?>

<!-- include footer -->
<?php
require_once('../include/footer.php');
?>
