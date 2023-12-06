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
     *  name="app_cv", requirements={"age"="\d+","address"="casa|rabat"}, defaults={"firstname"="Sofrecom", "lastname"="Sofrecom", "age"=0, "address"="casablanca - maroc"})
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
    /**
     * @Route("/cv/show", name="app_cv_show")
     */
    public function showPortfolio(): Response
    {


        // Simulate user data in JSON format 
        $userDataJson = '{
                "id": 1,
                "fullName": "John Doe Mickel",
                "jop": "UI Develope",
                "email": "john.doe@example.com",
                "phone": "123-456-7890",
                "adress": "123 rue Principale, Montréal, QC, Canada",
        
                "birthDate": "1990-01-01",
                "piographie": "You will begin to realise why this exercise is called the Dickens Pattern (with reference to the ghost showing Scrooge some different futures)",
                "experiences": [
                    {"position": "UI Developes","company": "ABC Inc","period": "2015-2018","desc": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a elit facilisis, adipiscing leo in, dignissim magna."
                    },
                    {"position": "Manager","company": "XYZ Corp","period": "2018-2022", "desc": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a elit facilisis, adipiscing leo in, dignissim magna."
                    }
                ],
                "skills": [
                    {"name": "HTML / HTML5","level": 40 },
                    {"name": "CSS / CSS3 / SASS / LESS","level": 70},
                    {"name": "JavaScript","level": 100},
                    {"name": "PHP","level": 80},
                    {"name": "Gestion de Projet","level": 20}
                ],
                "formations": [
                    {
                    "degree": "Bachelor\'s in Computer Science",
                    "institution": "University Casablanca",
                    "year": "2014-01-01",
                    "desc": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a elit facilisis, adipiscing leo in, dignissim magna."
                    },
                    {
                    "degree": "Master\'s in Project Management",
                    "institution": "School Rabat",
                    "year": "2012-01-01",
                    "desc": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a elit facilisis, adipiscing leo in, dignissim magna."
                    },
                    {
                    "degree": "Master\'s in Project Management",
                    "institution": "School Management ",
                    "year": "2010-01-01",
                    "desc": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a elit facilisis, adipiscing leo in, dignissim magna."
                    }
                    ],
                "profilImage": "https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&w=600"
            }';

        // Deserialize JSON data into an array
        $userData = json_decode($userDataJson, true);

        dump($userData);

        return $this->render('cv/portfolio.html.twig', [
            'controller_name' => 'CvController',
            'userData' => $userData,
        ]);
    }
}
