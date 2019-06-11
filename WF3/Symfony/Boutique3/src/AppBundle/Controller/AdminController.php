<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use AppBundle\Entity\Produit; 
use AppBundle\Entity\Membre; 
use AppBundle\Entity\Commande; 
use AppBundle\Entity\DetailsCommande; 

use AppBundle\Form\ProduitType;


class AdminController extends Controller
    {
    // vue admin pour les produits

    /**
    * @Route("/admin/produit/", name="admin_produit")
    */
    public function adminProduitAction()
        {
            $repo = $this->getDoctrine()->getRepository(Produit::class);
            $produits = $repo->findAll();//on recupere le l'entité produit par le getRepository que l'on envoie ensuite dans les parametres, pour envoyer dans les params ci dessous

            $params = array(
                'produits' => $produits
            );
            return $this->render('@App/Admin/liste_produit.html.twig', $params);
        }

    /**
    * @Route("/admin/produit/add/", name="admin_produit_add")
    */    
    public function adminProduitAddAction(Request $request)
        {
            // on créé un objet de l'entite produit (vide)
            $produit = new Produit;

            // on insert des infos dans les setters pour simuler l'ajout d'un produit

            // $produit -> setReference('XXX');
            // $produit -> setCategorie('pull');
            // $produit -> setPublic('m');
            // $produit -> setPrix('25,99');
            // $produit -> setStock('150');
            // $produit -> setTitre('Pull mariniere');
            // $produit -> setPhoto('mariniere.jpeg');
            // $produit -> setDescription('Super pull façon bretonne');
            // $produit -> setTaille('L');
            // $produit -> setCouleur('blanc et bleu');

            //a la place de la simulation ci dessus, on va cette fois recuperer le formulaire qui receptionnera tous les champs: 

            $form = $this->createForm(ProduitType::class, $produit);// pour pouvoir utiliser ProduitType, on doit faire plus haut un use AppBundle\Form\ProduitType;
            //on le lie en deuxieme argument à l'objet produit(a ce stade l'objet est vide), l'osrque l'on crée un produit depuis le formulaire, on dit qu'on va hydrater le produit , le formulaire va donc remplir l'objet   

            //cette ligne de code va lier definitivement l'objet produit a notre formulaire, elle premet de traiter les informations en POST (pour pouvoir utiliser cete fonction request, on doit faire un use de l'objet Request, puis envoyer en arguments de la fonction adminProduitAddAction(Request $request))
            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid())
                {
                    $em = $this->getDoctrine()->getManager(); // on va recuperer le manager, car persist et flush, le repository ne sait pas le faire, seul le manager sait le faire
                    $em ->persist($produit); // On enregistre dans le systeme de l'objet
                    
                    $em ->flush(); // apres avoir enregistré, on flush, on execute la requete d'insertion

                    $request->getSession()->getFlashBag()->add('success', 'le produit ' . $produit->getId() . ' a bien été ajouté !');// le message qui sera affiché

                    return $this->redirectToRoute('admin_produit');
                }

            $params = array(
                'produitForm' => $form->createView(),//createView() est une fonction qui permet de de generer la partie visuel (html) du formulaire. La view du formulaire d'ajout de produit se trouve dans Resourses\views\Admin\form_produit.html.twig
                'title'=> 'Ajouter produit ' . $produit->getTitre()
            );
            return $this->render('@App/Admin/form_produit.html.twig', $params);
        } 

    /**
    * @Route("/admin/produit/update/{id}/", name="admin_produit_update")
    */   
    public function adminProduitUpdateAction($id, Request $request)
        {

            $em = $this->getDoctrine()->getManager();// on doit d'abord recuperer le manager
            //on recupere le produit a modifier par son id
            $produit=$em->find(Produit::class, $id);

            $form = $this->createForm(ProduitType::class, $produit);
            // En creant le formulaire on le lie a notre objet produit qui va etre modifié. on dit qu'on hydrate le formulaire

            $form->handleRequest($request);
                
            if($form->isSubmitted() && $form->isValid())
                    {
                        //on enregistre les modifications
                        $em->persist($produit);
                        $em->flush();
                    
                        $request->getSession()->getFlashBag()->add('success', 'le produit ' . $produit->getTitre() . ' a bien été modifié');
                        return $this->redirectToRoute('admin_produit');
                    }

            $params = array (
                'id' => $id,
                'produitForm' => $form ->createView(),
                'title'=> 'Modifier produit ' . $produit->getTitre()
            );
            return $this->render('@App/Admin/form_produit.html.twig', $params);
        } 
        
    /** 
     * @Route("/admin/produit/delete/{id}/", name="admin_produit_delete")
     */    
    public function adminProduitDeleteAction($id, Request $request)
        {
            // $em = $this->getDoctrine()->getManager();
            // le manager existe deja dans la page donc je n'ai pas besoin de le rappeller dans cette fonction

            //recupere le produit par son id
            $produit=$em->find(Produit::class, $id);

            //on supprime le produit
            $em->remove($produit);
            $em->flush();


            $params = array();
            $request->getSession()->getFlashBag()->add('success', 'le produit n° :' . $id . ' à bien été supprimé.');
            return $this->redirectToRoute('admin_produit');// on redirige vers la page admin qui affiche les produits avec la fonction 'redirectToRoute'
        }  
     
    // vue admin pour les membres 

    /** 
     * @Route("/admin/membre/", name="admin_membre")
     */    
    public function adminMembreAction()
        {
            $params = array();
            return $this->render('@App/Admin/liste_membre.html.twig', $params);
        }
        
    /** 
     * @Route("/admin/membre/add/", name="admin_membre_add")
     */    
    public function adminMembreAddAction()
        {
            $params = array();
            return $this->render('@App/Admin/form_membre.html.twig', $params);
        }
        
    /** 
     * @Route("/admin/membre/update/{id}/", name="admin_membre_update")
     */    
    public function adminMembreUpdateAction($id)
        {
            
            $params = array(
                'id' => $id
               );
            return $this->render('@App/Admin/form_membre.html.twig', $params);
        }

    /** 
     * @Route("/admin/membre/delete/{id}/", name="admin_membre_delete")
     */    
    public function adminMembreDeleteAction($id, Request $request)
        {
            $params = array();
            $request->getSession()->getFlashBag()->add('success', 'le membre n° :' . $id . ' à bien été supprimé.');
            return $this->redirectToRoute('admin_membre');// on redirige vers la page admin qui affiche les membres avec la fonction 'redirectToRoute'
        } 
        
    // vue admin pour les commandes

    /** 
     * @Route("/admin/commande/", name="admin_commande")
     */    
    public function adminCommandeAction()
        {
            $params = array();
            return $this->render('@App/Admin/liste_commande.html.twig', $params);
        }
        
    /** 
     * @Route("/admin/commande/add/", name="admin_commande_add")
     */    
    public function adminCommandeAddAction()
        {
            $params = array();
            return $this->render('@App/Admin/form_commande.html.twig', $params);
        }
        
    /** 
     * @Route("/admin/commande/update/{id}/", name="admin_commande_update")
     */    
    public function adminCommandeUpdateAction($id)
        {
            $params = array(
                'id' => $id
               );
            return $this->render('@App/Admin/form_commande.html.twig', $params);
        }

    /** 
     * @Route("/admin/commande/delete/{id}/", name="admin_commande_delete")
     */    
    public function adminCommandeDeleteAction($id, Request $request)
        {


            $params = array();
            $request->getSession()->getFlashBag()->add('success', 'la commande n° :' . $id . ' à bien été supprimée.');
            return $this->redirectToRoute('admin_commande');// on redirige vers la page admin qui affiche les membres avec la fonction 'redirectToRoute'
        }      
    }