<?php
require_once('init.php');
extract($_POST);
$tab = array();

//requete de selection (requete ajax 'aller')
$result = $bdd->query("SELECT * FROM employes WHERE id_employes = 699");
// echo '<pre>'; var_dump($result); echo '</pre>';

$employe = $result->fetch(PDO::FETCH_ASSOC);
 //echo '<pre>'; var_dump($employe); echo '</pre>';


//declaration du tableau de l'employé (requete ajar 'retour') ce que j'en voie su ma page index.php
$tab['resultat']= '<table class="table table-bordered text-center">';
$tab['resultat'].= '<tr>';
    for($i =0; $i< $result->columnCount(); $i++)
        {
            $colonne = $result->getColumnMeta($i);
            $tab['resultat'].= "<th>$colonne[name]</th>";
        }
        $tab['resultat'].= '</tr>';
        $tab['resultat'].= '<tr>';
            foreach($employe as $key => $value)
            {
                $tab['resultat'].= "<td>$value</td>";
            }
        $tab['resultat'].= '</tr>';
$tab['resultat'].= '</table>';

echo json_encode($tab);       
?>