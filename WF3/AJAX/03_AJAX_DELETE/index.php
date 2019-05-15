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
    <title>03 AJAX DELETE</title>
</head>
<body>
    
    <div class="container">
        <h1 class="display-4 text-center">Supprimer un employé</h1>

        <div id="messSuppr"></div><!--cette div receptionne le message de validation apres la suppression d'un employé  -->

        <form method="post" action="" class="col-md-6 offset-md-3 text-center">
            
        <div id="employes">
            
        <?php  
        $result = $bdd->query("SELECT * FROM employes");

        echo '<div class="form-group">';
        echo '<select class="form-control" id="employe">';

        while($employes =$result->fetch(PDO::FETCH_ASSOC))
        {
        echo "<option value='$employes[id_employes]'> $employes[nom]</option>"; 
        }
        echo '</select>';
        echo'</div>';
        ?>
        
        </div>
    <input type="submit" class="col-md-6 offset-md-3 btn btn-dark" id="submit" value="supprimer" placeholder="employé a supprimer">
    </form>  
    </div>

<!-- jQuery first, then Popper.js, then Bootstrap JS --> 
    <!-- on à été chercher la derniere version de jquery en version "minified", dans la version slim, il peut manquer des fonctionalités -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="ajax3.js"></script> 
       <!--  on met d'abord le lien cdn jquery, et en dessous notre lien avec notre fichier 'ajax2.js' le script étant lu de haut en bas on doit mettte dans cet ordre la -->
</body>
</html>