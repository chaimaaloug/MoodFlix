<?php

namespace App\Controller;
use App\Repository\MovieRepository;
use App\Repository\MoodRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    #[Route('/home-page', name: 'app_home_page')]
    public function index(MoodRepository $moodRepository, MovieRepository $movieRepository): Response
    {
        return $this->render('home_page/index.html.twig', [
            'controller_name' => 'HomePageController',
            'movies' => $movieRepository->findAll(),
            'moods' => $moodRepository->findAll(),

        ]);
    }
}
