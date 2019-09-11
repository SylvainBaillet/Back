<?php
require_once("include/init.php");
require_once("include/header.php");
require_once("include/classes.php");

extract($_POST);

$errors = '';
$successMessage = '';

if($_POST)
{
    if(empty($nom) || (iconv_strlen($nom) < 2 || iconv_strlen($nom) > 41))
    {
        $errors .= '<div class="text text-danger">veuillez entrer un nom compris entre 2 et 40 caractères</div>';
    }

    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
    {
       $errors .= '<div class="text text-danger">Veuillez entrer un email valide</div>';
    }

    if(empty($message) || (iconv_strlen($message) < 2 || iconv_strlen($message) > 256))
    {
        $errors .= '<div class="text text-danger">veuillez entrer un message compris entre 2 et 255 caractères</div>';
    }    

    if(isset($_POST) && empty($errors)){
   
    // instanciation de ma class Contact
    $contact = new Contact;

    $contact->contactAction($nom, $email, $message);

    $contact->sendMailAction();
    $successMessage = '<div class="text text-success">Votre message à été envoyé avec succès</div>';
}

}

?>

<div class="container" id="mainContact">
    <!--Section: Contact v.2-->

    <!--Section heading--> <div class="col-md-5 mx-auto"><?= $successMessage ?> <?= $errors ?></div>
    <h2 class="h1-responsive font-weight-bold text-center my-4">Pour me contacter</h2>

    <div class="row">

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