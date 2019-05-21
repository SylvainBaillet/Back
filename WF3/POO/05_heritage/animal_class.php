<?php

// IMPORTANT, il n'est pas possible d'heriter de plusieurs class en meme temps, seulement d'une!!

    class Animal 
        {
            protected function deplacement()
                {
                    return "je me deplace";
                }
            public function manger()
                {
                    return "je mange chaque jour";
                }    
        }
//-----------------------------------------------------


class Elephant extends Animal//extends premet d'heriter d'une class, ici la class Animal
    {
        public function quiSuisJe()
        {
            return "Je suis un elephant et " . $this->deplacement() . '<hr>';
        }
    }

class Chat extends Animal 
    {
         public function quiSuisJe()
        {
            return "Je suis un chat ";
        }
        public function manger()
            {
                return "je me goinfre comme un gros chat !";
            }
    }    

$elephant = new Elephant; 
echo'<pre>'; print_r(get_class_methods($elephant)); echo '</pre>';   /* get_class_methos est une methode predefinie php qui permet d'afficher les methodes issues de la class, ici la class Elephant a herité de la class Animal, donc avec get_class_methods on recupere les fonctions de la classe Elephant et de la class Animal */
echo $elephant->quiSuisJe();

// Exo: Creer un objet issu de la class 'Chat' et afficher le resultat des 2 methodes declarées a l'interieur:
$chat = new Chat;
echo $chat->quiSuisJe() . "et " . $chat->manger();// ici la methode a été redefinie dans la class 'chat', l'interpreteur  cherche d'abord dans la class 'chat', et seulement si la methode n'avait pas été trouvée, il aurait été chercher dans la classe dont j'herite, ici la class Animal 

?>

