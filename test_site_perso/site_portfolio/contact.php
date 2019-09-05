<?php
require_once("include/init.php");
require_once("include/header.php");
require_once("include/classes.php");

// extract($_POST);
// if(isset($_POST['submit']))/* on verifie si on a bien cliqué sur le bouton 'submit' qui a pour attribut name 'submit', si nous avions plusieurs formulaires sur la meme page, la condition permet de differencier sur quel bouton le formulaire a été validé */
// {
//     //1er argument:
//     $destinataire = "sylvain.baillet@lepoles.com";
//     //2 eme argument
//     $nom = $_POST['nom'];

//     $email = $_POST['email'];
//     // 3eme argument: 
//     $message = $_POST['message'];
//     // 4eme argument: obligatoire (MIME-version 1.0 est un protocole d'envoi de mail stadardisé)
//     $entetes = "MIME-Version 1.0 \n"; /* est un standard internet qui étentd le format de données des courriels pour supporter des textes en differents codages des caracteres autres que l'ASCII , des contenus non textuels, des contenus multiples, et des informations d'en-tete en d'autres codages que l'ASCII.*/

//     // entete expediteur: toujours "from" et non "de" par exemple
//     $entetes .= "from: moi@exemple.com\n";

//     //priorité urgente
//     $entetes .= "X-priority: 1\n";

//     //type de contenu HTML // avec cette ligne, je peux coder en html dans le message
//     $entetes .= "content-type: text/html; charset=utf-8\n";

//     mail($destinataire, $nom, $email, $message, $entetes); // fonction predefinie permettant l'envoi du mail / toujours  4 arguments: destinataire/sujet/message/expediteur. L'ordre est crucial sinon le test ne fonctionne pas.
// }

// instanciation de ma class Contact
     $contact = new Contact;

if(isset($_POST)){
    if(!empty($errors))
    {
        echo $errors;
    }   

else
{
    $contact->insertAction();

    $contact->sendMailAction();
}
}

?>

<div class="container" id="mainContact">
    <!--Section: Contact v.2-->

    <!--Section heading--> <div class="col-md-5 mx_auto"><?php ?></div>
    <h2 class="h1-responsive font-weight-bold text-center my-4">Pour me contacter</h2>

    <div class="row">

        <div class="col-md-6 mx-auto"> </div>
        <div class="col-md-9">
            <form class="col-md-6 offset-md-1" method="post" action="">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control col-md-12" id="nom" name="nom" placeholder="nom">
            </div> 
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control col-md-12" id="email" aria-describedby="emailHelp" name="email" placeholder="email">
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" name="message" rows="3" placeholder="Votre message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
            
            
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 text-center">
            <ul class="list-unstyled">
                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                    <p>06 51 29 95 59</p>
                </li>
                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                    <p>sylvain.baillet@lepoles.com</p>
                </li>
            </ul>
        </div>
        <!--Grid column-->

    </div>
    <!-- fin div row -->

</div>

<?php
require_once("include/footer.php");
?>