<?php

namespace App\Controller\Rest;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Routing\Annotation\Route;


class CvController extends AbstractController
{
  /**
   * @param UserRepository $userRepository
   * @return JsonResponse
   * @Route("api/profils", name="api_profils", methods={"GET"})
   */
  public function getPosts(UserRepository $userRepository)
  {
   
    $data = $userRepository->findAll();
    //dd($data);
    return new JsonResponse($data);
  }
}
    
   

