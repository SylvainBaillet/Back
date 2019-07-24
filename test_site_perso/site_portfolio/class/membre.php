<?php 

class Membre
{
    private $pseudo;
    private $mdp;
    private $error;
    public function setPseudo()
       {
            if(iconv_strlen($pseudo)>2 && iconv_strlen($pseudo) < 21)
                {
                    $this->pseudo = $pseudo;
                }
            else
                {
                    $this->error = "veuillez rentrer un pseudo entre 2 et 20 caractères";
                    return $this->error;
                }    
       }  
    public function getPseudo()
        {
            $this->pseudo;
        }
    public function setMdp()
       {
            if((isset($pseudo))
                {

                }
            else()
                {

                }    
       }  
    public function getMdp()
        {
            return $this->mdp;
        }
    public function getError()
        {
            return $this->error;
        }    
}