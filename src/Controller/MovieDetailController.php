<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieDetailController extends AbstractController
{
    #[Route('/movie-detail', name: 'app_movie_detail')]
    public function index(): Response
    {
        return $this->render('movie_detail/index.html.twig', [
            'controller_name' => 'MovieDetailController',
        ]);
    }
}
