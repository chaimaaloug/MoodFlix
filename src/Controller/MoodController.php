<?php

namespace App\Controller;

use App\Entity\Mood;
use App\Form\MoodType;
use App\Repository\MoodRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/mood')]
class MoodController extends AbstractController
{
    #[Route('/moods', name: 'app_mood_index', methods: ['GET'])]
    public function index(MoodRepository $moodRepository): Response
    {
        return $this->render('mood/index.html.twig', [
            'moods' => $moodRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_mood_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MoodRepository $moodRepository): Response
    {
        $mood = new Mood();
        $form = $this->createForm(MoodType::class, $mood);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $moodRepository->save($mood, true);

            return $this->redirectToRoute('app_mood_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('mood/new.html.twig', [
            'mood' => $mood,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_mood_show', methods: ['GET'])]
    public function show(Mood $mood): Response
    {
        return $this->render('mood/show.html.twig', [
            'mood' => $mood,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_mood_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Mood $mood, MoodRepository $moodRepository): Response
    {
        $form = $this->createForm(MoodType::class, $mood);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $moodRepository->save($mood, true);

            return $this->redirectToRoute('app_mood_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('mood/edit.html.twig', [
            'mood' => $mood,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_mood_delete', methods: ['POST'])]
    public function delete(Request $request, Mood $mood, MoodRepository $moodRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $mood->getId(), $request->request->get('_token'))) {
            $moodRepository->remove($mood, true);
        }

        return $this->redirectToRoute('app_mood_index', [], Response::HTTP_SEE_OTHER);
    }
}
