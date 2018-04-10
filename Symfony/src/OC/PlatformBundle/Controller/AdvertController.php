<?php

// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdvertController extends Controller
{
    public function indexAction()
    {
        // on veut avoir l'url de l'annonce d'id 5
        $url = $this->get('router')->generate(
            'oc_platform_view', // 1er arg: nom de la route
            array('id'=>5) //2e arg: valeurs des params
            // si on veut générer une url absolue, il faut un 3e param:
            // UrlGeneratorInterface::ABSOLUTE_URL
            // ainsi, $url vaudra http://monsite.com/platform et pas uniquement /platform
        );
        // $url vaut "/platform/advert/5"
        
        return new Response("l'URL de l'annonce d'id 5 est : ".$url);
    }
    
    // On injecte la requête dans les arguments de la méthode
    /*public function viewAction($id, Request $request) // on a maintenant accès à la requête HTTP via $request
    {
        // $id vaut 5 si l'on a appelé l'URL /platform/advert/5
        
        // ici, on récupère depuis la base de données
        // l'annonce correspondant à l'id $id.
        // puis on passera l'annonce à la vue pour qu'elle 
        // puisse l'afficher
        
        // récupération du paramètre tag:
        $tag = $request->query->get('tag');
        
        return new Response("Affichage de l'annonce d'id : ".$id.", avec le tag : ".$tag);
    }*/
    
    // manipulation de l'objet Response. Méthode longue:
    public function viewAction($id)
    {
        // on crée la réponse sans lui donner de contenu pour le moment
        $response = new Response();
        
        // on définit le contenu
        $response->setContent("<marquee><h1>Ceci est une page d'erreur 404</h1></marquee>");
        
        // on définit le code HTTP à "not found" (erreur 404)
        $response->setStatusCode(Response::HTTP_NOT_FOUND);
        
        // on retourne la réponse
        return $response;
    }
    
    public function viewSlugAction($slug, $year, $format)
    {
        return new Response(
            "On pourrait afficher l'annonce correspondant au slug '".$slug."', créée en ".$year." et au format ".$format."."
        );
    }
}