<?php

require_once("init.php");

extract($_POST);

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>05 AJAX SELECT ID</title>
</head>
<body>

<div class="container">
    <h1 class="display-4 text-center">05 AJAX SELECT ID</h1>
    <!-- 1 - realiser un selecteur dans un formulaire en php avec un bouton submit qui regroupe tous les prenoms des employés -->
        <?php  
        $result = $bdd->query("SELECT * FROM employes");
        ?>
        <select class="form-control" id="personne" name="personne">
        <!-- exemple de la boucle while en écriture ternaire -->
        <?php
        while($employes =$result->fetch(PDO::FETCH_ASSOC)):
        ?>
        <option value="<?=$employes['id_employes']?>"> <?=$employes['prenom']?></option>
        <?php endwhile;?>
        </select>
        </div>
        
        <input type="submit" class="col-md-6 offset-md-3 btn btn-dark" id="submit" value="submit" placeholder="employé a selectionner">
    </form>

    <div id="resultat">
    <!-- 2 -realiser le script php qui permet  d'afficher l'ensemble de la table employé -->
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

    </div>
</div>

<!-- jQuery first, then Popper.js, then Bootstrap JS --> 
    <!-- on à été chercher la derniere version de jquery en version "minified", dans la version slim, il peut manquer des fonctionalités -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="ajax5.js"></script> 
       <!--  on met d'abord le lien cdn jquery, et en dessous notre lien avec notre fichier 'ajax2.js' le script étant lu de haut en bas on doit mettte dans cet ordre la -->
</body>
</html>