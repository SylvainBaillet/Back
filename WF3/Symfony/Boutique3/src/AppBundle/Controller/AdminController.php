<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use AppBundle\Entity\Produit; 
use AppBundle\Entity\Membre; 
use AppBundle\Entity\Commande; 
use AppBundle\Entity\DetailsCommande; 


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
    * @Route("/admin/produit/add", name="admin_produit_add")
    */    
    public function adminProduitAddAction()
        {
            // on créé un objet de l'entite produit (vide)
            $produit = new Produit;
            // on insert des infos dans les setters
            $produit -> setReference('XXX');
            $produit -> setCategorie('pull');
            $produit -> setPublic('m');
            $produit -> setPrix('25,99');
            $produit -> setStock('150');
            $produit -> setTitre('Pull mariniere');
            $produit -> setPhoto('mariniere.jpeg');
            $produit -> setDescription('Super pull façon bretonne');
            $produit -> setTaille('L');
            $produit -> setCouleur('blanc et bleu');

            $em = $this->getDoctrine()->getManager(); // on va recuperer le manager, car persist et flush, le repository ne sait pas le faire, seul le manager sait le faire
            $em ->persist($produit); // On enregistre dans le systeme de l'objet
            $em ->flush(); // apres avoir enregistré, on flush, on execute la requete d'insertion


            $params = array();
            return $this->render('@App/Admin/form_produit.html.twig', $params);
        } 

    /**
    * @Route("/admin/produit/update/{id}/", name="admin_produit_update")
    */   
    public function adminProduitUpdateAction($id)
        {

            $em = $this->getDoctrine()->getManager();
            //on recupere le produit a modifier par son id
            $produit=$em->find(Produit::class, $id);

            $produit->setPrix('1000');

            //on l'enregistre
            $em->persist($produit);
            $em->flush();


            $params = array (
                'id' => $id
            );
            return $this->render('@App/Admin/form_produit.html.twig', $params);
        } 
        
    /** 
     * @Route("/admin/produit/delete/{id}/", name="admin_produit_delete")
     */    
    public function adminProduitDeleteAction($id, Request $request)
        {
            $em = $this->getDoctrine()->getManager();

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
     * @Route("/admin/membre/add", name="admin_membre_add")
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
     * @Route("/admin/commande/add", name="admin_commande_add")
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