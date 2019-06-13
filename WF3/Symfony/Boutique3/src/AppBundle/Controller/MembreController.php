<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use AppBundle\Entity\Membre;
use AppBundle\Form\MembreType;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class MembreController extends Controller
    {

        /** 
         * @Route("/membre/inscription/", name="membre_inscription")
         */   
        public function membreInscriptionAction(Request $request, UserPasswordEncoderInterface $encoder)
            {
                $membre = new Membre;
                $form = $this->createForm(MembreType::class, $membre);
                $form->handleRequest($request);

                if($form->isSubmitted() && $form->isValid())
                {
                    $em = $this->getDoctrine()->getManager(); // on va recuperer le manager, car persist et flush, le repository ne sait pas le faire, seul le manager sait le faire
                    $em ->persist($membre); // On enregistre dans le systeme de l'objet
                    $membre-> setStatut('0'); //avant le flush, on pense a mettre le statut à '0' par default

                    //pour encrypter le mdp, ne pas oublier de faire un 'use' de UserPasswordEncoderInterface    
                    $password = $membre->getPassword();// pour recuperer le mot de passe saisi par l'utilisateur dans le formulaire

                    $password_crypte = $encoder->encodePassword($membre, $password);// encode le password 

                    $membre->setPassword($password_crypte);// grace a getpassword(), encodePassword() et setPassword, nous avons fini d'encrypter le mdp

                    $membre->setSalt(NULL);
                    $membre->setRoles(['ROLE_USER']);// on definit un 'role' par defaut

                    $em ->flush(); // apres avoir enregistré, on flush, on execute la requete d'insertion

                    $request->getSession()->getFlashBag()->add('success', 'le membre ' . $membre->getId() . ' a bien été ajouté !');// le message qui sera affiché

                    return $this->redirectToRoute('connexion');
                }

                $params = array(
                    'membreForm' => $form -> createView()

                );
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