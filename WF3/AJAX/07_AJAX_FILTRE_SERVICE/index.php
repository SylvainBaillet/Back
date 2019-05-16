<?php

require_once("init.php");

extract($_POST);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>07 AJAX FILTRE SERVICE</title>
  </head>
  <body>
    <div class="container">
    <h1 class="display-4 text-center">07 AJAX FILTRE SERVICE</h1>

    <!-- creer le formulaire avec un selecteur de tous les services distincs de la table employés en PHP sans bouton submit. on utilisera l'evenement change en JQUERY pour afficher le bon resultat. -->
    <form method="post">
        <?php  
        $result = $bdd->query("SELECT DISTINCT service FROM employes");
        ?>
        <select class="form-control" id="service" name="service">
        <!-- exemple de la boucle while en écriture ternaire -->
        <?php
        while($service = $result->fetch(PDO::FETCH_ASSOC)):
        ?>
        <option> <?= $service['service'] ?></option>
        <?php endwhile;?>
        </select>
        </div>
    </form>

    <div id="resultat" >
        
        <?php $result = $bdd->query("SELECT * FROM employes");
         ?> 
        <table class="table table-bordered text-center">
            <tr>
                <!-- ecriture ternaire de la boucle for-->
                <?php for($i =0; $i<$result->columnCount(); $i++): 
                $colonne = $result->getColumnMeta($i);?>
                <th> <?=$colonne['name']?></th><!-- affichage des entetes -->
                <?php endfor;?>
            </tr>
            
                <?php while($employes= $result->fetch(PDO::FETCH_ASSOC)):?>
                    <tr>
                        <?php foreach($employes as $value): ?>
                        <td> <?=$value?> </td>
                        <?php endforeach;?>
                        <?php endwhile;?>
                </tr>
        </table> 


    <!-- Realiser le traitement php permettant d'afficher l'ensemble de la table employé -->
    </div>

    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS --> 
    <!-- on à été chercher la derniere version de jquery en version "minified", dans la version slim, il peut manquer des fonctionalités -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="ajax7.js"></script> 
       <!--  on met d'abord le lien cdn jquery, et en dessous notre lien avec notre fichier 'ajax2.js' le script étant lu de haut en bas on doit mettte dans cet ordre la -->
</body>
</html>
