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
    
    public function viewAction($id, Request $request)
    {
        // on crée la réponse en JSON grâce à la fonction json_encode()
        $response = new Response(json_encode(array('id' => $id)));
        
        // ici, nous définissons le content-type pour dire au navigateur
        // que l'on envoie du JSON et non du HTML
        $response->headers->set('Content-Type', 'application/json');
        
        return $response;
    }
    
    public function viewSlugAction($slug, $year, $format)
    {
        return new Response(
            "On pourrait afficher l'annonce correspondant au slug '".$slug."', créée en ".$year." et au format ".$format."."
        );
    }
}