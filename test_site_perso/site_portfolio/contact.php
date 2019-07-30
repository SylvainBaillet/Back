<?php
require_once("include/init.php");
require_once("include/header.php");

class Formulaire 
{
    private $nom;
    private $email;
    private $message;
    private $error;
    public function setNom()
        {
            if(iconv_strlen($nom)>2 && iconv_strlen($nom) < 21)
                {
                    $this->nom = $nom;
                }
            else
                {
                    $this->error = "veuillez rentrer un nom entre 2 et 20 caractères";
                    return $this->error;
                }    
        }
    public function getNom()
        {
            return $this->nom;
        }
    public function setEmail()
        {
            if($_POST['email'] OR filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                {
                    $this->email = $email;
                }
            else
                {
                    $errors['email'] = "L'email entré n'est pas valide";
                    return $this->error;
                }
                
        }   
        
    public function getEmail()
        {
            return $this->email;
        }    

    public function setMessage()
        {
            if(iconv_strlen($message)>2 && iconv_strlen($message) < 256)
                {
                    $this->message = $message;
                }
            else
                {
                    $this->error = "veuillez rentrer un message entre 2 et 255 caractères";
                    return $this->error;
                }    
        }
    public function getMessage()
        {
            return $this->message;
        }    
    // error 
    public function getError()
        {
            return $this->error;
        }

}     
?>

<div class="container" id="mainContact">
    <!--Section: Contact v.2-->
<section class="mb-4">

    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">Pour me contacter</h2>

    <div class="row">

        <!--Grid column-->
        <div class="col-md-9 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="name" name="name" class="form-control">
                            <label for="name" class="">nom</label>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="email" name="email" class="form-control">
                            <label for="email" class="">email</label>
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            <label for="message">Votre message</label>
                        </div>

                    </div>
                </div>
                <!--Grid row-->

            </form>

            <div class="text-center text-md-left">
                <a class="btn btn-primary bg-dark text text-light" onclick="document.getElementById('contact-form').submit();">Envoyer</a>
            </div>
            <div class="status"></div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 text-center">
            <ul class="list-unstyled mb-0">
                
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

</section>
<!--Section: Contact v.2-->


</div>

<?php
require_once("include/footer.php");
?>