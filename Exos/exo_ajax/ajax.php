<?php

require_once("init.php");

extract($_POST);

$tab = array();

$result = $bdd->query("SELECT * FROM produits");


$tab['resultat']= '<table class="table">';
$tab['resultat'].= '<tr>';
    for($i =0; $i< $result->columnCount(); $i++)
        {
            $colonne = $result->getColumnMeta($i);
            $tab['resultat'].= "<th>$colonne[name]</th>";
        }
        $tab['resultat'].= '</tr>';
        
            while($produit=$result->fetch(PDO::FETCH_ASSOC)):
        $tab['resultat'].= '<tr>';        
            {
                foreach($produit as $values)
                {
                    $tab['resultat'].= "<td>$values</td>";
                } 
            }
        $tab['resultat'].= '</tr>';
        endwhile;
$tab['resultat'].= '</table>';

echo json_encode($tab);       
?>