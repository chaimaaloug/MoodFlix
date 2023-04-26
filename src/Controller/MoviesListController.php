<?php

namespace App\Controller;

use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesListController extends AbstractController
{
    #[Route('/movies/list', name: 'app_movies_list')]
    public function index(MovieRepository $repository): Response
    {
        return $this->render('movies_list/index.html.twig', [
            'movies' => $repository->findAll(),
        ]);
    }
}
