<?php

 // reponse 1 - je rajoute abstract pour ne pas pouvoir instancier un objet Vehicule
 abstract class Vehicule
    {
        //reponse 2 - je rajoute final
        final function demarrer()
            {
                return "je demarre <hr>";
            }

        //reponse 3    
        abstract public function carburant();
            

        public function nombreDeTestObligatoires()
            {
                return 100;
            }

    }

    class Peugeot extends Vehicule
    {
        public function carburant()
        {
            return "essence";
        }
        public function nombreDeTestObligatoires()
            {
                //variable de stockage permettant de receptionner '100' qui est le nombre initial declaré dans nombreDe testObligatoires()
                $nombreTest = parent:: nombreDeTestObligatoires();
                    
                        return $nombreTest + 70;
                    
            }
    }

    class Renault extends Vehicule
    {
        public function carburant()
        {
            return "diesel";
        }
        public function nombreDeTestObligatoires()
            {
                $nombreTest = parent:: nombreDeTestObligatoires();
                    
                        return $nombreTest + 30;
                    
            }

    }

    /* 
    -1 Faire en sorte de ne pas pouvoir avoir d'objet vehicule
    -2 Obligation pour la Renault et la Peugeot de posseder la meme methode demarrer
    -3 Obligation Pour la Renault de declarer un carburant  'diesel'  et pour la Peugoet un carburant 'essence'
    -4 La Renault doit faire 30 tests de plus qu'un vehicule de base
    -5 La Peugeot doit faire 70 tests de plus qu'un vehicule de base
    -6 Effectuer les affichages necessaires
    */
$peugeot = new Peugeot; 

echo $peugeot->demarrer();
echo "La peugeot consomme du carburant :" . $peugeot->carburant() . "<hr>";
echo "Nombre de tests pour la Peugeot :" . $peugeot->nombreDeTestObligatoires() . "<hr>";

$renault = new Renault;

echo $renault->demarrer();
echo "La renault consomme du carburant :" . $renault->carburant() . "<hr>";
echo "Nombre de tests pour la Renault :" . $renault->nombreDeTestObligatoires() . "<hr>";

