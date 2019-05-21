<?php
//  une surcharge (override) permet de surcharger une methode, de l'ameliorer 
class A
    {
        public function calcul()
        {
            return 10;
        }
    }

//---------------------------------------------------------------
class B extends A 
    {
        public function calcul() //redefinition
            {
                $nb = parent::calcul();/* parent fonctionne pour appeller une methode d'une classe parents lors d'une surcharge (override), une surcharge permet de prendre en compte le comportement de ma fonction d'origine et d'y ajouter un traitement complementaire. */
                /* ici je n'ai pas besoin d'accolades dans le if else, car je n'ai qu'une seule instruction, si il y'en avait eu plus d'une je devais mettre les accolades.*/
                if($nb <= 100) return "$nb est inferieur ou égal à 100<hr>";
                else           return "$nb est superieur à 100";
            }
    }
    // Pour la surcharge, si on ne faisais pas ça dans worpress par exemple, on ne pourrait pas avoir de mise a jour dans les CMS, on modifierait directement les fonctions du coeur

    $B = new B;
    echo $B->calcul();