<?php

namespace App\Controller\Web;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User; // Import the User entity class
use App\Entity\Academic; 
use App\Entity\Experience;
use App\Entity\Skill;

use Doctrine\ORM\EntityManagerInterface;

/**
 * @Route("admin")
 */
class DashboardController extends AbstractController
{
    /**
     * @Route("/", name="app_dashboard")
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $totalUsers = $entityManager
            ->getRepository(User::class)
            ->findAll();
        $totalSkills = $entityManager
            ->getRepository(Skill::class)
            ->findAll();
        $totalExperiences = $entityManager->getRepository(Experience::class)->findAll();
        $totalacademics = $entityManager->getRepository(Academic::class)->findAll();
           
        
        return $this->render('dashboard/index.html.twig', [
            'totalUsers' => count($totalUsers),
            'totalSkills' => count($totalSkills),
            'totalExperiences' => count($totalExperiences) , 
            'totalacademics' => count($totalacademics) 
        ]);
    }
}
