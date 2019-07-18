<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Produit;

/**
 * ProduitRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProduitRepository extends \Doctrine\ORM\EntityRepository
{
    public function getAllCategories()
        {
                $em = $this->getEntityManager();
                $query = $em->createQuery("SELECT DISTINCT(p.categorie) FROM AppBundle\Entity\Produit p ORDER BY p.categorie ASC");// avec la methode createQuery, on a fait une requete SQL legerement modifiée, ce qu'on appelle du DQL (Doctrine Query Language)
                $categories=$query->getResult();// getResult est l'equivalent d'un fetch
                //Query builder: 

                // SELECT DISTINCT(categorie) FROM produit ORDER BY categorie ASC
                $query = $em->createQueryBuilder();
                $query
                    -> select('p.categorie')
                    -> distinct(true)
                    -> from(Produit::class, 'p')
                    -> orderBy('p.categorie', 'ASC');
    
                return $query->getQuery()->getResult();
        }

    public function getAllCategories2()
        {
            $em = $this->getEntityManager();

            $query = $em->createQuery("SELECT DISTINCT(p.categorie) FROM AppBundle\Entity\Produit p ORDER BY p.categorie ASC");
            return $query->getResult();
        }    
}