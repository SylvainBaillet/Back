<?php
require_once('init.php');
extract($_POST);
$tab = array();

//requete de selection
$result = $bdd->query("SELECT * FROM employes WHERE prenom = '$prenom'");
// echo '<pre>'; var_dump($result); echo '</pre>';

$employe = $result->fetch(PDO::FETCH_ASSOC);
 //echo '<pre>'; var_dump($employe); echo '</pre>';



$tab['resultat']= '<table class="table">';
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