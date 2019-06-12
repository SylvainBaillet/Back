<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use AppBundle\Entity\Membre;
use Appbundle\Form\MembreType;

class SecurityController extends Controller
    {

        /** 
         * @Route("/connexion/", name="connexion")
         * 
         */
        public function connexionAction(Request $request)
            {
                $auth = $this->get('security.authentication_utils');// attention a l'ecriture, c'est bien 'authentication' en anglais

                $lastUserName = $auth->getLastUserName();
                //recupere le pseudo tappé
                $error = $auth->getLastAuthenticationError();
                //recupere l'erreur s'il y'en a une
                if(!empty($error)){
                    $request->getSession()->getFlashBag()->add('errors', 'erreur d\'identifiant');
                }

                $params = array(
                    'lastUserName'=>$lastUserName
                );
                return $this->render('@App/Membre/connexion.html.twig', $params);
            }
            

        // les deux routes connexion_check et deconnexion n'ont pas besoin d'etre developpées puisque dans securité.yml nous avons declarés que 'check_connexion' et 'deconnexion' avais deja leur redirection (check_path: connexion_check) et pour la deconnexion (target: homepage )

        /** 
         * @Route("/connexion_check/", name="connexion_check")
         * 
         */
        public function connexionCheckAction()
            {

            }
        /** 
         * @Route("/deconnexion/", name="deconnexion")
         * 
         */
        public function deconnexionAction()
            {

            }
        





    }