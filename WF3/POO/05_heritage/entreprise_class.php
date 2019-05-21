<?php
    class Electricien
        {
            public function getSpecialListe()
            {
                return "Pose de cables, tableaux ou armoires éléctriques... <hr>";
            }
            public function getHoraires()
            {
                return '10h - 18h <hr>';
            }
        }


    class Plombier
        {
            public function getSpecialListe()
            {
                return "tuyaux, robinets, chauffe-eau, compteur... <hr>";
            }
            public function getHoraires()
            {
                return '8h - 19h <hr>';
            }
        }
//----------------------------------------------------
    class Entreprise
        {
            public $numero = 0;
            public function appelUnEmploye($employe)
                {
                    $this->numero++;//incrementation de numero
                    $this->{"monEmploye" . $this->numero} = new $employe;// a chaque fois que l'on execute la methode appelUnEmploye(), cela genere dans le meme temps une propriete dans laquelle est stockée un instance d'une classe
                    return $this->{"monEmploye" . $this->numero};   
                }    
        }

        $entreprise = new Entreprise;
        $entreprise->appelUnEmploye('plombier');

// Exo: afficher les methodes de la class Plombier via l'objet issu de la class Entreprise
echo $entreprise->monEmploye1->getSpecialListe();
echo $entreprise->monEmploye1->getHoraires();

        $entreprise->appelUnEmploye('electricien');

echo $entreprise->monEmploye2->getSpecialListe();
echo $entreprise->monEmploye2->getHoraires();        


?>