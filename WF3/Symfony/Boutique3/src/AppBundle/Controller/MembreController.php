<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use AppBundle\Entity\Membre;
use Appbundle\Form\

class MembreController extends Controller
    {
        // vue membre pour la connexion

        /** 
         * @Route("/membre/connexion/", name="membre_connexion")
         */   
        public function membreConnectionAction()
            {

                $params = array();
                return $this->render('@App/Membre/connexion.html.twig', $params);
            } 

        // vue membre pour l'inscription'

        /** 
         * @Route("/membre/inscription/", name="membre_inscription")
         */   
        public function membreInscriptionAction()
            {
                $membre = new Membre;
                $form = $this->createForm(MembreType::class, $membre);
                $form->handleRequest($request);

                if($form->isSubmitted() && $form->isValid())
                {
                    $em = $this->getDoctrine()->getManager(); // on va recuperer le manager, car persist et flush, le repository ne sait pas le faire, seul le manager sait le faire
                    $em ->persist($membre); // On enregistre dans le systeme de l'objet
                    $membre-> setStatut('0'); //avant le flush, on pense a mettre le statut à '0' par default

                    $em ->flush(); // apres avoir enregistré, on flush, on execute la requete d'insertion

                    $request->getSession()->getFlashBag()->add('success', 'le membre ' . $membre->getId() . ' a bien été ajouté !');// le message qui sera affiché

                    return $this->redirectToRoute('membre_connexion');
                }

                $params = array();
                return $this->render('@App/Membre/inscription.html.twig', $params);
            }
         
        // vue pour le profil    

        /** 
         * @Route("/membre/profil/", name="membre_profil")
         */   
        public function membreProfilAction()
            {
                $params = array();
                return $this->render('@App/Membre/profil.html.twig', $params);
            } 
    }