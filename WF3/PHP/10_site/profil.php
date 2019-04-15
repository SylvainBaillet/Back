<?php
require_once('include/init.php');

if (!internauteEstConnecte())/* Si l'internaute n'est pas connecté (!) il n'a rien a faire sur la page profil, on le redirige vers la page connexion */
{
    header("location: connexion.php");
}

require_once('include/header.php');

// echo '<pre>'; print_r($_SESSION); '</pre>';
?>

<!-- Exo : afficher le pseudo de l'internaute en passant par son fichier SESSION -->
<h1 class="display-4 text-center">Bonjour <?= $_SESSION['membre']['pseudo']?> </h1> <hr>

<!-- Exo : realiser une page profil en affichant toutes les données de l'internaute contenues dans la session sauf l'id membre et le statut -->


<table class="table table-dark">
<?php foreach($_SESSION['membre'] as $key => $value):?> <!-- Les deux points : et endif et endforeach remplacent les accolades -->
    <tr>
    <?php if($key != 'id_membre' && $key != 'statut'):?>
    <th> <?=$key?> </th> <td> <?=$value?> </td>
<?php endif; ?>
</tr>
<?php endforeach; ?>
</table><hr>


<?php 
/* Si le statut dans la session, dans la BDD est a 1, cela veut dire que l'on est administrateur du site. */
if($_SESSION['membre']['statut'] == 1)
    $statut = 'ADMIN'; // si il n'y a qu'un argument dans ma condition, je ne suis pas obligé de mettre les accolades
else/* On tombe dans le ELSE si le statut est à 0, donc si on est membre du site */
    $statut = 'MEMBRE';
?>
Vous êtes <h3><strong> <?= $statut?> du site</strong></h3>

<?php
require_once('include/footer.php');
?>