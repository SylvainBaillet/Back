<?php

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
                    $this->error = "veuillez rentrer un nom entre 2 et 20 caractères";
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