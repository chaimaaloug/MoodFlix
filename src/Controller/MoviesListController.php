<?php

namespace App\Controller;

use App\Entity\Mood;
use App\Repository\{MovieRepository,MoodRepository};
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class MoviesListController extends AbstractController
{
    #[Route('/movies/list', name: 'app_movies_list')]
    public function index(MovieRepository $movieRepository): Response
    {
        return $this->render('movies_list/index.html.twig', [
            'movies' => $movieRepository->findAll(),
        ]);
    }

    #[Route('/movies/list/{mood}', name: 'app_movies_list_mood')]
    public function new(Mood $mood, MovieRepository $movieRepository): Response
    {
        return $this->render('movies_list/index.html.twig', [
            'movies' => $mood->getMovies(),
        ]);
    }
}
