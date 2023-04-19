<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Movie;

class MovieDetailController extends AbstractController
{

    #[Route('/movie-detail/{id}', name: 'app_movie_detail')]
    public function index(EntityManagerInterface $entityManager, int $id): Response
    {
        $movie = $entityManager->getRepository(Movie::class)->findOneById($id);


        return $this->render('movie_detail/index.html.twig', 
        [
            'controller_name' => 'MovieDetailController',
            'movie' => $movie
        ]);
    }
}
