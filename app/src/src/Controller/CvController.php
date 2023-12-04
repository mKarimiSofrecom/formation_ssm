<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Annotation\Method;


class CvController extends AbstractController
{

    /**
     * @Route("/cv/{firstname}/{lastname}/{age}/{address}", 
     * name="app_cv", requirements={"age"="\d+","address"="casa|rabat"}, defaults={"firstname"="Sofrecom", "lastname"="Sofrecom", "age"=0, "address"="casablanca - maroc"})
     */
    public function index(Request $request): Response
    {

        // Get the parameter 'param' from the request's attributes
        $firstname = $request->attributes->get('firstname');
        $lastname = $request->attributes->get('lastname');
        $age = $request->attributes->get('age');
        $address = $request->attributes->get('address');
        // dump($request);
        // dump($firstname);
        
        // $firstname = $request->query->get('firstname','Sofrecom');
        // $lastname = $request->query->get('lastname','Sofrecom');
        // $age = $request->query->get('age',0);
        // $address = $request->query->get('address','casablanca - maroc');
        
        return $this->render('cv/index.html.twig', [
            'controller_name' => 'CvController',
            'firstname' => $firstname,
            'lastname' => $lastname,
            'age' => $age,
            'adress' => $address,
        ]);
    }
}
