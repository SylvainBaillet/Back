<?php
require_once("include/init.php");


extract($_POST);


/* Si l'indice 'action' est défini dans l'URL et qu'il a comme valeur 'deconnexion', cela  veut dire que l'on a cliqué sur le lien 'déconnexion', alors on supprime le fichier session. */
if(isset($_GET['action']) && $_GET['action'] == "deconnexion")
    {
        session_destroy(); 
        header("location: index.php");
    } 

if(isset($_GET['action']) && $_GET['action'] == 'validate')
    {
        $validate .= '<div class="col-md-4 offset-md-4 alert alert-success text-center text-dark">Vous êtes connecté et admin!</div> '; 
    }

// requete de selection de ma table membre
$req = $bdd->query('SELECT * FROM  membre');
$admin = $req->fetch(PDO::FETCH_ASSOC);    
   
//  si mon formulaire est validé
if($_POST)
    {
        // si je n'ai pas de pseudo ou 
        if((!isset($_POST['pseudo']) || $_POST['pseudo'] != $admin['pseudo']) || ((!isset($_POST['mdp']) || !password_verify($_POST['mdp'], $admin['mdp'])) || ($admin['statut'] != 1)))
        {
            // affichage de mon erreur
            $error .= '<div class="col-md-4 mx-auto alert alert-danger text-center text-danger">Le mot de passe est incorrect, veuillez en saisir un à nouveau</div> ';
        }
        
       
        else /* on entre dans le ELSE si le bon pseudo et mdp sont entrés*/
        {
            $_SESSION['membre']['statut'] =1;
            header("location: admin/gestionAdmin.php");
        }
    }
    
 include('include/header.php') ;  
?>

<div class="container">
    <form class="col-md-8 mx-auto" method="post" action="">
    <div class="form-group">
        <label for="exampleInputEmail1" class="text text-light">Pseudo</label>
        <input type="text" name="pseudo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="pseudo">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1" class="text text-light">Mot de passe</label>
        <input type="password" name="mdp" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">
    </div>
    <button type="submit" action="validate" class="btn btn-dark mx-auto">Envoyer</button>
    </form>
</div> 

<?php
require_once("include/footer.php");
?>