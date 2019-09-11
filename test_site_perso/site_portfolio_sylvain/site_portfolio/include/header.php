<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Lien fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- lien google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Macondo+Swash+Caps&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light&display=swap" rel="stylesheet"> 

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Site_portfolio</title>
  </head>
<body>    

    <div class="container-fluid">
   
    <nav class="navbar navbar-expand-lg" id="navbar1">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-dark.navbar-toggler-icon" id="toggler"><i class="fas fa-bars"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav mx-auto">


            <?php if(adminConnecte()):?><!-- On definie les éléments de la nav auquel l'utilisateur connecté aura acces en rappelant la fonction internauteEstConnecté() dans une condition if, else (on entoure les (li) pris en compte)-->

                <li class="nav-item">
                    <a class="nav-link active" href="<?=URL?>">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=URL?>parcours.php">Mon parcours</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=URL?>travaux.php">Mes travaux</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=URL?>loisirs.php">Loisirs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=URL?>contact.php">Me contacter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=URL?>admin/gestionAdmin.php">Gestion Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=URL?>admin/gestionContact.php">Gestion Contacts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=URL?>connexion.php?action=deconnexion">Deconnexion</a>
                </li>

            <?php else:?>
                <li class="nav-item">
                    <a class="nav-link active" href="<?=URL?>">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=URL?>parcours.php">Mon parcours</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=URL?>travaux.php">Mes travaux</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=URL?>loisirs.php">Loisirs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=URL?>contact.php">Me contacter</a>
                </li>

            <?php endif;?>

            </ul>    
      </div>

    </nav>
    <!-- fin nav -->

    
        