<?php

require_once("init.php");

extract($_POST);

$tab = array();

//requete d'insertion
if(empty($prenom) && empty($nom) && empty($sexe) && empty($service) && empty($date_embauche) && empty($salaire))
    {
        $tab['message'] = "<div class='col-md-6 offset-md-3 alert alert-danger text-center'>Merci de remplir tous les champs du formulaire</div>";
    }   
    else
        {
            $result = $bdd->query("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('$prenom', '$nom', '$sexe', '$service', '$date_embauche', '$salaire')");
        //requete de selection
        $result = $bdd->query("SELECT * FROM employes"); 
        // echo '<pre>'; var_dump($employe); echo '</pre>';

        if($_POST)
            {
            $tab['resultat']= '<table class="table table-bordered text-center">';
            $tab['resultat'].= '<tr>';
                for($i =0; $i< $result->columnCount(); $i++)
                    {
                        $colonne = $result->getColumnMeta($i);
                        $tab['resultat'].= "<th>$colonne[name]</th>";
                    }
                    $tab['resultat'].= '</tr>';
                    while($employes= $result->fetch(PDO::FETCH_ASSOC)):
                    $tab['resultat'].= '<tr>';
                    //réaliser le traitement php permettat l'affichage des données de l'employé
                    
                        foreach($employes as $value)
                        {
                            $tab['resultat'].= "<td>$value</td>";
                        }
                    $tab['resultat'].= '</tr>';    
                    endwhile;                        
            $tab['resultat'].= '</table>';
            }
        $tab['message'] = "<div class='col-md-6 offset-md-3 alert alert-success text-center'>L'employé <strong>$nom</strong> à bien été enregistré</div>"; 
        }
    
echo json_encode($tab);