<?php
//interface.php
/* L'interface sert a creer des methodes avec des noms bien precis que les differents developpeurs utiliseront pour developper leur differents objets et methodes, en suivant des conventions precises imposées par le chef de projet (comme un contrat), ainsi chaque vehicule ici, utilisera les memes noms de methodes*/

   interface Mouvement
   {
        public function start();
        public function turnLeft();
        public function turnRight();
   }
   
    

//Aurelia
    class Avion extends Vehicule implements Mouvement   
    {
        public function start(){
            
        }
        public function turnLeft();(){

        }
        public function turnRight(){

        }
    } 
//Yuliia
    class Bateau extends Vehicule implements Mouvement   
    {
        public function start(){
            
        }
        public function turnLeft();(){

        }
        public function turnRight(){

        }
    } 

    

