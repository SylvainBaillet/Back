<?php
/*
    UML 

----------------------
| Vehicule           |    1. Création d'un véhicule 1
----------------------    2. Attribuer un nombre de litres d'essence au véhicule 1 : 5l
| $litresEssence     |    3. Afficher le nombre de litres d'essence du véhicule 1
----------------------    4. Création d'une pompe
| setLitresEssence() |    5. Attribuer un nombre de litres d'essence à la pome : 800
| getLitresEssence() |    6. Afficher le nombre de litres d'essence de la pompe
----------------------    7. la pompe donné de l'essence en faisant le plein (50L)
                             à la voiture 1
----------------------    8. Afficher le nombre de litres d'essence de la voiture aprés
| Pompe              |       ravitaillement
----------------------    9. Afficher le nombre de litres restant à la pompe
| $litresEssence     |      
----------------------    public function donnerEssence(Vehicule $v)   
| setLitresEssence() |
| getLitresEssence() |
| donnerEssence()    |
----------------------
*/

class Vehicule1
    {
       private $litresEssence; 
       public function setLitresEssence($litresEssence)
       {
                $this->litresEssence = $litresEssence;    
       }
    public function getLitresEssence()
        {
            return $this->litresEssence;
        }    
    } 
$voiture = new Vehicule1;  
echo '<pre>'; var_dump($voiture);  echo'</pre>';  

$voiture->setLitresEssence('5');
echo "quantité réservoir :" . $voiture->getLitresEssence() . " Litres d'essence" . "<hr>"; 

class Pompe 
    {
        private $essencePompe;
        public function setEssencePompe($essencePompe)
            {
                $this->essencePompe = $essencePompe; 
            }
        public function getEssencePompe()
            {
                return $this->essencePompe;
            }    
        public function donnerEssence(Vehicule1 $v)/* ici on exige un argument de type vehicule, c'est a dire un objet issu de la class vehicule */
        
        {
            // cette ligne sert a definir le nombre de litres d'essence dans la pompe
            $this->setEssencePompe($this->getEssencePompe() - (50 - $v->getLitresEssence()));
            // cette ligne sert a definir le nombre de litres d'essence dans le vehicule1
            $v->setLitresEssence($v->getLitresEssence() + (50 - $v->getLitresEssence()));
        }
        
    }
$pompe = new Pompe;
echo '<pre>'; var_dump($pompe);  echo'</pre>';  

$pompe->setEssencePompe(800);  
echo "quantité réservoir :" . $pompe->getEssencePompe() . " Litres d'essence" . "<hr>"; 

$pompe->donnerEssence($voiture);

echo "nombre de litres d'essence à la pompe, apres ravitaillement :". $pompe->getEssencePompe() .'<hr>';
echo "nombre de litres d'essence pour le vehicule :". $voiture->getLitresEssence() .'<hr>';





