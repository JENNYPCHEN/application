<?php

namespace App\Controller;

use Psr\Cache\CacheItemInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function index(HttpClientInterface $httpClient,CacheInterface $cache): Response
    {
        $mixedData= $cache->get('QnA', function(CacheItemInterface $cacheItem)use($httpClient){
            $response=$httpClient->request('GET','');
            $mix=$response->toArray();
            $cacheItem->expiresAfter(3600);

        });

        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
        ]);
    }
}
