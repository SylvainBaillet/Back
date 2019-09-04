<?php


// class de mon formulaire de contact

class Contact 
{
    private $nom;
    private $email;
    private $message;
    private $errors;

    public function setNom($nom){
        if(iconv_strlen($nom) > 2 && iconv_strlen($nom) < 41){
            $this->pseudo = $pseudo;
        }
        else{
            $this->errors = "entrez un nom compris entre 2 et 30 caractères";
        }
    }
    public function getNom(){
        return $this->nom;
    }

    public function setEmail($email){
        if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->email = $email;
        }
        else{
            $this->errors = "entrez un email valide";
        }
    }
    public function getEmail(){
        return $this->email;
    }

    public function setMessage($message){
        if(iconv_strlen($message) > 2 && iconv_strlen($message) < 256){
            $this->message = $message;
        }
        else{
            $this->errors = "entrez un message compris entre 2 et 255 caractères";
        }
    }
    public function getMessage(){
        return $this->message;
    }
    
    public function insertAction(){
        $insert= $this->$bdd->prepare("INSERT INTO contact ('nom', 'email', 'message') VALUES (':nom', ':email', ':message')");
        $insert->bindValue(":nom", $nom, PDO::PARAM_STR);
        $insert->bindValue(":email", $email, PDO::PARAM_STR);
        $insert->bindValue(":message", $message, PDO::PARAM_STR);
        $insert->execute();

    }
}

