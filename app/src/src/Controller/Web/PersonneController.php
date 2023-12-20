<?php

namespace App\Controller\Web;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonneController extends AbstractController
{
    /**
     * @Route("/personne", name="app_personne")
     */
    public function index(): Response
    {
         /** Génère l'URL à partir du nom de la route */
         //$url = $this->generateUrl('app_personne_tes');
         /*$urlWithParams = $this->generateUrl('example_route_with_params', [
            'id' => 1,
            'slug' => 'example-slug',
                ]);*/

         /** Effectue une action spécifique dans un autre contrôleur */
            /*$response = $this->forward(self::class . '::test', [
                'name' => 'Sofrecom'
            ]);

            return $response;*/

        /** Redirige vers une autre route nommée 'another_route' */
           // return $this->redirectToRoute('app_personne_tes', ["name" => "Sofrecom"]);



         /** On crée un objet Response puis on la retourne c’est le rôle du contrôleur */
        return new Response('<html><body><h1>Hello Sofrecom ! </h1></body></html>'); 

        /*return $this->render('personne/index.html.twig', [
            'controller_name' => 'PersonneController',
            'name' => 'Sofrecom',
        ]);*/
    }

    /**
     * Méthode d'action à appeler via forward()
     */
    /**
     * \\@Route("/personne_test", name="app_personne_tes")
     */
    public function test($name = ''): Response
    {
        
        /** createNotFoundException : Throws a NotFoundException if the name parameter is empty.*/
      
        /*if ($name == '') {
            throw $this->createNotFoundException('La ressource demandée n\'existe pas.');
        }*/

        return new Response('<html><body><h1>Hello test '.$name.'</h1></body></html>'); 
    }

        

       
    
   
}
