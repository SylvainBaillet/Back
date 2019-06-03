<?php

/* La mission de ce fichier produitsModele est d'interagir avec la table produit dans la bdd */
class produitsModel
    {
        private $pdo;

        public function __construct()
            {
                $this -> pdo = new PDO('mysql:host=localhost;dbname=site', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
            }

        // recuperer tous les produits    
        public function findAll()//
        {
            $resultat = $this->pdo->query('SELECT * FROM produit');
            $produits = $resultat ->fetchAll();
            return $produits;
        }    
        // recuperer un produit par l'id
        
        // recuperer tous les produits par la categorie
        public function findCat()
        {
            $resultat = $this->pdo->query('SELECT DISTINCT categorie FROM produit');
            $categories = $resultat ->fetchAll();
            return $categories;
        }
        //insert
        //update
        //delete
    }

    

 

    
 