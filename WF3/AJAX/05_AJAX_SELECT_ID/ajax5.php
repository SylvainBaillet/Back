<?php
require_once('init.php');
extract($_POST);
$tab = array();

//requete de selection (requete ajax 'aller')
$result = $bdd->query("SELECT * FROM employes WHERE id_employes = $id");
// echo '<pre>'; var_dump($result); echo '</pre>';

$employe = $result->fetch(PDO::FETCH_ASSOC);
 //echo '<pre>'; var_dump($employe); echo '</pre>';


//declaration du tableau de l'employé (requete ajax 'retour') ce que j'envoie su ma page index.php
$tab['resultat']= '<table class="table table-bordered text-center">';
$tab['resultat'].= '<tr>';
    for($i =0; $i< $result->columnCount(); $i++)
        {
            $colonne = $result->getColumnMeta($i);
            $tab['resultat'].= "<th>$colonne[name]</th>";
        }
        $tab['resultat'].= '</tr>';
        $tab['resultat'].= '<tr>';
        //réaliser le traitement php permettat l'affichage des données de l'employé
            foreach($employe as $value)
            {
                $tab['resultat'].= "<td>$value</td>";
            }
        $tab['resultat'].= '</tr>';
$tab['resultat'].= '</table>';

echo json_encode($tab);       
?>