<?php

namespace POLES\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="accueil")
     */
    public function indexAction()
    {
        return $this->render('@POLESTest/Default/index.html.twig');
    }

    //créationtion d'une nouvelle route (d'une nouvelle page), attention dans les annotations utiliser des guillements et pas des quotes, on créé une route en faisant un commentaire avec deux etoiles, pour dire que c'est une annotation /** */ puis la route, suivi d'une fonction, le nom de cette fonction par convention se termine toujours par Action

    /** 
     * @Route("/bonjour/")
     * localhost:8000/bonjour
     * www.maboutique.com/bonjour
     */
    public function bonjourAction()
    {
        echo "Bonjour";
    }
    //test dans l'url: localhost:8000/bonjour, on a une erreur ou on nous dis qu'on attends une réponse

    /** 
     * @Route("/bonjour2/")
     * 
     */
    public function bonjour2Action()
        {
            return new Response('<h1>Bonjour</h1>');
        }
    //test dans l'url: localhost:8000/bonjour2, ici le test a fonctionné sans erreur, nous avons declaré plus haut que l'on 'use' l'objet Response

    /** 
     * @Route("/hello/{prenom}/")
     */
    public function helloAction($prenom)
        {
            return new Response('Bonjour ' . $prenom . ' !');
        }
        //test dans l'url: localhost:8000/hello/Sylvain ou n'importe quel prenom, si je ne met rien apres helleo/ dans l'url, j'ai une erreur, car notre route attends quelquechose

    /** 
     * @Route("/hola/{prenom}/")
     */    
    public function holaAction($prenom)
        {
            $params = array('prenom' => $prenom);
            return $this->render("@POLESTest/Default/hola.html.twig", $params);//ceci est un fichier view, une vue dans notre site que l'on va devoir creer
                                                    // si nous n'avions pas créé la variable $param, ici on aurait mis: array a la place de $param
        }
    
    /**
     * @Route("/ciao/{prenom}/{age}/")
     */


    public function ciaoAction($prenom, $age)
        {
            return $this->render("@POLESTest/Default/ciao.html.twig", array('prenom' => $prenom, 'age' => $age));// ici nous avons utilisé l'array en deuxieme parametre du render, mais nous prefererons la methode comme ci dessus, dans le fichier 'hola' , en declarrant une vaiable $params, et en declarant les parametres de l'array
        }

    /** 
     * @Route("/redirect/") 
     * on fait ici une redirection vers l'accueil, premiere methode mais moins pratique
     */ 
    public function redirectAction()
        {
            $route = $this->get('router')->generate('accueil');
            return new RedirectResponse($route);
        }
    //test dans l'url: localhost:8000/redirect    


    /** 
     * @Route("/redirect2/")
     */    
    public function redirect2Action()
        {
            return $this->redirectToRoute('accueil');
        }
    //test dans l'url: localhost:8000/redirect2 , c'est une syntaxe plus simple pour faire une redirection, plutot que get('routeur')->generate()...
    
    /** 
     * @Route("/message/")
     */
    public function messageAction(Request $request)
        {
            $session = $request->getSession();
            $session->getFlashBag()->add('success', 'felicitation vous êtes inscrit !');
            $session->getFlashBag()->add('success', 'Bonjour !');
            $session->getFlashBag()->add('error', 'Votre adresse mail n\'est pas valide !');
            return $this->redirectToRoute('accueil');
        }
    //test dans l'url: localhost:8000/message , ça nous redirige bien vers l'accueil, mais les messages ne s'affichent pas    
}
