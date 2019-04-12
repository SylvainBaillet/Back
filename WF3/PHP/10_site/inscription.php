<?php
require_once('include/init.php');
extract($_POST);
//---2
echo '<pre>'; print_r($_POST);echo '</pre>';

//---3 controle
if($_POST)
{
    /* On selectionne tout dans la bdd a condition que la colonne 'pseudo' de la table 'membre' soit égale à la donnée saisie dans le champ pseudo du formulaire */
    $verifpseudo = $bdd->prepare("SELECT * FROM membres WHERE pseudo = :pseudo"); 
    $verifpseudo->bindValue(":pseudo" , $pseudo, PDO::PARAM_STR);
    $verifpseudo->execute();
    /* Si le resultat de la requete est supérieur à 0, cela veut dire qu'un pseudo est bien existant en BDD, alors on affiche un message d'erreur. */
    if ($verifpseudo->rowCount() > 0)
    {
        $error .= '<div class="col-md-6 offset-md-3 text-center alert alert-danger">Le pseudo <strong>' . $pseudo .'</strong> est deja existant. Merci d\'en saisir un nouveau</div>';
        
    }

    //---4
    if($_POST['mdp'] !== $_POST['mdp2'])
    {   
    $error .='<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Les deux champs mot de passe doivent être identiques</div> ';    
    }
    if(empty($error))
    {
        $data_insert = $bdd->prepare("INSERT INTO membres (pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse) VALUES (:pseudo, :mdp ,:nom , :prenom , :email, :civilite, :ville , :code_postal, :adresse)");
        
        foreach($_POST as $key => $value)
        {
            if($key != "mdp2")
            {
                $data_insert->bindValue(":$key", $value, PDO::PARAM_STR);
            }                         
        }
        $data_insert->execute();
    }
    header("location: connexion.php?action=validate"); /* header() -> fonction predefinie qui permet d'effectuer une redirection de page / URL. */
    
        echo '<div class="col-md-4 offset-md-4 alert alert-success text-center text-dark">Bravo vous avez réussi</div> ';
    
}// FIN IF($_POST)

require_once('include/header.php');
?>

<!-- 
1- creer un fomulaire HTML correpondant a la table 'membre' de la de la BDD 'site'(sauf 'id_membre' et 'statut') et ajouter le champ 'confirmer mdp'
2- Controler en php que l'on receptionne bien toutes les données du formulaire ($_POST)
3- Controler la disponibilité du pseudo
4- Faites en sorte d'informer l'internaute si les mdp ne sont pas identiques
5- Si l'internante a bien rempli le formulaire, cela veut dire qu'il n'est pasé dans aucune des conditions if donc la variable $error est vide. Nous pouvons donc executer le traitement de l'insertion (requete preparée).
 -->

 <hr><h1 class="display-4 text-center">INSCRIPTION</h1><hr>
 <?= $error ?>
 <!-- je fais un echo ici de ma vaiable '$error' pour que toutes mes erreurs s'affichent entre mon titre et le debut de mon formulaire -->
<form class="col-md-6 offset-md-3" method="post" action="">
  <div class="form-group">
    <label for="Pseudo">Pseudo</label>
    <input type="text" class="form-control col-md-12" id="Pseudo" name="pseudo" placeholder="pseudo">
  </div> 
  <div class="form-group">
    <label for="exampleInputPassword1">Mot de passe</label>
    <input type="text" class="form-control col-md-12" id="exampleInputPassword1" name="mdp" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword2">Mot de passe</label>
    <input type="text" class="form-control col-md-12" id="exampleInputPassword2" name="mdp2" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="Nom">Nom</label>
    <input type="text" class="form-control col-md-12" id="nom" name="nom" placeholder="Nom">
  </div> 
  <div class="form-group">
    <label for="Prenom">Prenom</label>
    <input type="text" class="form-control col-md-12" id="prenom" name="prenom" placeholder="Prenom">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" class="form-control col-md-12" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Civilité</label>
    <select class="form-control" name="civilite" id="exampleFormControlSelect1">
    <!-- si  un fruit a bien été selectionné et que ce fruit est égal à 'cerises', alors on affiche 'selected' dans la balise option -->
      <option value="f"
      <?php if(isset($_POST['civilite']) && $_POST['civilite'] == 'f') echo 'selected' ?>>Femme</option>
                            <?= (isset($_POST['civilite']) && $_POST['civilite'] == 'f') ? 'selected' : ''?>
      <option value="m"<?php if(isset($_POST['civilite']) && $_POST['civilite'] == 'm') echo 'selected' ?>>Homme</option> 
    </select>
  </div>
  <div class="form-group">
    <label for="Ville">Ville</label>
    <input type="text" class="form-control col-md-12" id="ville" name="ville" placeholder="Ville">
  </div>
  <div class="form-group">
    <label for="Code Postal">Code Postal</label>
    <input type="text" class="form-control col-md-12" id="codepostal" name="code_postal" placeholder="Code Postal">
  </div>
  <div class="form-group">
    <label for="Adresse">Adresse</label>
    <input type="text" class="form-control col-md-12" id="adresse" name="adresse" placeholder="Adresse">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


<?php
require_once('include/footer.php');

?>

