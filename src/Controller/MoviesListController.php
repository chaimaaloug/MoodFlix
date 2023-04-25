<?php

namespace App\Controller;

use App\Entity\Mood;
use App\Repository\MovieRepository;
use App\Repository\MoodRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesListController extends AbstractController
{
    #[Route('/movies/list/{mood}', name: 'app_movies_list')]
    public function index(Mood $mood, MovieRepository $movieRepository): Response
    {
        $movies = $movieRepository->findBy(['mood' => $mood]);
    
        return $this->render('movies_list/index.html.twig', [
            'movies' => $movies,
        ]);
    }
    
}
