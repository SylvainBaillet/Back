<?php 
require('produitsModel.php');

class produitsController
    {
        private $model; // contient l'objet produitsModel

        public function __construct()
            {
                $this->model = new produitsModel;
            }

        //afficher tous les produits
        public function boutique(){ 
            //mission de la fonction, afficher tous les produits, en 1 les recuperer dans la bdd, et en 2 les afficher
            $produits = $this -> model -> findAll();
            $categories = $this -> model -> findCat();
            // echo '<pre>'; print_r($produits); echo'</pre>';
            require('produits.php');
        } 
        
        //afficher un seul produit
        public function affichage($id){
            
        } 

        //afficher tous les produits d'une cat
        public function categorie($categorie){

        } 
        //ajouter un produit
        public function ajouterProduit($data){

        } 
        //modifier un produit
        public function modifierProduit($id,$data){

        } 
        //supprimer un produit
        public function supprimerProduit($id){

        } 
        
    }

