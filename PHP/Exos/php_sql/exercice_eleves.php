<?php
// 1- echo '<pre>'; print_r($_POST);echo '</pre>';

extract($_POST);

    
    

// on declare une variable d'erreur pour chaque champ afin de les faire apparaitre
$nomerror ='';
$preerror ='';
$claerror ='';
$parerror ='';
$telerror ='';
$success ='';



if($_POST) // 1-1, on securise les champs
{
    if(empty($prenom) || iconv_strlen($prenom) < 2 || iconv_strlen($prenom) > 30)
    {
        $preerror .= '<small class="alert alert-danger">Saisissez un prenom compris ente 2 et 30 caracteres</small>';
    }
    if(empty($nom) || iconv_strlen($nom) < 2 || iconv_strlen($nom) > 30)
    {
        $nomerror .= '<small class="alert alert-danger">Saisissez un nom compris ente 2 et 30 caracteres</small>';
    }
    if(empty($classe) || iconv_strlen($classe) < 2 || iconv_strlen($classe) > 30)
    {
        $claerror .= '<small class="alert alert-danger">Saisissez une classe valide ente 2 et 30 caracteres</small>';
    }
    if(empty($parents) || iconv_strlen($parents) < 2 || iconv_strlen($prenom) > 30)
    {
        $parerror .= '<small class="alert alert-danger">Saisissez un prenom compris ente 2 et 30 caracteres</small>';
    }
    if(!preg_match("#^[0-9]{10}+$#", $telephone))
    {
        $telerror .= '<small class="alert alert-danger">Saisissez un numero valide de 10 chiffres</small>';
    }

    // 2 - j'insere en base de donnée si je n'ai aucun message d'erreur
    if(empty($preerror) && empty($nomerror) && empty($claerror) && empty($parerror) && empty($parerror) && empty($telerror))
    {

        // 2-1 connexion a la base de donnée
        $bdd = new PDO('mysql:host=localhost;dbname=eleves','root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        
        // 2-2 on insere en BDD
        $nouveleve = $bdd->prepare("INSERT INTO eleve (nom , prenom, classe, parents, telephone) VALUES (:nom , :prenom, :classe, :parents, :telephone)");
        foreach($_POST as $key => $value)// pour chaque ligne entrée dans le formulaire, on fait un bindvalue
        {
            $nouveleve->bindValue(":$key", $value, PDO::PARAM_STR);
        }
        $nouveleve->execute(); 
        
        // 2-3 on affiche le message qui dit: tout s'est bien déroulé
        $success .= '<small class="alert alert-success">Vous avez réussi</small></small>';

        /*  */
        $data = $bdd->query("SELECT * FROM eleve");
        $eleves = $data->fetch(PDO::FETCH_ASSOC);
        echo '<pre>'; print_r($eleves);echo '</pre>';

    }
    
//requete d'insertion
           
}//fin requete insertion - fin IF($_POST)

    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Exo éleves bdd</title>
  </head>
  <body>

  <div class="container">
            
        <form class="col-md-6 offset-md-3" method="post">
        <?=$success?>
            <div class="form-group">
                <label for="exampleInputEmail1">Nom</label>
                <?= $nomerror ?>
                <input type="text" class="form-control"  placeholder="nom" name="nom">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Prenom</label>
                <?= $preerror ?>
                <input type="text" class="form-control"  placeholder="prenom" name="prenom">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Classe</label>
                <?= $claerror ?>
                <input type="text" class="form-control"  placeholder="classe" name="classe">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Parents</label>
                <?= $parerror ?>
                <input type="text" class="form-control"  placeholder="parents" name="parents">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Telephone</label>
                <?= $telerror ?>
                <input type="text" class="form-control"  placeholder="telephone" name="telephone">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>