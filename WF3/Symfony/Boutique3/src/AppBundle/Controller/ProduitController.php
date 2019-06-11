<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use AppBundle\Entity\Produit;

class ProduitController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        //1 - recuperer les infos
        $repo = $this->getDoctrine()->getRepository(Produit::class);
        $produits = $repo->findAll();// pour pouvoir afficher les infos dans notre vue, il ne faudra pas oublier d'envoyer $produits dans nos parametres

        //1.2 - recuperer les categories
            // 2  methodes: 
               //Create query: pour faire des requetes SQL (DQL)
                $em = $this->getDoctrine()->getManager();// on recupere le manager

                $query = $em->createQuery("SELECT DISTINCT(p.categorie) FROM AppBundle\Entity\Produit p ORDER BY p.categorie ASC");// avec la methode createQuery, on a fait une requete SQL legerement modifiée, ce qu'on appelle du DQL (Doctrine Query Language)
                $categories = $query->getResult();// getResult() est l'equivalent d'un fetch
               
                //Query builder:

                // SELECT DISTINCT(categorie) FROM produit ORDER BY categorie ASC
                $query = $em->createQueryBuilder();
                $query
                    -> select('p.categorie')
                    -> distinct(true)
                    -> from(Produit::class, 'p')
                    -> orderBy('p.categorie', 'ASC');
    
                $categories = $query->getQuery()->getResult();



        //2 - retourner une vue
        $params = array(
            'produits' => $produits,
            'categories' => $categories
        );
        return $this->render('@App/Produit/index.html.twig', $params);
    }


    /** 
     * @Route("/produit/{id}/", name="produit")
     */
    public function produitAction($id)
        {
        //methode n°1 : Repository  
        // $repo = $this->getDoctrine()->getRepository(Produit::class);
        // $produit = $repo->find($id);// pour pouvoir afficher les infos d'un produit, ce n'est pas un findAll, mais find($id) auquel on associe l'id donc

        //methode n°2 : EntityManager 
        $em = $this->getDoctrine()->getManager();
        $produit = $em->find(Produit::class, $id);

            $params = array(
                'id' => $id,
                'produit' => $produit 
            );
            return $this->render('@App/Produit/show.html.twig', $params);
            
        }

    /** 
     * @Route("/categorie/{cat}", name="categorie")
     */    
    public function categorieAction($cat)
        {
            //1 - recuperer les infos
            $repo = $this->getDoctrine()->getRepository(Produit::class);
            $produits = $repo->findBy(array('categorie' => $cat));//findBy nous permet de recuperer les données par un champ, ici par la categorie par exemple 

            $categories =$repo->getAllCategories();

            // 2 - afficher la vue
            $params = array(
                'produits' => $produits,
                'categories' => $categories
            );
            return $this->render('@App/Produit/index.html.twig', $params);
        }
}

// test: localhost:8000/categorie/pull
// puis pareil pour les 2 autres categories
