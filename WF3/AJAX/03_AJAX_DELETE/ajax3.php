<?php
require_once('init.php');
extract($_POST);
$tab = array();


//requete test
//$result = $bdd->exec("DELETE FROM employes WHERE id_employes = 990");
// echo $result;

$result = $bdd->exec("DELETE FROM employes WHERE id_employes = '$id'");


// declaration du selecteur a jour

$result = $bdd->query("SELECT * FROM employes");


$tab['resultat']= '<div class="form-group">';
$tab['resultat'].= '<select class="form-control" id="employe">';
while($employes=$result->fetch(PDO::FETCH_ASSOC))
{
    $tab['resultat'].= "<option value='$employes[id_employes]'> $employes[nom]</option>";
}
$tab['resultat'].= '</select>';     
$tab['resultat'].= '</div>'; 

$tab['message']= "<div class='alert alert-success'> L'employé n° $id à bien été supprimé</div>";/* on créé un nouvel indice dans le tableau ARRAY pour stocker un message de validation */

echo json_encode($tab);

