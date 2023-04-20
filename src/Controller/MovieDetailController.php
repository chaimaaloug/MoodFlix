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

    // Probablement inutile, mais exemple de logique ajoutant un movie dans la bdd directement depuis le serveur
    // #[Route('/addMovie', name: 'create_movie')]
    // public function createProduct(EntityManagerInterface $entityManager): Response
    // {
    //     $movie = new Movie();
    //     $movie->setTitle('Bonjour');
    //     $movie->setDescription('Ergonomic and stylish!');

    //     // tell Doctrine you want to (eventually) save the movie (no queries yet)
    //     $entityManager->persist($movie);

    //     // actually executes the queries (i.e. the INSERT query)
    //     $entityManager->flush();

    //     return new Response('Saved new movie with id '.$movie->getId());
    // }
}
