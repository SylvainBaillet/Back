<?php

    //cet exemple est juste pour l'exemple, dans le cas ou les deux codeurs Sylvain et Aziz, travailleraient sur un namespace chacun , dans lequel se trouverait une class User, mais differente
    // En réalité on ne fait jamais deux namespace dans le meme fichier, le namespace doit etre la premiere ligne dans notre code, juste apres la balise ouvrante <?php

    // Sylvain: Inscription
    namespace Membre;
        class User 
            {

            }


    //Azizi : Commentaire        
    namespace Commentaire;
        class User 
            {

            }         

     // pour instancier une class issue d'un namespace, on va le faire comme ceci $user = new Commentaire\User; (c'est bien un antislash pour rentrer dans une class issue d'un namespace)