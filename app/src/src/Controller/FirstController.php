<?php

namespace App\Controller;

use LDAP\Result;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FirstController extends AbstractController
{

    /**
     * @Route("/first", name="app_first")
     */
    public function index():Response
    {

        //test global HttpFoundation
        /*$request = Request :: createFromGlobals();
         $name = $request->query->get('name', 'inconnu');
        ;*/
        //$name = $request->query->get('name', 'inconnu');

        //test global et GET
        /*$name = "inconnu";
        if( isset($_GET['name']) ){
            $name = $_GET['name'];
          }*/
        /*return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/FirstController.php',
            'name'=> $name
        ]);*/
        //dd("votre nom est : ".$name);
        //return new Response("votre nom est : ".$name);

        // Create a new request object
        $request = Request::createFromGlobals();
        // Get the request method
        $method = $request->getMethod();
        // Get the request URI
        $uri = $request->getRequestUri();
        // Get the request headers
        $headers = $request->headers->all();
        // Get the request body
        $body = $request->getContent();
     
        //dump($request);
        // Send a response
        //return  new Response('Hello, World!');
        return new Response('Hello, World!', 200, ['Content-Type' => 'html']);

    }
     
}
