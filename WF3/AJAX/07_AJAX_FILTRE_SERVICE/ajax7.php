<?php

require_once("init.php");

extract($_POST);

$tab = array();

$result = $bdd->query("SELECT * FROM employes WHERE service = '$service'");
 
       $tab['resultat']="<class='table table-bordered text-center'>";
       $tab['resultat'].= '<tr>';
                
        for($i =0; $i<$result->columnCount(); $i++): 
            $colonne = $result->getColumnMeta($i);
       $tab['resultat'].= "<th> $colonne[name]</th>";//affichage des entêtes
        endfor;
       $tab['resultat'].= '</tr>';
            
         while($employes= $result->fetch(PDO::FETCH_ASSOC)):
       $tab['resultat'].= '<tr>';         
        foreach($employes as $value): 
       $tab['resultat'].= "<td> $value </td>";
                         endforeach;
                         endwhile;
       $tab['resultat'].= '</tr>';
       $tab['resultat'].= '</>'; 

echo json_encode($tab);