<?php

namespace App\Controller;

use App\Repository\QuestionRepository;
use Psr\Cache\CacheItemInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function index(QuestionRepository $questionRepository): Response
    {
 
        $response= $this->render('homepage/index.html.twig', [
            'questions' => $questionRepository->findAll(),
        ]);
        $response->setSharedMaxAge(3600);
        return $response;
    }
}
