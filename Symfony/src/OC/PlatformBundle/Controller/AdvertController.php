<?php

// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
        );
        // $url vaut "/platform/advert/5"
        
        return new Response("l'URL de l'annonce d'id 5 est : ".$url);
    }
    
    // La route fait appel à OCPlatformBundle:Advert:view
    // on doit donc définir la méthode viewAction.
    // on donne à cette méthode l'argument $id, pour
    // correspondre au paramètre {id} de la route
    public function viewAction($id)
    {
        // $id vaut 5 si l'on a appelé l'URL /platform/advert/5
        
        // ici, on récupère depuis la base de données
        // l'annonce correspondant à l'id $id.
        // puis on passera l'annonce à la vue pour qu'elle 
        // puisse l'afficher
        
        return new Response("Affichage de l'annonce d'id : ".$id);
    }
    
    public function viewSlugAction($slug, $year, $format)
    {
        return new Response(
            "On pourrait afficher l'annonce correspondant au slug '".$slug."', créée en ".$year." et au format ".$format."."
        );
    }
}