<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CompetencesController extends AbstractController
{
    #[Route('/competences', name: 'app_competences')]
    public function index(): Response
    {
        return $this->render('competences/index.html.twig', [
            'controller_name' => 'CompetencesController',
        ]);
    }

    #[Route('/competences/programmation', name: 'app_competences_programmation')]
    public function programmation(): Response
    {
        return $this->render('competences/programmation.html.twig', [
            'controller_name' => 'CompetencesController',
        ]);
    }

    #[Route('/competences/réseaux', name: 'app_competences_reseaux')]
    public function reseaux(): Response
    {
        return $this->render('competences/reseaux.html.twig', [
            'controller_name' => 'CompetencesController',
        ]);
    }

    #[Route('/competences/cyber', name: 'app_competences_cyber')]
    public function cyber(): Response
    {
        return $this->render('competences/cyber.html.twig', [
            'controller_name' => 'CompetencesController',
        ]);
    }
}
