<?php 

    class Etudiant
        {
            private $error;
            private $prenom;
            private $nom; 
            private $email;
            private $telephone;

            public function setPrenom($prenom)
                {
                    if(is_string($prenom) && (iconv_strlen($prenom) > 2 && iconv_strlen($prenom) < 31))
                        {
                            $this->prenom = $prenom;
                        }
                    else
                        {
                            $this->error = "veuillez rentrer une chaine de caracteres entre 2 et 20 lettres!";
                            return $this->error; 
                        }    
                }

            public function getPrenom()  
                {
                    return $this->prenom;
                }    
            public function setNom($nom)
                {
                    if(is_string($nom) && (iconv_strlen($nom) > 2 && iconv_strlen($nom) < 31))
                        {
                            $this->nom = $nom;
                        }
                    else
                        {
                            $this->error = "veuillez rentrer une chaine de caracteres entre 2 et 20 lettres!";
                            return $this->error; 
                        }    
                } 
            public function getNom()  
                {
                    return $this->nom;
                }        
            public function setEmail($email)
                {
                    if(filter_var($email, FILTER_VALIDATE_EMAIL))
                        {
                            $this->email =$email;
                        }
                    else
                        {
                            $this->error = "veuillez rentrer un email valide  !";
                            return $this->error; 
                        }    
                }  
            public function getEmail()  
                {
                    return $this->email;
                }        
            public function setTelephone($telephone)
                {
                    if(preg_match('#^[0-9]{10}+$#',$telephone))
                        {
                            $this->telephone = $telephone;
                        }
                    else
                        {
                            $this->error = "veuillez rentrer un numéro de telephone valide à 10 chiffres !";
                            return $this->error; 
                        }    
                }         
            public function getTelephone()  
                {
                    return $this->telephone;
                }   
                
            // getInfos 
            public function getInfos()
                {
                    $infos['prenom'] = $this->getPrenom();
                    $infos['nom'] = $this->getNom();
                    $infos['email'] = $this->getEmail();
                    $infos['telephone'] = $this->getTelephone();

                    return $infos;
                }
        }
            

?>


<!-- Exercice 1 : PHPOO

    - Créer une classe Etudiant

    - Créer les propriétés   private

        - prenom (string de 5 à 30 caracteres)

        - nom (string de 5 à 30)

        - email(email)

        - telephone (INT de 10 caracteres)

        

        - Créer une fonction getInfos() qui retourne un array avec toutes les infos

        - Instancier 3 fois la classe dans un autre fichier. Pour chaque etudiant affecter des valeurs et les afficher.  -->

