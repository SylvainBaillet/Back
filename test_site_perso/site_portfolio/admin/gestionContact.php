<?php
require_once('../include/init.php');
extract($_POST);
extract($_GET);

if(empty($_SESSION)){
    header("location: ../index.php");
}

// requete de suppression photo  
if(isset($_GET['action']) && $_GET['action'] == 'suppression')
{
        $data_suppr = $bdd->prepare("DELETE FROM contact WHERE id_contact = :id_contact");
        $data_suppr->bindValue(":id_contact", $id_contact, PDO::PARAM_STR);/* $id_contact fait référence à $_GET['id_contact'] car on a fait un extract($_GET) plus haut  */
        $data_suppr->execute();

        // $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$

        $_GET['action'] = 'affichage';// une fois la suppression d'un produit faite, on redirige vers affichage

        // $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$

        $validate .= "<div class='alert alert-success col-md-6 offset-md-3 text-center'>La photo : <strong>$id_contact</strong> à bien été supprimé </div>";
}

// include header
require_once('../include/header.php');
?>
<h1 class="display-4 text-center">Affichage Contacts</h1>

<table class="table table-bordered text-center tab1">

    <!-- affichage admin photos dans un tableau -->

    <?php
        $data = $bdd->query("SELECT * FROM contact");
        $affichContact = $data->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <?php foreach($affichContact[0] as $key => $value): ?>
    
        <th><?= strtoupper($key) ?></th> 

    <?php endforeach; ?> 
        <th>MODIFIER</th>
        <th>SUPPRIMER</th>
      
        </tr>
    <?php foreach($affichContact as $key => $tab): ?>
        <tr>
    <?php foreach($tab as $key2 => $value): ?>
        <td><?= $value ?></td>
    <!-- fin de la condition if -->

    <?php endforeach; ?>
    <td><a href="?action=modification&id_contact=<?= $tab['id_contact']?>" class="text-danger" onclick="return(confirm('Etes vous sur de vouloir modifier?'))"><i class="fas fa-wrench text-dark" ></i></a></td>
    <td><a href="?action=suppression&id_contact=<?= $tab['id_contact']?>" class="text-danger" onclick="return(confirm('Etes vous sur de vouloir supprimer?'))"><i class="fas fa-trash-alt text-dark"></i></a></td>
    </tr>
    <?php endforeach; ?>
</table>  

<!-- bouton de retour à l'accueil-->
<button class="btn btn-secondary color-white col-md-4 offset-md-4"><a href="<?=URL?>" action="">Retour à l'accueil</a></button> 


<!-- include footer -->
<?php
require_once('../include/footer.php');
?>

