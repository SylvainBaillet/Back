<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends Controller
    {
    // vue admin pour les produits

    /**
    * @Route("/Admin/produit/", name="admin_produit")
    */
    public function adminProduitAction()
        {
            $params = array();
            return $this->render('@App/Admin/liste_produit.html.twig', $params);
        }

    /**
    * @Route("/Admin/produit/add", name="admin_produit_add")
    */    
    public function adminProduitAddAction()
        {
            $params = array();
            return $this->render('@App/Admin/form_produit.html.twig', $params);
        } 

    /**
    * @Route("/Admin/produit/update/{id}/", name="admin_produit_update")
    */   
    public function adminProduitUpdateAction($id)
        {
            $params = array (
                'id' => $id
            );
            return $this->render('@App/Admin/form_produit.html.twig', $params);
        } 
        
    /** 
     * @Route("/Admin/produit/delete/{id}/", name="admin_produit_delete")
     */    
    public function adminProduitDeleteAction($id, Request $request)
        {
            $params = array();
            $request->getSession()->getFlashBag()->add('success', 'le produit n° :' . $id . ' à bien été supprimé.');
            return $this->redirectToRoute('admin_produit');// on redirige vers la page admin qui affiche les produits avec la fonction 'redirectToRoute'
        }  
     
    // vue admin pour les membres 

    /** 
     * @Route("/Admin/membre/", name="admin_membre")
     */    
    public function adminMembreAction()
        {
            $params = array();
            return $this->render('@App/Admin/liste_membre.html.twig', $params);
        }
        
    /** 
     * @Route("/Admin/membre/add", name="admin_membre_add")
     */    
    public function adminMembreAddAction()
        {
            $params = array();
            return $this->render('@App/Admin/form_membre.html.twig', $params);
        }
        
    /** 
     * @Route("/Admin/membre/update/{id}/", name="admin_membre_update")
     */    
    public function adminMembreUpdateAction($id)
        {
            $params = array(
                'id' => $id
               );
            return $this->render('@App/Admin/form_membre.html.twig', $params);
        }

    /** 
     * @Route("/Admin/membre/delete/{id}/", name="admin_membre_delete")
     */    
    public function adminMembreDeleteAction($id, Request $request)
        {
            $params = array();
            $request->getSession()->getFlashBag()->add('success', 'le membre n° :' . $id . ' à bien été supprimé.');
            return $this->redirectToRoute('admin_membre');// on redirige vers la page admin qui affiche les membres avec la fonction 'redirectToRoute'
        } 
        
    // vue admin pour les commandes

    /** 
     * @Route("/Admin/commande/", name="admin_commande")
     */    
    public function adminCommandeAction()
        {
            $params = array();
            return $this->render('@App/Admin/liste_commande.html.twig', $params);
        }
        
    /** 
     * @Route("/Admin/commande/add", name="admin_commande_add")
     */    
    public function adminCommandeAddAction()
        {
            $params = array();
            return $this->render('@App/Admin/form_commande.html.twig', $params);
        }
        
    /** 
     * @Route("/Admin/commande/update/{id}/", name="admin_commande_update")
     */    
    public function adminCommandeUpdateAction($id)
        {
            $params = array(
                'id' => $id
               );
            return $this->render('@App/Admin/form_commande.html.twig', $params);
        }

    /** 
     * @Route("/Admin/commande/delete/{id}/", name="admin_commande_delete")
     */    
    public function adminCommandeDeleteAction($id, Request $request)
        {
            $params = array();
            $request->getSession()->getFlashBag()->add('success', 'la commande n° :' . $id . ' à bien été supprimée.');
            return $this->redirectToRoute('admin_commande');// on redirige vers la page admin qui affiche les membres avec la fonction 'redirectToRoute'
        }      
    }